<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use MyDate;
use App\MyApp;

class TestDate extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function dateMois()
    {
        $mois = MyDate::extraireMois("202203");
        $this->assertEquals($mois,"03","erreur");
    }

    public function  extraireAnnee()
    {
        $mois = MyDate::extraireAnnee("202203");
        $this->assertEquals($mois,"03","Bon");
    }

    public function  getAnneeMoisCourant()
    {
        $Annee = Mydate::getAnneeMoisCourant();
        $this->assertEquals($Annee,"");
    }
}
