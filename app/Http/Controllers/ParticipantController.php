<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Participant;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $participants = Participant::get();
            return DataTables::of($participants)
                ->addColumn('action', function ($participants) {
                    return view('datatable.action', [
                        'preview_url' => route('participants.show', $participants->id),
                        'delete_url' => route('participants.destroy', $participants->id),
                        'data_name' => $participants->name,
                        'redirect_url' => route('participants.index'),
                        'custom' => '',
                    ]);
                })
                ->editColumn('chest_no', function($participants) {
                    $no = explode("-", $participants->chest_no);
                    return $no[1];
                })
                ->editColumn('created_at', function ($participants) {
                    return '<span class="badge text-bg-light">' . Carbon::parse($participants->created_at)->locale('en_EN')->isoFormat('dddd, DD MMMM YYYY') . '</span>';
                })
                ->addColumn('flying_series', function($participants) {
                    return $participants->flight->serie . $participants->flight->session . " - " . Carbon::parse($participants->flight->date)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY');
                })
                ->addIndexColumn()
                ->rawColumns(['created_at'])
                ->make(true);
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('participants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:12',
            'category_id' => 'required|integer',
            'flight_id' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {

            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'category_id' => $request->category_id,
                'flight_id' => $request->flight_id,
            ];

            $participant = Participant::create($data);

            DB::commit();

            Alert::success('Success', 'Participant created successfully');

            return redirect()->route('participants.show', $participant->id);
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
        $participant = Participant::select('*', DB::raw('IF(status = 1, "Lunas", "Belum Bayar") as payment_status'))
                       ->where('id', $id)->first();

        $title = "Confirm";
        $text = "Confirm";
        confirmDelete($title, $text);

        return view('participants.preview', compact(['participant']));
    }

    /**
     * Confirm payment status
     */

    public function confirmPayment(string $id) {
        $participant = Participant::findOrFail($id);
        $participant->status = 1;
        $participant->save();
    }

    /**
     * Cancel payment status
     */

     public function cancelPayment(string $id) {
        $participant = Participant::findOrFail($id);
        $participant->status = 0;
        $participant->save();
    }

    public function print(string $id) {
        $participant = Participant::findOrFail($id);
        $date = Carbon::now();
        $qrcode = QrCode::size(100)->generate(url('/') . '/participants/'. $participant->id);

        
        // return view('participants.print', compact(['participant', 'date', 'qrcode']));
        $pdf = Pdf::loadView('participants.print', ['participant' => $participant, 'date' => $date, 'qrcode' => $qrcode]);
    	return $pdf->download('bukti-pendaftaran-'.str_replace(".", "-", $participant->trx_number).'.pdf');
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
        $participant = Participant::findOrFail($id)->delete();
    }
}
