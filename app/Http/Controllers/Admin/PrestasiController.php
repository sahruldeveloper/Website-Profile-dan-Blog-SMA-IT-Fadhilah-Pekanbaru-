<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prestasi;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = Prestasi::paginate(10);

        return view('pages.admin.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Prestasi::kode();
        $prestasi = Prestasi::all();

        return view('pages.admin.prestasi.create', compact('prestasi', 'id'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/prestasi', $filename);

            $prestasi = Prestasi::create([
                'id' => $request->id,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'foto' => $filename,
               
            ]);
            return redirect(route('prestasi.index'))->with(['success' => 'Data Prestasi Baru ditambahkan!']);
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
        $prestasi = Prestasi::find($id);
        return view('pages.admin.prestasi.edit', compact('prestasi'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
             'foto' => 'image|mimes:png,jpeg,jpg'
        ]);

        $prestasi = prestasi::find($id);
        $filename = $prestasi->foto;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/prestasi', $filename);
            File::delete(storage_path('app/public/uploads/prestasi' . $prestasi->foto));
        }

        $prestasi->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'foto' => $filename
        ]);
        return redirect(route('prestasi.index'))->with(['success' => 'Data Prestasi Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        
        $prestasi->delete();

        return redirect(route('prestasi.index'))->with('success', 'Data Prestasi berhasil dihapus');
    }
}