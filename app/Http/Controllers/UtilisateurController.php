<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //

    public function voirUtlisateurs (){

        $utilisateurs = array('Rayan', 'Evan', 'CHELABI');

        return $utilisateurs;
    }

    Public function voirUnUtlisateurs ($test){

        return view('test') -> with( 'test' , $test);
    }

}
