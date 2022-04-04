<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);

Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);

        /*-----------------!!!!!!!!!GESTIONNAIRE Use case lister Visiteur!!!!!!!!!---------------------*/


Route::get('listeVisiteurs',[
        'as'=>'chemin_listeVisiteurs',
        'uses'=>'gestionnaireController@listerVisiteurs'
]);

Route::post('selectionVisiteur',[
        'as'=>'chemin_selectionVisiteurs',
        'uses'=>'gestionnaireController@selectionnerVisiteur'
]);

Route::post('archiveVisiteur',[
        'as'=>'chemin_archiveVisiteur',
        'uses'=>'gestionnaireController@archiveVisiteur'
]);


  /*-----------------------------------------------------------------------------------------------*/

         /*-------------------- ON FAIT UN TEST TP1 ---------------------------*/

Route::get('test',[
        'as'=>'chemin_test',
        'uses'=>'testController@faireTest'
]);

        /*-------------------- TP2 update mdp---------------------------*/
        
Route::get('changeMdp',[
        'as'=>'chemin_changeMdp',
        'uses'=>'changerMdpController@changerMdp'
]);

Route::post('sauvegarderMdp',[  //on peut mettre 'changeMdp' ici et ne plus avoir besoin du 'as'
        'as'=>'chemin_sauvegardeMdp',
        'uses'=>'changerMdpController@sauvegarderMdp'
]);

