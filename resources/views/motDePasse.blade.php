@extends('sommaire')
@section('contenu1')

<div id = "contenu">

    <h2>Changer de Mot de passe</h2>

    <form method = "post" action = "{{ route('chemin_sauvegardeMdp') }}">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        @includeWhen($erreurs != null , 'msgerreurs', ['erreurs' => $erreurs]) 

        <!--Permet d'afficher l'erreur 'changerMDPcontroller' -->
        @includeWhen($message != "", 'message', ['message' => $message])

        <p>       
        <label for = "dateEmbauche">Donner votre date d'embauche*</label> <!--nepas mettre date sur all-->
        <input id = "dateEmbauche" type = "date" name = "dateEmbauche"  size = "30" maxlength = "45" required >
        </p>

        <p>
        <label for = "mdp">Nouveau Mot de passe*</label>
        <input id = "mdp"  type = "password"  name = "mdp" size = "30" maxlength = "45" required>
        </p>

        <p>
        <label for = "mdp">Retaper le nouveau Mot de passe*</label>
        <input id = "mdp"  type = "password"  name = "mdp" size = "30" maxlength = "45" required>
        </p>


       <input type = "submit" value = "Valider" name = "valider">
       <input type = "reset" value = "Annuler" name = "annuler"> 
        </p>
        
    </form>


</div>
@endsection