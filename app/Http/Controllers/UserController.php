<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::OrderBy('id', 'DESC')->paginate(10);
       return view ('user/index')->with(compact('users'));   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user/create');   
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = new User($request->only('name','email', 'password'));
        $user->save();
        Alert::success('', 'el usuario ha sido registrado con exito!')->persistent('Close');
        return redirect()->route('user.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view ('user/update')->with(compact('user'));   
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
        $user = User::findOrFail($id);
        if ($request->password != null) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|unique:users,email,'.$user->id,
                'password' => 'required|min:8|confirmed'
            ]);
            $user->update($request->only('name','email', 'password'));
        }else {

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|unique:users,email,'.$user->id
            ]);

            $user->update($request->only('name','email'));
        }
        Alert::success('', 'el usuario ha sido Actualizado con exito!')->persistent('Close');

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('', 'el usuario  ha sido Eliminado con exito!')->persistent('Close');

        return redirect()->route('user');

    }
}
