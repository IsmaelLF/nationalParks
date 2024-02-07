<?php 

namespace App\Controller;

use App\Entity\Parks;
use App\Service\GenerateData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\component\string\u;

class ParksController extends AbstractController{

    public function __construct(private GenerateData $parks)
    {
        
    }

    #[Route('/' , name:'app_homepage')]
    public function homepage() : Response{
        return $this->render('parks/homepage.html.twig',[
            'title' => 'Homepage',
            'parks' => $this->parks->getArray(),
        ]);
}

#[Route('/showInfo/{data}', name: 'app_showinfo', methods:["GET"])]

public function showInfo( $data = null)
{
    $result = 'You did not enter a search parameter';
    $photo = null;

    if ($data) {
        foreach ($this->parks->getArray() as $park) {
            $parkName = str_replace(' ', '', u($park['nombre'])->title(true));
            if (stripos($parkName, $data) !== false) {
                $result = $park['nombre'];
                $photo = "/images/{$park['fichero']}";
                break;
            }
        }
    }

    return $this->render('parks/showinfo.html.twig', [
        'title' => 'Show Info',
        'result' => $result,
        'photo' => $photo,
        'parks' => $this->parks->getArray(),
    ]);
}


    #[Route('/api/parks/{id}', name: 'app_api', methods: ['GET'])]

    public function getParks(): Response{
        return $this->json($this->parks->getArray());
}



    #[Route('/parks/new/')]

   
    public function newPark(EntityManagerInterface $entityManager) :Response{
        $array = $this->parks->getArray();
        $park = new Parks();
        $num = rand(0,11);
        $data = $array[$num];
        $park->setNombre($data['nombre']);
        $park->setProvincia($data['provincia']);
        $park->setEcosistema($data['ecosistema']);
        $park->setFicheiro($data['ficheiro']);
        
        $entityManager->persist($park);
        $entityManager->flush();

        return new Response(sprintf('Id: %d es %s, en %s, con clima %s e imagen %s', $park->getId(), $park->getNombre(), $park->getProvincia(), $park->getEcosistema(), $park->getFicheiro()));
    }   
}