<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\component\string\u;

class ParksController extends AbstractController{

    private $parks = [
        [
            'nombre'=> 'Picos de Europa',
            'provincia' => 'Asturias, León y Cantabria',
            'ecosistema' =>'Alta montaña atlántica',
            'fichero' => 'picos.jpg'
        ],
        [
            'nombre'=> 'Valle de Ordesa y Monte Perdido',
            'provincia' => 'Huesca',
            'ecosistema' =>'Alta montaña',
            'fichero' => 'ordesa.jpg'
        ],
        [
            'nombre'=> 'Caldera de Taburiente',
            'provincia' => 'Sta. Cruz de Tenerife',
            'ecosistema' =>'Volcánico',
            'fichero' => 'caldera.jpg'
        ],
        [
            'nombre'=> 'Teide',
            'provincia' => 'Sta. Cruz de Tenerife', 
            'ecosistema' =>'Volcánico',
            'fichero' => 'teide.jpg'
        ],
        [
            'nombre'=> 'Aiguas Tortas y Lago de San Mauricio', 
            'provincia' => 'Lleida', 
            'ecosistema' =>'Alta montaña',
            'fichero' => 'tortas.jpg'
        ],
        [
            'nombre'=> 'Doñana', 
            'provincia' => 'Huelva, Sevilla y Cádiz', 
            'ecosistema' =>'Humedal',
            'fichero' => 'donana.jpg'
        ],
        [
            'nombre'=> 'Tablas de Daimiel', 
            'provincia' => 'Ciudad Real', 
            'ecosistema' =>'Humedal',
            'fichero' => 'daimiel.jpg'
        ],
        [
            'nombre'=> 'Cabañeros', 
            'provincia' => 'Ciudad Real y Toledo', 
            'ecosistema' =>'Media-alta montaña mediterránea',
            'fichero' => 'cabaneros.jpg'
        ],
        [
            'nombre'=> 'Sierra Nevada', 
            'provincia' => 'Granada y Almería', 
            'ecosistema' =>'Media-alta montaña mediterránea',
            'fichero' => 'nevada.jpg'
        ],
        [
            'nombre'=> 'Islas Atlánticas de Galicia', 
            'provincia' => 'Pontevedra y A Coruña', 
            'ecosistema' =>'Marítimo-terrestre',
            'fichero' => 'cies.jpg'
        ],
        [
            'nombre'=> 'Monfragüe', 
            'provincia' => 'Cáceres', 
            'ecosistema' =>'Media-alta montaña mediterránea',
            'fichero' => 'monfrague.jpg'
        ],
        [
            'nombre'=> 'Sierra de Guadarrama', 
            'provincia' => 'Madrid y Segovia', 
            'ecosistema' =>'Alta montaña mediterránea',
            'fichero' => 'guadarrama.jpg'
        ]
        ];

    #[Route('/' , name:'app_homepage')]
    public function homepage() : Response{
        return $this->render('parks/homepage.html.twig',[
            'title' => 'Homepage',
            'parks' => $this->parks,
        ]);
}

#[Route('/showInfo/{data}', name: 'app_showinfo', methods:["GET"])]

public function showInfo($data = null)
{
    $result = 'You did not enter a search parameter';
    $photo = null;

    if ($data) {
        foreach ($this->parks as $park) {
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
        'parks' => $this->parks,
    ]);
}


    #[Route('/api/parks/{id}', name: 'app_api', methods: ['GET'])]

    public function getParks(): Response{
        return $this->json($this->parks);
}
}
