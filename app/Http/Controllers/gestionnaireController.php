<?php

namespace App\Http\Controllers;
use PdoGsb;
use Illuminate\Http\Request;

class gestionnaireController extends Controller
{
    function listerVisiteurs(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            $lesVisiteurs = PdoGsb::getVisiteur();//recupère tous les visiteurs
            $leVisiteur = " ";
		//    dd($leVisiteur);
          
            return view('listeVisiteurs')
                        ->with('lesVisiteurs',$lesVisiteurs)
                        ->with('gestionnaire', $gestionnaire)
                        ->with('erreurs',null)
                        ->with('message',null)
                        ->with('leVisiteur', $leVisiteur);
                   
        }
        else
        {
            return view('connexion')->with('erreurs',null);
        }
    }

    function selectionnerVisiteur(Request $request){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
          
            $lesVisiteurs = PdoGsb::getVisiteur();
            $visiteur = $request['lstVisiteur'];
            session(['idVisiteur' => $visiteur]);
            //recupere le name du  <select dans listeVisiteurs qui recup l'id et le nom 
            //select l'id du aray $lesVisiteurs pour lutiliser danns la fonction selectionneFicheVisiteur(!ici!!$leVisiteur!ici!!)et getNOMVisiteur();
            // var_dump($visiteur); 
            // var_dump($leVisiteur);
            $identite = PdoGsb::getNOMVisiteur($visiteur);
            // var_dump($nomVisiteur);

            $ficheFrais = PdoGsb::selectionneFicheVisiteur($visiteur);
            $lignefraisforfait = PdoGsb::selectionnelignefraisforfait($visiteur);
            // var_dump($nomVisiteur);
            
            // if(il a des fiche frais alors on affiche)

            
            
            return view('nombreFicheFrais')
                        ->with('gestionnaire',$gestionnaire)
                        ->with('lesVisiteurs', $lesVisiteurs)
                        ->with('identite', $identite)
                        ->with('leVisiteur',$visiteur)
                        ->with('erreurs',null)
                        ->with('message',null)
                        //on fait en sorte de dire que "leVisiteur" de ListerVisiteur soit egal au $visiteur de la fonctionse lectionnerVisiteur
                        ->with('ficheFrais',  $ficheFrais)
                        ->with('lignefraisforfait',$lignefraisforfait);
        
        }

    }

    function archiveVisiteur(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire'); 
            $idVisiteur = session('idVisiteur');



            //1
            $desLigneFraisHorsForFait= PdoGsb::getInfosLigneFraisHorsForFaitArchive($idVisiteur);
            foreach(  $desLigneFraisHorsForFait as $uneLigneFraisHorsForFait)
            {
                PdoGsb::archiverLigneFraisHorsForfait($uneLigneFraisHorsForFait['idVisiteur'],$uneLigneFraisHorsForFait['mois'],$uneLigneFraisHorsForFait['libelle'],$uneLigneFraisHorsForFait['date'],$uneLigneFraisHorsForFait['montant']);
                PdoGsb::supprimerlignefraishorsforfait($uneLigneFraisHorsForFait['idVisiteur']);
            }



            //2
            $ligneFraisForfaitArchives = PdoGsb::getInfosLigneFraisForfaitArchive($idVisiteur);
            foreach($ligneFraisForfaitArchives as $uneLigneFraisForfait)
            {
                PdoGsb::archiverLignesFraisForfait($uneLigneFraisForfait['idVisiteur'],$uneLigneFraisForfait['mois'],$uneLigneFraisForfait['idFraisForfait'],$uneLigneFraisForfait['quantite']);
                PdoGsb::supprimerLigneFraisForfaits($uneLigneFraisForfait['idVisiteur']);
            }


             //3
             $desFicheFrais= PdoGsb::getInfosFicheFraisArchive($idVisiteur);
             foreach( $desFicheFrais as $uneFicheFrais)
             {
                 PdoGsb::archiverFicheForfait($uneFicheFrais['idVisiteur'],$uneFicheFrais['mois'],$uneFicheFrais['nbJustificatifs'],$uneFicheFrais['montantValide'],$uneFicheFrais['dateModif'],$uneFicheFrais['idEtat']);
                 PdoGsb::supprimerFicheFrais($uneFicheFrais['idVisiteur']);
             }

            $identite = PdoGsb::getNOMVisiteur($idVisiteur );


            //4
            $infoVisiteur = PdoGsb::getInfosVisiteurArchive($idVisiteur);
            $leVisiteur = " ";
            $idVisi=$infoVisiteur['id'];
            $nomVisi=$infoVisiteur['nom'];
            $prenomVisi=$infoVisiteur['prenom'];
            $loginVisi = $infoVisiteur['login'];
            $mdpVisi = $infoVisiteur['mdp'];
            $adresseVisi = $infoVisiteur['adresse'];
            $cpVisi = $infoVisiteur['cp'];
            $villeVisi = $infoVisiteur['ville'];
            $datEmbaucheVisi = $infoVisiteur['dateEmbauche'];
            PdoGsb::archiverVisiteur($idVisi,$nomVisi,$prenomVisi,$loginVisi,$mdpVisi,$adresseVisi,$cpVisi,$villeVisi,$datEmbaucheVisi);
            PdoGsb::supprimerVisiteur($idVisiteur);
       
            $lesVisiteurs = PdoGsb::getVisiteur();


            $message = "Visiteur bien supprimer et archiver";

            return view('listeVisiteurs')
                        ->with('message',$message)
                        ->with('gestionnaire',$gestionnaire)
                        ->with('leVisiteur',$leVisiteur)
                        ->with('lesVisiteurs', $lesVisiteurs)
                        ->with('identite', $identite)
                        ->with('idVisiteur ',$idVisiteur);
    }
    // else
    // {
    //         $erreurs[] = "Une erreur est survenue veuillez reessayer";
    //         return view('listeVisiteurs')
    //         ->with('erreurs',$erreurs);
    // }   
    


  }
}
