<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function __construct() {
        // $this->middleware('can:create-role')->only('create');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $roles = Role::get();
            return DataTables::of($roles)
            ->addColumn('action', function ($roles) {
                return view('datatable.action', [
                    'edit_url' => route('roles.edit', $roles->id),
                    'delete_url' => route('roles.destroy', $roles->id),
                    'data_name' => $roles->name,
                    'redirect_url' => route('roles.index'),
                    'custom' => '',
                ]);
            })
            ->editColumn('created_at', function($roles) {
                return '<span class="badge text-bg-light">'. Carbon::parse($roles->created_at)->locale('en_EN')->isoFormat('dddd, DD MMMM YYYY') .'</span>';
            })
            ->addIndexColumn()
            ->rawColumns(['created_at'])
            ->make(true);
            }
    
            $title = 'Delete User!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);
    
            return view('konfigurasi.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');

        return view('konfigurasi.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'permissions'   => 'required|array'      
        ]);

       
        DB::beginTransaction();
        

        try {
            $data = [
                'name' => $request->name,
            ];

            $role= Role::create($data);
            
            $role->givePermissionTo($request->permissions);

            DB::commit();

            Alert::success('Success', 'Role created successfully');

        } catch(Exception $e) {
            DB::rollBack();
            Alert::error('Gagal menyimpan data', $e);
        }

        return redirect()->route('roles.index');
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
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::pluck('name', 'id');

        // dd($role->permissions);
        return view('konfigurasi.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'          => 'required|string',
            'permissions'   => 'required|array'      
        ]);

       
        DB::beginTransaction();
        

        try {
            $data = [
                'name' => $request->name,
            ];

            $role = Role::findOrFail($id);
            $role->update($data);
            
            $role->syncPermissions($request->permissions);

            DB::commit();

            Alert::success('Success', 'Role updated successfully');

        } catch(Exception $e) {
            DB::rollBack();
            Alert::error('Gagal menyimpan data', $e);
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id)->delete();
    }
}
