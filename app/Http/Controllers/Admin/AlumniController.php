<?php

namespace App\Http\Controllers\Admin;

use App\Models\alumni;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = alumni::paginate(10);

        return view('pages.admin.alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumni = alumni::all();
        return view('pages.admin.alumni.create', compact('alumni'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time(). Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/alumni', $filename);

            $alumni = alumni::create([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi,
                'foto' => $filename,
               
            ]);
            return redirect(route('alumni.index'))->with(['success' => 'Data Alumni Baru ditambahkan!']);
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
        $alumni = alumni::find($id);
        return view('pages.admin.alumni.edit', compact('alumni'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            // 'foto' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        $alumni = alumni::find($id);
        $filename = $alumni->foto;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/alumni', $filename);
            File::delete(storage_path('app/public/uploads/alumni' . $alumni->foto));
        }

        $alumni->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
            'foto' => $filename
        ]);
        return redirect(route('alumni.index'))->with(['success' => 'Data Alumni Diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumni = alumni::find($id);
        
        $alumni->delete();

        return redirect(route('alumni.index'))->with('success', 'Data Alumni berhasil dihapus');
    }
}