<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = User::all();
        return view('owner.akun', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        return redirect(url('/owner/akun'))->with('sukses', 'Data User Berhasil Ditambah');
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
        //
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
        // $email = User::where('email', $request->email_edit)->get();
        $users = DB::table('users')
            ->where('email', $request->email_edit)
            ->first();
        if (!empty($users)) {
            if ($users->id == $id) {
                $email =  'required';
            } else {
                $email =  'required|unique:users,email';
            }
        } else {
            $email =  'required|unique:users,email';
        }
        $request->validate([
            'name_edit' => 'required',
            'email_edit' => $email,
            'password_edit' => 'required',
            'role_edit' => 'required'
        ]);
        User::where('id', $id)
            ->update([
                'name' => $request->name_edit,
                'email' => $request->email_edit,
                'password' => bcrypt($request->password_edit),
                'role' => $request->role_edit
            ]);
        return back()->with('sukses', 'Data User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user')->with('sukses', 'Data User Berhasil Dihapus');
    }
}
