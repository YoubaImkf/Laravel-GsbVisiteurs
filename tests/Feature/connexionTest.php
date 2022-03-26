<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class connexionTest extends TestCase
{
    /**
     *
     * @text
     */
    public function retourneFormulaireConnexion()
    {
        $response = $this->get("/");
        $response->assertStatus(200);
        $response->asserSeeText("login*");
        $response->asserSeeText("Mot de passe*");
    }
    /**
     *
     * @text
     */
    public function valideLaConnexionConforme()
    {
        $data = ['login'=>'toto','mdp'=>'1234'];
        $response = $this->post('/',$data);
        $response->assertStatus(200);
        $response->assertSessionHas('visiteur');
        $response->assertSeeText('Villechalane Louis');
    }
      /**
     *
     * @text
     */  
    public function erreurConnexion()
    {
        $data = ['login'=>'toto','mdp'=>'popo'];
        $response = $this->post('/',$data);
        $response->assertStatus(200);
        $response->assertSessionMissing('visiteur');
        $response->asserSeeText("login*");
        $response->asserSeeText("Mot de passe*");
    }


}
