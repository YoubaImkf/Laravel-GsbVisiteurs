<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class connexionTest extends TestCase
{
    /**
     * @test
     *
     */
    public function retourneFormulaireConnexion()
    {
        $response = $this->get("/");
        $response->assertStatus(200);
        $response->assertSee("login");
        $response->assertSee("Mot de passe");
        $this->assertTrue(true);
    }
    /**
     * @test
     * 
     */
    public function valideLaConnexionConforme()
    {
        $data = ['login'=>'toto','mdp'=>'1234'];
        $response = $this->post('/',$data);
        $response->assertStatus(200);
        $response->assertSessionHas('visiteur');
        //tester que la vue a bien reçu une donnée :
        $response->assertSee('Bonjour Villechalane Louis');
        $this->assertTrue(true);
    }
    /**
     * @test
     */
    public function erreurConnexion()
    {
        $data = ['login'=>'toto','mdp'=>'popo'];
        $response = $this->post('/',$data);
        $response->assertStatus(200);
        $response->assertSessionMissing('visiteur');
        $response->assertSee("login");
        $response->assertSee("Mot de passe");

    }


}
