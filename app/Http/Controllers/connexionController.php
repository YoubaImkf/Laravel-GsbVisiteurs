<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class connexionController extends Controller
{
    function connecter(){
        
        return view('connexion')->with('erreurs',null);
    } 

    function valider(Request $request){
        $login = $request['login'];
        $mdp = $request['mdp'];
        $visiteur = PdoGsb::getInfosVisiteur($login,$mdp);
        $gestionnaire = PdoGsb::getInfosGestionnaire($login,$mdp);

        if(!is_array($visiteur)){

            if(!is_array($gestionnaire)){ 

            $erreurs[] = "Login ou mot de passe incorrect(s)";
            return view('connexion')->with('erreurs',$erreurs);
            }
                else {            

                session(['gestionnaire' => $gestionnaire]);
                return view('somGestionnaire') 
                ->with('gestionnaire',session('gestionnaire'));                 
                }                           //'gestionnaire' ↑ au somGestionn...   // ↑ gestionnaire correspond au gest lign26
        }
        else{
            session(['visiteur' => $visiteur]);
            return view('sommaire')->with('visiteur',session('visiteur'));
        }
    } 
    
    function deconnecter(){
            session(['visiteur' => null]);
            session(['gestionnaire' => null]);
            return redirect()->route('chemin_connexion');
    }
       
}
