<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPut;
use App\User;
use App\Http\Requests\StoreUserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(4); //sustituye a ->get()
        //dd($users);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create", ['user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {

        User::create(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'rol_id' => 1, // rol de regular
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]
        );
        return back()->with('status', 'Usuario creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {

        $user->update(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
            ]
        );
        return back()->with('status', 'Usuario actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'Usuario eliminado con éxito');
    }
}
