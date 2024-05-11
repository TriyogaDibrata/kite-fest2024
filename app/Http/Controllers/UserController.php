<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->ajax()) {
        $user = User::with('roles')->get();
        return DataTables::of($user)
        ->addColumn('role', function ($user) {
            if ($user->roles[0]['name'] == 'admin-regis') {
                return '<span class="badge text-bg-primary">'. $user->roles[0]['name'] .'</span>';
            } elseif ($user->roles[0]['name'] == 'admin-judge') {
                return '<span class="badge text-bg-success">'. $user->roles[0]['name'] .'</span>';
            } elseif ($user->roles[0]['name'] == 'super-admin') {
                return '<span class="badge text-bg-danger">'. $user->roles[0]['name'] .'</span>';
            } elseif ($user->roles[0]['name'] == 'super-admin') {
                return '<span class="badge text-bg-info">'. $user->roles[0]['name'] .'</span>';
            } elseif ($user->roles[0]['name'] == 'developer') {
                return '<span class="badge text-bg-warning">'. $user->roles[0]['name'] .'</span>';
            } else {
                return '<span class="badge text-bg-dark">'. $user->roles[0]['name'] .'</span>';
            }
        })
        ->addColumn('action', function ($user) {
            return view('datatable.action', [
                'edit_url' => route('users.edit', $user->id),
                'delete_url' => route('users.destroy', $user->id),
                'data_name' => $user->name,
                'redirect_url' => route('users.index'),
                'custom' => '',
            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['role'])
        ->make(true);
        }

        return view('konfigurasi.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id)->delete();
    }
}
