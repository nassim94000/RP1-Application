<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ModelSynchro extends Model {

    private static $connexion = null ;
    
    private function __construct(){
		self::$connexion = DB::connection()->getPdo();

	}

	public static function getConnexion(){
		if( self::$connexion == null ){
			new ModelSynchro() ;
		}
		return self::$connexion ;
	}

	public static function getAllUser () {
		$bd = self::getConnexion() ;
		$sql = "SELECT" 
            . "*" 
            . "FROM utilisateur";
        
        $st = $bd->prepare( $sql ) ;
		$st->execute() ;
		$allUser = $st->fetch() ;
		$st->closeCursor() ;

		return $allUser;
	}

    public static function getTaches ( $idUtilisateur ){
        $bd = self::getConnexion() ;
		$sql = "SELECT" 
            . "p.id_tache , t.libelle , t.description, t.date_debut , t.date_fin , t.importance, t.statut" 
            . "FROM planning p"
            . "INNER JOIN tache t on p.id_tache = t.id_tache" 
            . "WHERE p.id_utilisateur = :idUtilisateur" ;
        
        $st = $bd->prepare( $sql ) ;
		$st->execute( array( ':idUtilisateur' => $idUtilisateur ) ) ;
		$taches = $st->fetch(  ) ;
		$st->closeCursor() ;

		return $taches;
    }

    public static function getUneTache ( $idTache ){
        $bd = self::getConnexion() ;
		$sql = "SELECT" 
            . "t.libelle , t.description, t.date_debut , t.date_fin , t.importance, t.statut" 
            . "FROM tache t"
            . "WHERE t.idTache = :idTache" ;
        
        $st = $bd->prepare( $sql ) ;
		$st->execute( array( ':idTache' => $idTache ) ) ;
		$tache = $st->fetch() ;
		$st->closeCursor() ;

        return $tache;
    }

    public static function supprimerTache ($idTache){
        $bd = self::getConnexion() ;
		$sql = "DELETE" 
            . "FROM tache "
            . "WHERE t.idTache = :idTache" ;
        
        $st = $bd->prepare( $sql ) ;
		$st->execute( array( ':idTache' => $idTache ) ) ;
		$tache = $st->fetch() ;
		$st->closeCursor() ;
    }

    public static function getUnUtilisateur( $id ){
		$bd = self::getConnexion() ;
		$sql = "SELECT nom, prenom, email, fonction, mdp from utilisateur where id_utilisateur = :id" ;
		$st = $bd->prepare( $sql ) ;
		$st->execute( array( ':id' => $id ) ) ;
		$utilisateur = $st->fetch() ;
		$st->closeCursor() ;
		return $utilisateur ;
	}

}