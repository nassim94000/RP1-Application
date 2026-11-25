<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Tache;


class UtilisateurController extends Controller
{
    //

    Public function consulterPlanning (request $req){
      // A completer

      $taches = (Utilisateur::find($req -> get('tilisateur_id'))) -> 

      echo ($taches );

      
      return view('planning') 
        -> with( 'listeTache' , $taches)
        -> with( 'session' , $req);

    }
    
    //Public function consulterProfil () {

        //pas d'argument car on reconnaitra un utilisateur a sa session.
        //$listeInfoProfil = ();

      //  return view('pass') -> with( 'listeInfoProfil' , $listeInfoProfil);

   // }

   // Public function modifierProfil (request $req) {

        // attend un formulaire de modification

        //SQL a partir d'une liste $req faire un update du tuple correspondant a l'id dans la table utilisateur 

   // }

   // Public function saisirUtilisateur (){

   //     if (session() -> fonction() == 'ressources humaines'){
     //       return view('pass');

   //     }
   //     else {
  //          return redirect(/)
   //     }
        
  //  }

   // ajouterUtilisateur

   // supprimerUtilisateur

   // listerUtilisateurs

   // consulterUnProfil

  //  consulterUnPlanning

   // modifierFonction

}
