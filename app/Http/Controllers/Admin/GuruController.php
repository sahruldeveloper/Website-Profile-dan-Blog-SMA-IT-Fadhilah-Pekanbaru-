<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use Illuminate\Support\Str;
use File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10);
        return view('pages.admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Guru::kode();
        $guru = Guru::all();
        return view('pages.admin.guru.create', compact('guru', 'id'));
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
            'nama_guru' => 'required|max:55',
            'jabatan' => 'required|max:20',
            'alamat' => 'required|max:100',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required',
            'agama' => 'required|max:7',
            'jk' => 'required|max:9',
            'foto' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::slug($request->nama_guru) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);

            $guru = Guru::create([
                'id' => $request->id,
                'nama_guru' => $request->nama_guru,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'jk' => $request->jk,
                'foto' => $filename,
                'slug' => Str::slug($request->nama_guru),
                
            ]);
           
            return redirect(route('guru.index'))->with(['success' => 'Data Guru Baru Ditambahkan']);
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
        $guru = Guru::find($id);
        return view('pages.admin.guru.edit', compact('guru'));
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
            'nama_guru' => 'required|max:55',
            'jabatan' => 'required|max:20',
            'alamat' => 'required|max:100',
            'tempat_lahir' => 'required|max:20',
            'tanggal_lahir' => 'required',
            'agama' => 'required|max:7',
            'jk' => 'required|max:9',
            'foto' => 'image|mimes:png,jpeg,jpg'
          
        ]);
       

        $guru = Guru::find($id);
        $filename = $guru->foto;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/', $filename);
            File::delete(storage_path('app/public/uploads/' . $guru->foto));
        }

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'slug' => Str::slug($request->nama_guru),
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jk' => $request->jk,
            'foto' => $filename,
        ]);
        return redirect(route('guru.index'))->with(['success' => 'Data Guru Diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_guru)
    {
        $guru = Guru::find($id_guru);
        
        $guru->delete();

        return redirect()->back()->with('success', 'Data Guru berhasil dihapus');
    }
}