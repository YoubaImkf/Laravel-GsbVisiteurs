@extends('somGestionnaire')
    @section('contenu1')
      <div id="contenu">
        <h2>Liste visiteurs</h2>
        <h3>Visiuteurs à sélectionner : </h3>
      <form action="{{ route('chemin_selectionVisiteurs') }}" method="post">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm"><p>
          <label for="lstVisiteur" >Visiteur : </label>

          <select id="lstMois" name="Visiteur"> <!--est  $visiteur= $request['Visiteur'] dans controlller -->
              @foreach($lesVisiteurs as $visiteur)
                  @if ($visiteur['identite'] == $nomVisiteur['identite']) <!--$leVisiteur correspond dans controler gestionnaireController "->with('leVisiteur',$leVisiteur)"-->
                  
                    <option selected value="{{ $visiteur['id'] }}">
                      <!--Valeur envoyé a la variable Visiteur-->
                      {{ $visiteur['identite']}} 
                    </option>
                  @else 
                    <option value="  {{ $visiteur['id'] }} ">
                     {{ $visiteur['identite']}} 
                    </option>
                  @endif
              @endforeach
          </select>
        </p>
        </div>
        <div class="piedForm">
        <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
        </div>
          
        </form>
        
  @endsection 
 