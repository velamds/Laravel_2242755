<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrar($id = null){
        if(!$id){
            return "debe ingresar un id";
        }
        return 'id = '.$id;
    }
}
