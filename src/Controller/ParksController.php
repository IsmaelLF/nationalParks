<?php

namespace App\Controller;

use App\Entity\Parks;
use App\Repository\ParksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParksController extends AbstractController
{

    public function __construct(private ParksRepository $parks)
    {
    }

    #[Route('/', name: 'app_homepage')]
    public function homepage(ParksRepository $parksRepository): Response
    {
        $parks = $parksRepository->findAll();
        return $this->render('parks/homepage.html.twig', [
            'title' => 'Homepage',
            'parks' => $parks,
        ]);
    }

    #[Route('/showInfo/{id}', name: 'app_showinfo', methods: ["GET"])]
    public function showInfo($id, ParksRepository $parksRepository): Response
    {
        $park = $parksRepository->find($id);

        if (!$park) {
            throw $this->createNotFoundException('Error 404: Park not found');
        }

        return $this->render('parks/showinfo.html.twig', [
            'park' => $park,
        ]);
    }


    #[Route('/api/parks/{id}', name: 'app_api', methods: ['GET'])]

    public function getParks(): Response
    {
        return $this->json($this->parks->getArray());
    }



    #[Route('/parks/new/')]


    public function newPark(EntityManagerInterface $entityManager): Response
    {
        $array = $this->parks->getArray();
        $park = new Parks();
        $data = $array[rand(0,11)];
        $park->setNombre($data['nombre']);
        $park->setProvincia($data['provincia']);
        $park->setEcosistema($data['ecosistema']);
        $park->setFicheiro($data['ficheiro']);

        $entityManager->persist($park);
        $entityManager->flush();

        return new Response(sprintf('Id: %d es %s, en %s, con clima %s e imagen %s', $park->getId(), $park->getNombre(), $park->getProvincia(), $park->getEcosistema(), $park->getFicheiro()));
    }

    #[Route('showList/{ecosistema}', name: 'app_ecosistema')]

    public function ecosistemaList($ecosistema, ParksRepository $parksRepository){
        $park = $parksRepository->findByEcosistema($ecosistema);
        return $this->render('parks/showlist.html.twig', [
            'park' => $park,
        ]);
    } 

}
