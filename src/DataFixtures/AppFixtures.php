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
        //CREATION D'UN GENERATEUR DE DONNEES FAKER
        $faker = \Faker\Factory::create('fr_FR');

        //ENTREPRISE
        $ent1 = new Entreprise();
        $ent1->setCode("ENT1");
        $ent1->setActivite("Developpement WEB");
        $ent1->setAdresse("100 Rue de l'Adour 61600 Anglet");
        $ent1->setNom("Arobiz");
        $ent1->setUrlSite("arobiz.com");

        $manager->persist($ent1);

        $ent2 = new Entreprise();
        $ent2->setCode("ENT2");
        $ent2->setActivite("Developpement Informatique");
        $ent2->setAdresse($faker->regexify($faker->streetAddress.' '.$faker->postcode.' '.$faker->streetName));
        $ent2->setNom($faker->companysuffix);
        $ent2->setUrlSite("url.com");

        $manager->persist($ent2);

        //FORMATION
        $for1 = new Formation();
        $for1->setCode("FOR1");
        $for1->setNomLong("DUT Informatique");
        $for1->setNomCourt("DUT Info");

        $manager->persist($for1);


        $for2 = new Formation();
        $for2->setCode("FOR2");
        $for2->setNomLong("Licence Professionnelle Metiers du Numérique");
        $for2->setNomCourt("LP NUM");

        $manager->persist($for2);


        $for3 = new Formation();
        $for3->setCode("FOR3");
        $for3->setNomLong("licence Professionnelle Programmation Avancee");
        $for3->setNomCourt("LP PROG");

        $manager->persist($for3);

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
