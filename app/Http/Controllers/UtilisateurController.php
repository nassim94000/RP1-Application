 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //

    Public function consulterPlanning (request $req){
        """
        Melina -> Recuper toutes les taches de l'utilisateur $req->session()->get('id_utilisateur') puis les affecter dans une liste de tableaux associatifs. 
        ex :

        $taches = (
        ['libelle' => nomTache, 'description' => description, ...],
        ['libelle' => nomTache, 'description' => description, ...],
        ...
        );

        """

        return view('pass') -> with( 'listeTache' , $taches);

    }

    Public function consulterProfil () {

        //pas d'argument car on reconnaitra un utilisateur a sa session.
        $listeInfoProfil = ();

        return view('pass') -> with( 'listeInfoProfil' , $listeInfoProfil);

    }

    Public function modifierProfil (request $req) {

        // attend un formulaire de modification

        //SQL a partir d'une liste $req faire un update du tuple correspondant a l'id dans la table utilisateur 

    }

    Public function saisirUtilisateur (){

        if (session() -> fonction() == 'ressources humaines'){
            return view('pass');

        }
        else {
            return redirect(/)
        }
        
    }

    ajouterUtilisateur

    supprimerUtilisateur

    listerUtilisateurs

    consulterUnProfil

    consulterUnPlanning

    modifierFonction

}
