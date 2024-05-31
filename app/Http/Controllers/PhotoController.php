<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Photo;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $photos = Photo::get();
            return DataTables::of($photos)
                ->addColumn('participant_no', function ($photos) {
                    $number = explode("-", $photos->participant->chest_no);
                    return $number[1];
                })
                ->editColumn('full_path', function ($photos) {
                    return '<img style="width: 100px; height: 100px; object-fit: cover;" src="'.$photos->full_path.'"/>';
                })
                ->addColumn('action', function ($photos) {
                    return view('datatable.action', [
                        'edit_url' => route('photos.edit', $photos->id),
                        'delete_url' => route('photos.destroy', $photos->id),
                        'data_name' => $photos->participant->chest_no,
                        'redirect_url' => route('photos.index'),
                        'custom' => '',
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['full_path'])
                ->make(true);
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('judges.photos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('judges.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|integer',
            'image' => 'mimes:png,jpg,jpeg,gif|max:5000'
        ]);

        DB::beginTransaction();

        try {
            $photo = Photo::create([
                'participant_id' => $request->participant_id
            ]);

            $participant = Participant::find($request->participant_id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . "_" . $participant->chest_no . "." . $file->getClientOriginalExtension();
                $file->storeAs('uploads/', $filename, 'public');
                $path = '/storage/uploads/' . $filename;
                $photo->update([
                    'path' => $path,
                    'full_path' => url($path),
                ]);
            }

            DB::commit();
            Alert::success('Success', 'Photo added successfully');
            return redirect()->route('photos.index');
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
        //
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
        $photo = Photo::findOrFail($id);
        $photo->delete();
    }
}
