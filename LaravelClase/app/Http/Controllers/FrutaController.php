<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationFormRequest;
use App\Models\Fruit;
use Illuminate\Http\Request;

class FrutaController extends Controller
{
    public function index(){
        return view('frutas.index')->with('frutas', array('manzana', 'pera', 'melocoton', 'cereza'));
    }

    public function recibirFormulario (ValidationFormRequest $request){
        //echo $request->input( 'nombre');
       /** if ($request->input( 'nombre') != 'peras'){
            return redirect()->route('frutas')->withInput()->with('error', 'Se ha producido un error');
        }
        else{
            return redirect()->route('peras');
        }
        *
        * */

       $request->validated();
    }

    public function naranjas(){

    }

    public function peras(){

        //$f = Fruit::find(2);
        //$f = Fruit::findOrFail(2);
        //$f = Fruit::all();
        $f = Fruit::where('temporada', 1)->first();
        //dd($f);

        return view('frutas.peras')->with('frutas', $f);
    }
}
