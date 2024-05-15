<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::get();
            return DataTables::of($categories)
                ->addColumn('action', function ($categories) {
                    return view('datatable.action', [
                        'edit_url' => route('categories.edit', $categories->id),
                        'delete_url' => route('categories.destroy', $categories->id),
                        'data_name' => $categories->name,
                        'redirect_url' => route('categories.index'),
                        'custom' => '',
                    ]);
                })
                ->editColumn('price', function ($categories) {
                    return 'Rp. ' . Number::format($categories->price, null, null, 'id');
                })
                ->addIndexColumn()
                ->rawColumns(['created_at'])
                ->make(true);
        }

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('masterdata.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterdata.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|unique:categories',
            'price'                 => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'name'      => $request->name,
                'slug'      => strtolower(str_replace(" ", "-", $request->name)),
                'price'     => $request->price,
            ];

            $category= Category::create($data);

            DB::commit();

            Alert::success('Success', 'Category created successfully');

        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

        return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);
        return view('masterdata.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'                  => ['required', 'string', Rule::unique('users')->ignore($id, 'id')],
            'price'                 => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'name'      => $request->name,
                'slug'      => strtolower(str_replace(" ", "-", $request->name)),
                'price'     => $request->price,
            ];

            $category= Category::findOrFail($id);
            $category->update($data);

            DB::commit();

            Alert::success('Success', 'Category updated successfully');

        } catch(Exception $e) {
            DB::rollBack();
            throw $e;
            Alert::error('Terjadi Kesalahan',  'Gagal Menyimpan Data');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Category::findOrFail($id)->delete();

        Alert::success('Berhasil', 'Category Deleted Successfully');
        return redirect()->back();
    }
}
