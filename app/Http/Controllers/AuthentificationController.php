<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //pour gerer les formulaires
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{


    //Saisir connexion
    public function getVueConnexion (request $req){ 

        //Verification de la session
        if ( $req -> has('email')){
            return redirect('/utilisateur/planning');
        }
        else {
            return view('nomVueConnexion') //NASSIME -> changer le nom de la vue
        }
    }


    //Se connecter
    public function seConnecter(request $req){ //recoit un formulaire -> reourne la vue de l'utilisateur
        // A COMPLETER
        $identifiants = $req ->only(['email', 'password']);

        
        // i pour "insensitive" pour inclure a la fois les minuscules et les majuscules
        if (!preg_match ('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i', $identifiants['email']) && $identifiants['password'] == ''){
            
            return redirect('/getVueConnexion');
        
        }

        try { 
            Auth::validate($identifiants) || throw new \Illuminate\Auth\AuthenticationException ('identifiant ou mot de passe incorect'); //creation d'une nouvelle exception

            // MELINA -> faire la requete de recuperation des donnees  puis stocker les valeurs dans le dictionnaire suivant

            $dict = [
            'id_utilisateur' =>   ,
            'nom' =>   ,
            'prenom' =>  ,
            'email' =>   ,
            'fonction' => ,
            ];

            //creation de la session
            $req -> session() -> put($dict);

            //Verification premier mot de passe
            //MELINA -> valeur de l'attribut premiereConnexion de l'utilisateur et l'affecter a la variable $pC
            $pC = FALSE;

            if ($pC){
                return view('nomDeLaVue'); //NASSIME -> nom de la vue de changement de mdp de la premiere connexion
            }
            else {
                return redirect('/utilisateur/planning') ;
            }
        }
        catch (\Illuminate\Auth\AuthenticationException $e){ 
            return redirect('/');
        }

        catch (\Exception $e){ //CHANGER A LA FIN
            return $e -> getMessage();
        } 
    }

    //Se deconnecter
    public function seDeconnecter(request $req){

        $req -> session() -> flush();
        return redirect('/');
    }


    //saisir nouveau MDP
    public function getVueMdp(request $req){

        //Verification de la session
        if ( $req -> has('email')){
            return redirect('/utilisateur/planning');
        }

        return view('nomDeLaVue') // NASSIME -> Changer par la vue de modification de mot de passe

    }

    //nouveau MDP
    public function nouveauMDP(request $req){

        $newMdpTester = $req -> all();

        if ($newMdpTester['nouveau_mot_de_passe'] == '' || $newMdpTester['verification_nouveau_mot_de_passe'] == ''){
            return redirect('/nouveauMDP');
        }
        if ($newMdpTester['nouveau_mot_de_passe'] === $newMdpTester['verification_nouveau_mot_de_passe']){

            try {

                //MELINA -> update l'attribut mdp de l'utilisateur req->session()->get['id_utilisateur'] par la variable $newMdpTester['nouveau_mot_de_passe'] 

            }
            catch (\Exception $e){
                return $e -> getMessage(); //A CHANCGER A LA FIN
            }
        }
    }
}