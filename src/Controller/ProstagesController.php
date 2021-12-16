<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function affichageIndex(): Response
    {
        return $this->render('prostages/index.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function affichageEntreprises(): Response
    {
        return $this->render('prostages/affichageEntreprises.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function affichageFormations(): Response
    {
        return $this->render('prostages/affichageFormations.html.twig', [
            'controller_name' => 'ProstagesController',
        ]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stages")
     */
    public function affichageStages($id): Response
    {
        return $this->render('prostages/affichageStages.html.twig', [
            'controller_name' => 'ProstagesController',
            'id' =>$id
        ]);
    }
}
