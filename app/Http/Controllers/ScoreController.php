<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $scores = Score::get();
            return DataTables::of($scores)
                ->addColumn('participant_no', function($scores) {
                    $number = explode("-", $scores->participant->chest_no);
                    return $number[1];
                })
                ->addColumn('flight_serie', function($scores) {
                    return $scores->participant->flight->serie . $scores->participant->flight->session . '-' .Carbon::parse($scores->participant->flight->date)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY');
                })
                ->addColumn('action', function ($scores) {
                    return view('datatable.action', [
                        'edit_url' => route('scores.edit', $scores->id),
                        'delete_url' => route('scores.destroy', $scores->id),
                        'data_name' => $scores->participant->chest_no,
                        'redirect_url' => route('scores.index'),
                        'custom' => '',
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('judges.scores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('judges.scores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'participant_id' => 'integer|string',
            'score' => 'required|string',
            'note' => 'string|nullable',
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'participant_id' => $request->participant_id,
                'score' => $request->score,
                'note' => $request->note
            ];

            $count = Score::where('participant_id', $request->participant_id)->count();

            if($count >= 3) {
                Alert::error('Tidak dapat menambahkan nilai', 'Peserta sudah memiliki 3 nilai');
                return redirect()->route('scores.create');
            } else {
                $score = Score::create($data);
                DB::commit();
                Alert::success('Success', 'Score added successfully');
                return redirect()->route('scores.index');
            }
        } catch(Exception $e) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $score = Score::findOrFail($id);

        return view('judges.scores.edit', compact(['score']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'participant_id' => 'integer|string',
            'score' => 'required|string',
            'note' => 'string|nullable',
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'participant_id' => $request->participant_id,
                'score' => $request->score,
                'note' => $request->note
            ];

            $score = Score::findOrFail($id);

            $count = Score::where('participant_id', $request->participant_id)->whereNot('id', $id)->count();

            if($count >= 3) {
                Alert::error('Tidak dapat menambahkan nilai', 'Peserta sudah memiliki 3 nilai');
                return redirect()->route('scores.edit', $id);
            } else {
                $score->update($data);
                DB::commit();
                Alert::success('Success', 'Score updated successfully');
                return redirect()->route('scores.index');
            }
        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $score = Score::findOrFail($id);
        $score->delete();
    }
}
