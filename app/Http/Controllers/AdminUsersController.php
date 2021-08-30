<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                
        $contenidos = DB::table('users')
                   ->join('role_user', 'users.id', '=', 'role_user.user_id')
                   ->where([
                        ['role_id', '=', 1],
                        ['user_id', '!=', 2],
                    ])->get();                   


        $datos = $contenidos->count();
        //dd($contenidos);

        return view('admin.adminusers.index')->with('contenidos', $contenidos)->with('datos', $datos)->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminusers.create');
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
            'email' => 'required',
            'password' => 'required',            
        ]);
                                 
        
        User::create([
            'name'        => $request['name'],
            'email'       => $request['email'],
            'password'    => Hash::make($request['password'])
        ]);
     
        $lastUserId = DB::getPdo()->lastInsertId();

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => $lastUserId
        ]);

        Mail::to($request->user())->send(new OrderShipped($order));
        
        return redirect()->route('adminusers.index')
                        ->with('success','Post creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($users)
    {
        
        DB::table('role_user')->where('user_id', '=', $users)->delete();
        DB::table('users')->where('id', '=', $users)->delete();
        //dd($users);
        return redirect()->route('adminusers.index')
                    ->with('success','Usuario borrado correctamente');
    }
}
