<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
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

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('konfigurasi.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $roles = Role::pluck('name', 'id');
        return view('konfigurasi.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string',
            'email'                 => 'required|string|email|unique:users',
            'role'                  => 'required|string',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'name'              => $request->name,
                'email'             => $request->email,
                'email_verified_at' => now(),
                'password'          => Hash::make($request->password),
            ];

            $user= User::create($data);
            $user->assignRole($request->role);

            DB::commit();

            Alert::success('Success', 'User created successfully');

        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

        return redirect()->route('users.index');
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
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::pluck('name', 'id');

        return view('konfigurasi.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string',
            'email'      => ['required', 'string', 'email', Rule::unique('users')->ignore($id, 'id')],
            'password'              => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|min:8',
            'role'                  => 'required|string',
        ]);

        DB::beginTransaction();

        try {

            if ($request->has('password')) {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'email_verified_at' => now(),
                    'password'          => Hash::make($request->password),
                ];
            } else {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];
            }

            $user = User::findOrFail($id);
            $user->update($data);

            $user->syncRoles([$request->role]);


            DB::commit();

            Alert::success('Success', 'User updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id)->delete();

        Alert::success('Berhasil', 'User Deleted Successfully');
        return redirect()->back();
    }
}
