<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Category;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('pages.admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Berita::kodeBerita();
        $category = Category::all();
        return view('pages.admin.berita.create', compact('category', 'id'));
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
            'judul' => 'required|max:55',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);

            $berita = Berita::create([
                'id' => $request->id,
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'isi' => $request->isi,
                'gambar' => $filename,
                'slug' => Str::slug($request->judul),
                'users_id' => Auth::id()
                
            ]);
            return redirect(route('berita.index'))->with(['success' => 'Berita Baru Ditambahkan']);
        }
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
        $berita = Berita::find($id);
        $category = Category::orderBy('nama_kategori', 'DESC')->get();
        return view('pages.admin.berita.edit', compact('berita', 'category'));
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
        $this->validate($request, [
            
            'judul' => 'required|max:55',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);

        $berita = Berita::find($id);
        $filename = $berita->gambar;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/', $filename);
            File::delete(storage_path('app/public/uploads/' . $berita->gambar));
        }

        $berita->update([
            
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'gambar' => $filename
        ]);
        return redirect(route('berita.index'))->with(['success' => 'Data Berita Diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        
        $berita->delete();
      

        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }

    // public function tampil_hapus() {
    //     $berita = Berita::onlyTrashed()->paginate(10);

    //     return view('pages.admin.berita.hapus', compact('berita'));
    // }

    // public function restore($id) {
    //     $berita = Berita::withTrashed()->where('id', $id)->first();
    //     $berita->restore();

    //     return redirect(route('berita.index'))->with(['success' => 'Data Berita berhasil di restore']);

        
    // }

    // public function kill($id)
    // {
    //     $berita = Berita::withTrashed()->where('id', $id)->first();
    //     File::delete(storage_path('app/public/uploads/' . $berita->gambar));
    //     $berita->forceDelete();
       
       

    //     return redirect()->back()->with('success', 'Berita berhasil dihapus');

    // }
}