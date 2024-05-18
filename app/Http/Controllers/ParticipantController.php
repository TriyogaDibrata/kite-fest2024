<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        $category = Category::findOrFail($request->category_id);

        $chest_no_length = (strlen($category->acronym) + $category->chest_no_digits);
        $chest_no_prefix =  $category->acronym . $category->chest_no_prefix;

        dd($chest_no_length, $chest_no_prefix );

        try {
            $data = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'category_id' => $request->category_id,
                'flight_id' => $request->flight_id,
                // 'chest_no' => ,
                // 'slug' => ,
            ];
        } catch (Exception $e) {
            throw $e;
            DB::rollBack();
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
        //
    }
}
