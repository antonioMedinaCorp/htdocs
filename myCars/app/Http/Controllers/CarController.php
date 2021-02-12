<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::FindorFail(Auth::id());
        $myCars = $user->cars()->get();
        return view('car.index')->with('myCars', $myCars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
           'matricula'=> 'required',
           'marca' => 'required',
           'modelo' => 'required',
           'foto' => 'required|image',
        ]);

        $newcar = new Car();
        $newcar->matricula = $request->matricula;
        $newcar->marca = $request->marca;
        $newcar->modelo = $request->modelo;
        $newcar->year = $request->year;
        $newcar->color = $request->color;
        $newcar->fecha_ultima_revision = $request->ult_revision;
        $newcar->precio = $request->precio;
        $newcar->user_id = Auth::id();

        $nombreFoto = time().'_'.$request->file('foto')->getClientOriginalName();

        $newcar->foto = $nombreFoto;

        $newcar->save();

        $request->file('foto')->storeAs('public/img',$nombreFoto);

        return view('car.index');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'vista show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'vista editar';
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
        return 'vista update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'vista destroy';
    }
}
