<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flight;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $flights = Flight::select('*', DB::raw('CONCAT(serie, session) as flight_series'))->get();
            return DataTables::of($flights)
                ->addColumn('time', function ($flights) {
                    $start = Carbon::parse($flights->start)->locale('id_ID')->format('H:i');
                    $end = Carbon::parse($flights->end)->locale('id_ID')->format('H:i');

                    return '<span class="badge bg-info text-dark">' . $start . ' - ' . $end . ' WITA </span>';
                })
                ->addColumn('action', function ($flights) {
                    return view('datatable.action', [
                        'edit_url' => route('flights.edit', $flights->id),
                        'delete_url' => route('flights.destroy', $flights->id),
                        'data_name' => 'Serie Terbang ' . $flights->flight_series . ' - ' . Carbon::parse($flights->date)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY'),
                        'redirect_url' => route('flights.index'),
                        'custom' => '',
                    ]);
                })
                ->editColumn('date', function ($flights) {
                    return '<span class="badge text-bg-light">' . Carbon::parse($flights->date)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY') . '</span>';
                })
                ->addIndexColumn()
                ->rawColumns(['date', 'time'])
                ->make(true);
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('masterdata.flights.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('masterdata.flights.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'serie' => 'required|string',
            'session' => 'required|integer',
            'category_id' => 'required|integer',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i',
            'limit' => 'required|integer'
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'serie' => $request->serie,
                'session' => $request->session,
                'category_id' => $request->category_id,
                'date' => $request->date,
                'start' => $request->start,
                'end' => $request->end,
                'limit' => $request->limit
            ];

            $flight = Flight::create($data);

            DB::commit();

            Alert::success('Success', 'Flight series has been created');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

        return redirect()->route('flights.index');
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
        $flight = Flight::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        
        return view('masterdata.flights.edit', compact('flight', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'serie' => 'required|string',
            'session' => 'required|integer',
            'category_id' => 'required|integer',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i',
            'limit' => 'required|integer'
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'serie' => $request->serie,
                'session' => $request->session,
                'category_id' => $request->category_id,
                'date' => $request->date,
                'start' => $request->start,
                'end' => $request->end,
                'limit' => $request->limit
            ];

            $flight = Flight::findOrFail($id);

            $flight->update($data);

            DB::commit();

            Alert::success('Success', 'Flight series has been updated');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

        return redirect()->route('flights.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Flight::findOrFail($id);

        $flight->delete();
    }
}
