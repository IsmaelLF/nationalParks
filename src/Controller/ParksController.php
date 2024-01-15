<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\component\string\u;

class ParksController extends AbstractController{

    #[Route('/')]
    public function homepage(){
    $parks = [
    ['nombre'=> 'Picos de Europa', 'provincia' => 'Asturias, León y Cantabria', 'ecosistema' =>'Alta montaña atlántica'],
    ['nombre'=> 'Valle de Ordesa y Monte Perdido', 'provincia' => 'Huesca', 'ecosistema' =>'Alta montaña'],
    ['nombre'=> 'Caldera de Taburiente', 'provincia' => 'Sta. Cruz de Tenerife', 'ecosistema' =>'Volcánico'],
    ['nombre'=> 'Teide', 'provincia' => 'Sta. Cruz de Tenerife', 'ecosistema' =>'Volcánico'],
    ['nombre'=> 'Aiguas Tortas y Lago de San Mauricio', 'provincia' => 'Lleida', 'ecosistema' =>'Alta montaña'],
    ['nombre'=> 'Doñana', 'provincia' => 'Huelva, Sevilla y Cádiz', 'ecosistema' =>'Humedal'],
    ['nombre'=> 'Tablas de Daimiel', 'provincia' => 'Ciudad Real', 'ecosistema' =>'Humedal'],
    ['nombre'=> 'Cabañeros', 'provincia' => 'Ciudad Real y Toledo', 'ecosistema' =>'Media-alta montaña mediterránea'],
    ['nombre'=> 'Sierra Nevada', 'provincia' => 'Granada y Almería', 'ecosistema' =>'Media-alta montaña mediterránea'],
    ['nombre'=> 'Islas Atlánticas de Galicia', 'provincia' => 'Pontevedra y A Coruña', 'ecosistema' =>'Marítimo-terrestre'],
    ['nombre'=> 'Monfragüe', 'provincia' => 'Cáceres', 'ecosistema' =>'Media-alta montaña mediterránea'],
    ['nombre'=> 'Sierra de Guadarrama', 'provincia' => 'Madrid y Segovia', 'ecosistema' =>'Alta montaña mediterránea']
    ];
    return $this->render('parks/homepage.html.twig',[
        'title' => 'National Parks',
        'parks' => $parks
    ]);
}

#[Route('/showInfo/{data}')]

public function showInfo($data = null){
    if($data){
        $park =u(str_replace('-', ' ' , $data))->title(true);
        }
        else{
            $park = 'You did not enter a search parameter';
        }
        return  $this->render('parks/showinfo.html.twig', [
            'title'=>'National Parks',
            'park' =>$park
        ]);
    }
}