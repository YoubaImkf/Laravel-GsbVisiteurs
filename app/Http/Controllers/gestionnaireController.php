<?php

namespace App\Http\Controllers;
use PdoGsb;
use Illuminate\Http\Request;

class gestionnaireController extends Controller
{
    function listerVisiteurs(){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            $lesVisiteurs = PdoGsb::getVisiteur();
            
            $lesCles = array_keys( $lesVisiteurs );
            $nomVisiteur = $lesCles[0];

		          
     /** $leVisiteur correspond  @if ($visiteur['identite'] == $leVisiteur) ds listeVisieurs*/
           	
        
            return view('listeVisiteurs')
                        ->with('gestionnaire',$gestionnaire)
                        ->with('lesVisiteurs', $lesVisiteurs)                
                        ->with('nomVisiteur', $nomVisiteur);
        }              

        else{
            return view('connexion')->with('erreurs',null);
        }

    }

    function selectionnerVisiteur(Request $request){
        if(session('gestionnaire') != null){
            $gestionnaire = session('gestionnaire');
            $lesVisiteurs = PdoGsb::getVisiteur();
            // var_dump($lesVisiteurs); 
            $visiteur = $request['Visiteur'];
                    

            //recupere le name du  <select dans listeVisiteurs qui recup l'id et le nom 
            //select l'id du aray $lesVisiteurs pour lutiliser danns la fonction selectionneFicheVisiteur(!ici!!$leVisiteur!ici!!)et getNOMVisiteur();
            // var_dump($visiteur); 
            // var_dump($leVisiteur);
            $nomVisiteur = PdoGsb::getNOMVisiteur($visiteur);
            var_dump($nomVisiteur);

            $ficheFrais = PdoGsb::selectionneFicheVisiteur($visiteur);
            $lignefraisforfait = PdoGsb::selectionnelignefraisforfait($visiteur);
            // var_dump($nomVisiteur);
            
            // if(il a des fiche frais alors on affiche)

            

            return view('nombreFicheFrais')
                        ->with('gestionnaire',$gestionnaire)
                        ->with('lesVisiteurs', $lesVisiteurs)
                        ->with('nomVisiteur', $nomVisiteur)
                        ->with('ficheFrais',  $ficheFrais)
                        ->with('lignefraisforfait',$lignefraisforfait);
                       

        
        }
    }
}
