@extends('modeles/visiteur')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                    <strong>Bonjour {{ $gestionnaire['nom'] . ' ' . $gestionnaire['prenom'] }}</strong>
                      

            <!--   RAJOUTE LES OPTION MENU -Select un visiteur -->
            <!--                           -Delete             -->
                  <li class="smenu">
                          <a href="{{ route('chemin_listeVisiteurs') }}" title="Suppression d'un visiteur">Supprimer un Visiteur</a>
                  </li>

                  <li class="smenu">
                    <a href="{{ route('chemin_deconnexion') }}"" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          