<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //ENTREPRISE
        $ent1 = new Entreprise();
        $ent1->setCode("ENT1");
        $ent1->setActivite("Developpement WEB");
        $ent1->setAdresse("100 Rue de l'Adour 61600 Anglet");
        $ent1->setNom("Arobiz");
        $ent1->setUrlSite("arobiz.com");

        $manager->persist($ent1);

        //FORMATION
        $for1 = new Formation();
        $for1->setCode("FOR1");
        $for1->setNomLong("DUT Informatique");
        $for1->setNomCourt("DUT Info");

        $manager->persist($for1);

        //STAGE
        $stageDevWeb = new Stage();
        $stageDevWeb->setCode("AAAA1");
        $stageDevWeb->setTitre("Stage dev. Web");
        $stageDevWeb->setDescMission("Un stage de développement WEB");
        $stageDevWeb->setEmailContact("entreprise@arobiz.com");
        $stageDevWeb->setEntreprise($ent1);
        $stageDevWeb->addFormation($for1);

        $manager->persist($stageDevWeb);

        $manager->flush();
    }
}
