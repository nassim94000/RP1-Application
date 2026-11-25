<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //pour gerer les formulaires
use Illuminate\Support\Facades\Auth;
use App\Models\ModelSynchro;

class AuthentificationController extends Controller
{


    //Saisir connexion
    public function getVueConnexion (request $req){ 

        //Verification de la session
        if ( $req -> has('email')){
            return redirect('/utilisateur/planning');
        }
        else {
            return view('connexion');
        }
    }
    public function testConnexion (){
        $allUser = ModelSynchro::getAllUser();
        return $allUser;
    }

    //Se connecter
    public function seConnecter(request $req){ //recoit un formulaire -> reourne la vue de l'utilisateur
        // A COMPLETER
        $identifiants = $req->validate([
            'email' => 'required|email',
            'mdp'   => 'required',
        ]);

        
        // i pour "insensitive" pour inclure a la fois les minuscules et les majuscules
        if (!preg_match ('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i', $identifiants['email']) && $identifiants['password'] == ''){
            
            return redirect('/getVueConnexion');
        }

        try { 
            

            $utilisateur = Utilisateur::where('email', $identifiants['email'])->first();

            if (!$utilisateur || $utilisateur->mdp !== $identifiants['mdp']) {
                return redirect('/')->withErrors(['email' => 'Identifiant ou mot de passe incorrect']);
            }

            $req->session()->regenerate();

            $dict = [
                'utilisateur_id'        => $utilisateur->utilisateur_id,
                'nom'                   => $utilisateur->nom,
                'prenom'                => $utilisateur->prenom,
                'email'                 => $utilisateur->email,
                'fonction'              => $utilisateur->fonction,
                'premiere_connexion'    => $utilisateur->premiere_connexion,
            ];


            //creation de la session
            $req -> session() -> put($dict);

            //Verification premier mot de passe

            if ($utilisateur->premiere_connexion){
                return redirect('/utilisateur/planning'); 
            }
            
            return redirect('/utilisateur/planning');

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

        return view('nomDeLaVue'); // NASSIME -> Changer par la vue de modification de mot de passe

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