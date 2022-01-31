@extends ('listeVisiteurs')
@section('contenu2')


<h3>Fiche de frais de {{  $nomVisiteur['identite'] }} | <a href="" OnClick="return confirm('Voulez vous vraiment supprimer ce visiteur ?');">supprimer</a>
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
         Nombre de ligne frais forfait : {{ $lignefraisforfait['lignefraisforfait'] }} 

          <!--[' lignefraisforfait'] correspond au as  lignefraisforfait de la requette selectlignefraisfiche-->
		</tr>
   </table>
      
   
  	</div>


@endsection
