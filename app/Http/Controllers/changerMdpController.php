<?php

namespace App\Http\Controllers;
use PdoGsb;
use Illuminate\Http\Request;

class changerMdpController extends Controller
{
    function changerMdp(Request $request){
        if(session('visiteur') != null){
            $date = $request['dateEmbauche'];         
            $visiteur = session('visiteur');
            $idVisiteur = $visiteur['id'];
            
            $dateEmbauche = PdoGsb::getDateEmbaucheVisiteur($idVisiteur);
            
            return view('motDePasse')
                                  ->with('erreurs',null)
                                  ->with('visiteur',$visiteur)
                                  ->with('date',$date)
                                  ->with('message',"") //on doit declarer message sinon bug $m non defini
                                  ->with('dateEmbauche',$dateEmbauche);
                                
        }

    }

    function sauvegarderMdp(Request $request){
        if(session('visiteur') != null){
            $visiteur = session('visiteur');
            $idVisiteur = $visiteur['id'];
            $mdpVisiteur =  $request['mdp'];
            $date = $request['dateEmbauche'];
            var_dump($date);
            $dateEmbauche = PdoGsb::getDateEmbaucheVisiteur($idVisiteur);
            var_dump($dateEmbauche);

                if($date==$dateEmbauche['dateEmbauche']) //$dateEmbauche=array
                {     
                    $erreurs = null;
                    // $majMd=
                    PdoGsb::modifierMotDePasse($idVisiteur, $mdpVisiteur);
                
                    $message = "Votre Mdp a été mise à jour"; //permet de stocker notre erreur
                }
                else{
                    $erreurs[] ="Vous devez rentrer votre date d'embauche";
                    $message =" eh bah nan, CHEH !!";;
                }
            
            return view('motDePasse')       
                                    ->with('erreurs',$erreurs)
                                    ->with('message',$message) //message retourner
                                    ->with('visiteur',$visiteur) 
                                    ->with( 'mdp',$mdpVisiteur)                               
                                    // ->with('majMdp',$majMdp)
                                    ->with('dateEmbauche',$dateEmbauche);
                                   
        }

    }

    
}