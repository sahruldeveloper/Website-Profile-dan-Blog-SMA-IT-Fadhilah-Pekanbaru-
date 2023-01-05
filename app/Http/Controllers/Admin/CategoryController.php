<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use\Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $category = Category::latest()->paginate(10);
       
        return view('pages.admin..category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Category::kodeKategoriBerita();
        return view('pages.admin.category.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
         'nama_kategori' => 'required|min:3|max:20' 
        ]);

        $category = Category::create([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('pages.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request,
        [
            'nama_kategori' => 'required|max:20'
        ]);

        $category =[
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ];

        Category::whereId($id)->update($category);

        return redirect()->route('category.index')->with('success', 'Update kategori berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withCount(['berita'])->find($id);
        if ($category->berita_count == null) {
            $category->delete();
            return redirect()->route('category.index')->with(['success' => 'Kategori Dihapus!']);
        }
        // $category = Category::find($id);
        // $category->delete();
        return redirect()->route('category.index')->with(['error' => 'Kategori Ini berelasi dengan data berita !']);
    
    }
}