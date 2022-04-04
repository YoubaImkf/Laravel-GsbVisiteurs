<?php

namespace Tests\Feature;
use Tests\TestCase;
use PdoGsb;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EtatFraisTest extends TestCase
{
    public function contexte()
    {   
    $visiteur = PdoGsb::getInfosVisiteur('toto','1234');
    session(['visiteur' => $visiteur]);
    }


    /**
     * @test
     *
     * @return void
     */
    public function moisSelected()
    {
        $this->contexte();
        $response = $this->get("/selectionMois");
        $response->assertStatus(200);
        $response->assertSee("Mois à sélectionner :");
        $response->assertSee("Mes fiches de frais");
        $response->assertViewHas('lesMois');
        $this->assertTrue(true); //il est possible de tester que la vue a bien reçu une donnée :
    }
    /**
     * @test
     *
     * @return void
     */
    public function listeFrais()
    {

    $this->contexte();
    $response = $this->call('POST', '/listeFrais', array(
        '_token' => csrf_token(),
    ));     
    $this->assertEquals(200, $response->getStatusCode());
    

    }
    
}

