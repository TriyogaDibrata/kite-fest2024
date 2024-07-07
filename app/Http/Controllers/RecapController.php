<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Recap;
use App\Models\RecapDetail;
use App\Models\Score;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class RecapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $recaps = Recap::get();
            return DataTables::of($recaps)
                ->addColumn('action', function ($recaps) {
                    return view('datatable.action', [
                        // 'edit_url' => route('photos.edit', $photos->id),
                        'preview_url' => route('recaps.show', $recaps->id),
                        'delete_url' => route('recaps.destroy', $recaps->id),
                        'data_name' => 'Rekapitulasi Nilai ' . $recaps->category->name,
                        'redirect_url' => route('recaps.index'),
                        'custom' => '',
                    ]);
                })
                ->editColumn('created_at', function ($recaps) {
                    return '<span class="badge text-bg-light">' . Carbon::parse($recaps->created_at)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY') . '</span>';
                })
                ->editColumn('desc', function ($recaps) {
                    return $recaps->desc ? $recaps->desc : '-';
                })
                ->addIndexColumn()
                ->rawColumns(['created_at'])
                ->make(true);
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('judges.recaps.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('judges.recaps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'desc' => 'string|nullable'
        ]);

        DB::beginTransaction();

        try {
            $process = 1;
            $score = Score::select('participants.id as p_id', DB::raw('GROUP_CONCAT(scores.score) as nilai_juri'), DB::raw('GROUP_CONCAT(scores.note) as catatan'), DB::raw('sum(scores.score) as total_nilai'), DB::raw('MIN(scores.score) as min_nilai'), DB::raw('COUNT(scores.score) as jumlah_nilai'))
                ->join('participants', function ($query) {
                    $query->on('scores.participant_id', 'participants.id');
                })
                ->where('participants.category_id', $request->category_id)
                ->groupBy('p_id')
                ->get();

            $new = [];
            $min_score = 60;


            if (count($score) > 0) {
                $recap = Recap::create([
                    'category_id' => $request->category_id,
                    'desc' => $request->datefmt_set_calendar
                ]);

                if ($recap) {
                    foreach ($score as $key => $value) {
                        if ($score[$key]->jumlah_nilai > 2) {
                            array_push($new, [
                                'participant_id' => $score[$key]->p_id,
                                'score_1' => (int)explode(',', $score[$key]->nilai_juri)[0],
                                'score_2' => (int)explode(',', $score[$key]->nilai_juri)[1],
                                'score_3' => (int)explode(',', $score[$key]->nilai_juri)[2],
                                'note' => $score[$key]->catatan
                            ]);
                        } else if ($score[$key]->jumlah_nilai > 1) {
                            array_push($new, [
                                'participant_id' => $score[$key]->p_id,
                                'score_1' => (int)explode(',', $score[$key]->nilai_juri)[0],
                                'score_2' => (int)explode(',', $score[$key]->nilai_juri)[1],
                                'score_3' => $min_score,
                                'note' => $score[$key]->catatan
                            ]);
                        } else {
                            array_push($new, [
                                'participant_id' => $score[$key]->p_id,
                                'score_1' => (int)explode(',', $score[$key]->nilai_juri)[0],
                                'score_2' => $min_score,
                                'score_3' => $min_score,
                                'note' => $score[$key]->catatan
                            ]);
                        }
                    }

                    foreach ($new as $k => $v) {
                        $recapDetail = RecapDetail::create([
                            'recap_id' => $recap->id,
                            'participant_id' => $v['participant_id'],
                            'score_1' => $v['score_1'],
                            'score_2'=> $v['score_2'],
                            'score_3'=> $v['score_3'],
                            'note'=> $v['note'],
                        ]);
                    }

                    DB::commit();
                    Alert::success('Success', 'Proses Rekapitulasi Berhasil');
                    return redirect()->route('recaps.index');
                }
            } else {
                Alert::error('Error', 'Tidak dapat memproses karena belum ada nilai pada kategori yang dipilih');
                return redirect()->route('recaps.create');
            }

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recap = Recap::findOrFail($id);
        $recap_details = RecapDetail::where('recap_id', $id)
        ->select('recap_details.*', DB::raw('(recap_details.score_1 + recap_details.score_2 + recap_details.score_3) as total'))
        ->orderBy('total', 'desc')
        ->get();

        return view('judges.recaps.detail', compact(['recap', 'recap_details']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Recap::findOrFail($id);
        $photo->delete();
    }
}
