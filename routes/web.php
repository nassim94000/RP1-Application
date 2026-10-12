<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\AuthentificationController;
use Illuminate\Support\Facades\Route;


// ==================================================================
// ======================= General
// ==================================================================

//Racine
Route::get('/', function () {
    
    return redirect('/getVueConnexion');
});

//Saisir connexion
Route::get('/getVueConnexion' , [AuthentificationController::class , 'getVueConnexion']);

//Se connecter
Route::get('/seConnecter' [AuthentificationController::class , 'seConnecter']); 

//Se deconnecter
Route::get('/seDeconnecter' [AuthentificationController::class , 'seDeconnecter']); 

//Saisir le nouveau MDP
Route::get('/getVueMdp' [AuthentificationController::class , 'getVueMdp'])

//En cas de premiere connexion
Route::get('/saisirNouveauMDP' [AuthentificationController::class , 'saisirNouveauMDP'])



// ==================================================================
// ======================= Operationel
// ==================================================================

// ====== operations sur les groupes ======

//Rejoindre un groupe
route::get('/groupe/rejoindre/{idGroupe}' , [GroupeController::class , 'rejoindreGroupe']); 

//Quitter un groupe
route::get('/groupe/quitter/{idGroupe}' , [GroupeController::class , 'quitterGroupe']);

//Consulter la listes des groupes
route::get('/groupe/listerGroupe' , [GroupeController::class , 'listerLesGroupes']);

//Consulter un groupe
route::get('/groupe/consulter/{idGroupe}' , [GroupeController::class , 'consulterGroupe']);

//Consulter les membres d un groupe 
route::get('/groupe/consulterMembres/{idGroupe}' , [GroupeController::class , 'consulterMembres']);


// ====== operation sur les planning ======

//Consulter l emploi du temps 
route::get('/utilisateur/planning' , [UtilisateurController::class , 'consulterPlanning']);


// ====== operations sur les profils ======

//Consulter le profil
route::get('/utilisateur/profil/consulter' , [UtilisateurController::class , 'consulterProfil']);

//Modifier le profil
route::post('/utilisateur/profil/modifier' , [UtilisateurController::class , 'modifierProfil']); //formulaire


// ====== operations sur les taches ======

//Consulter une tache 
route::get('/tache/consulter/{idTache}' , [TacheController::class , 'consulterTache']);

//Saisir une tache
route::get('/tache/saisir' , [TacheController::class , 'saisirTache']);

//Ajouter une tache
route::post('/tache/ajouter' , [TacheController::class , 'ajouterTache']); //formulaire

//Modifier une tache
route::post('/tache/modifier/{idTache}' , [TacheController::class , 'modifierTache']); //formulaire

//Supprimer une tache
route::get('/tache/supprimer/{idTache}' , [TacheController::class , 'supprimerTache']);

// ==================================================================
// ======================= Profil chef de projets
// ==================================================================

// ====== Operation sur les groupes ======

//Creer un groupe
route::post('/groupe/creer' , [GroupeController::class , 'creerGroupe']); //formulaire


// ==================================================================
// ======================= Profil ressources humaines
// ==================================================================

// ====== Gerer les invitations aux groupes ======

//Lister les invitations
route::get('/groupe/listerInvitations' , [GroupeController::class , 'listerInvitations']);

//Accepter l invitation a un groupe : 
route::get('/groupe/accepterInvitation' , [GroupeController::class , 'accepterInvitation']);

//Refuser l invitation a un groupe : 
route::get('/groupe/refuserInvitation' , [GroupeController::class , 'refuserInvitation']);


// ====== Gerer les utilisateurs ======

//Entrer un utilisateur 
route::get('/utilisateur/saisir' , [UtilisateurController::class , 'saisirUtilisateur']);

//Ajouter un utilisateur 
route::post('/utilisateur/ajouter' , [UtilisateurController::class , 'ajouterUtilisateur']); //formulaire

//Supprimer un utilisateur 
route::get('/utilisateur/supprimer/{idUtilisateur}' , [UtilisateurController::class , 'supprimerUtilisateur']);

//Lister les utilisateurs
route::get('/utilisateur/listerUtilisateurs' , [UtilisateurController::class , 'listerUtilisateurs']);

//Consulter le profil d'un utlisateur
route::get('/utilisateur/unProfil/{idUtilisateur}' , [UtilisateurController::class , 'consulterUnProfil']);

//Consulter le planning d'un utlisateur
route::get('/utilisateur/unPlanning/{idUtilisateur}' , [UtilisateurController::class , 'consulterUnPlanning']);

//Modifier la fonction d'un utilisateur
route::post('/utilisateur/modifierFonction/{idUtilisateur}' , [UtilisateurController::class , 'modifierFonction']); //formulaire


// ==================================================================
// ======================= Administrateur de groupe
// ==================================================================

// ====== Gerer les membres du groupe ======

//Ajouter un membre
route::get('/groupe/membre/ajouter' , [GroupeController::class , 'ajouterMembre']);


//Supprimer un membre
route::get('/groupe/membre/supprimer/{idUtilisateur}' , [GroupeController::class , 'supprimerMembre']);


//Donner les droits administrateur a un membre
route::get('/groupe/membre/droit/attribuer/{idUtilisateur}' , [GroupeController::class , 'attribuerDroit']);


//Revoquer les droits administrateur a un membre
route::get('/groupe/membre/droit/revoquer/{idUtilisateur}' , [GroupeController::class , 'revoquerDroit']);


//Consulter les disponibilite d un membre 
route::get('/groupe/membre/disponibilites/{idUtilisateur}' , [GroupeController::class , 'consulterDisponibilitesMembre']);


//Saisir une tache de groupe
route::get('/tache/groupe/saisir' , [TacheController::class , 'saisirTacheGroupe']);


//Ajouter une tache de groupe
route::post('/tache/groupe/ajouter' , [TacheController::class , 'ajouterTacheGroupe']); //formulaire


//Modifier une tache de groupe
route::post('/tache/groupe/modifier/{idTache}' , [TacheController::class , 'modifierTacheGroupe']); //formulaire
