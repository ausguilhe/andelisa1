<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // listar todos os users
        $users = user::orderBy('name', 'ASC')->get();
        //dd($users);
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        //dd($data);

        $message = [
            'name.required' => 'O campo nome é obrigatório',
            'name.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Este email não é válido',
            'password.required' => 'O campo password é obrigatório',
            'password.same' => 'A senha precisa ser identica',
        ];

        $validateData = $request->validate([
            'name'         => 'required|min:2',
            'email'        => 'required',
            'password'     => 'required',
            //'password'     => 'required',
        ], $message);

        $user = new user;
        $user->name          =$request->name;
        $user->email         =$request->email;
        $user->password      =$request->password;
        //$user->password      =$request->password;
        $user->save();

        return redirect()->route('user.index')->with('message', 'Usuário criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user $Usario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("EDITAR o registro {$id});
        $user = user::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'name.required' => 'O campo nome é obrigatório',
            'name.mim' => 'O campo nome precisa ter no mínimo :mim caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Este email não é válido',
            'password.required' => 'O campo password é obrigatório',
            'password.same' => 'A senha precisa ser identica',
        ];

        $validateData = $request->validate([
            'name'         => 'required|min:2',
            'email'        => 'required',
            'password'     => 'required',
            //'password'     => 'required',
        ], $message);

        $user = user::findOrFail($id);
        $user->name          =$request->name;
        $user->email         =$request->email;
        $user->password      =$request->password;
        //$user->password      =$request->password;
        $user->save();

        return redirect()->route('user.index')->with('message', 'Usuário editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @param  \App\Models\\\user $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('message', 'Usuário excluido com sucesso!');
    }
}