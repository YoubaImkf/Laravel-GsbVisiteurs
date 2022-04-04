@extends ('listeVisiteurs')
@section('contenu2')


<h3>Fiche de frais de {{  $identite['identite'] }} | 
<form method="post" action="{{ route('chemin_archiveVisiteur')}}"> <!-- chemin est dans Route/Web -->
   {{ csrf_field()}}
   <button type="submit"  OnClick="return confirm('Voulez vous vraiment supprimer ce visiteur ?');">supp</button>
</form>
<!-- --></h3>
    <div class="encadre">
    <p>
      <strong> Fiche de frais  </strong>         
   </p>

  	<table class="listeLegere">
      <tr> 
         <th>
           - Eléments - 
         </th>
      </tr> 

      <tr>
         <td>
         Nombre de fiche de frais : {{ $ficheFrais['ficheFrais'] }} 
         </td>   <!--['ficheFrais'] correspond au as ficheFrais de la requette selectfiche-->
		</tr>
      
      <tr>
         <td>
         Nombre de ligne(s) frais forfait : {{ $lignefraisforfait['lignefraisforfait'] }} 

          <!--[' lignefraisforfait'] correspond au as  lignefraisforfait de la requette selectlignefraisfiche-->
		</tr>
   </table>
      
   
  	</div>


@endsection
