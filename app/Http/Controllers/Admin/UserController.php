<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.admin.user.index', compact('users'));
    }

    /**     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = User::kode();
        $user = User::all();
       return view('pages.admin.user.create', compact('user', 'id'));
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
            'name' => 'required|min:3|max:100',
            'email' => 'required',
            'roles' => 'required',
        ]);

        

        if ($request->input('password')) {
            User::create([
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'roles' => $request->roles,
                'password' => bcrypt($request->password),
            ]);
            
    
        } else {
            User::create([
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'roles' => $request->roles,
                'password' => bcrypt('12345'),
            ]);

           
            // return redirect(route('user.index'))->with(['success' => 'User Baru Ditambahkan dengan password default 12345']);
        }

        return redirect(route('user.index'))->with(['success' => 'User Baru Ditambahkan']);        
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
        $user  =User::find($id);
        

        return view('pages.admin.user.edit', compact('user'));
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
            'name' => 'required|min:3|max:100',
            'roles' => 'required',
        ]);

        if($request->input('password')) {
            $user_data = [
                'name' => $request->name,
                'roles' => $request->roles,
                'password' => bcrypt($request->password),
            ];
        }
        else {
            $user_data = [
                'name' => $request->name,
                'roles' => $request->roles,
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('success', 'Data User Berhasil di update');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withCount(['berita'])->find($id);
        if ($user->berita_count == 0) {
            $user->delete();
            return redirect()->route('user.index')->with(['success' => 'Kategori Dihapus!']);
        }
        // $user = User::find($id);
        // $user->delete();
        return redirect()->route('user.index')->with(['error' => 'User Ini berelasi dengan data berita !']);
       
    }
}