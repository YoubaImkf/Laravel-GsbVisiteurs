<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    function faireTest(){ 
        if(session('visiteur') != null){
        $visiteur = session('visiteur');
        return view('vuetest')->with('erreurs',null)
                              ->with('visiteur',$visiteur);
    }
}
}