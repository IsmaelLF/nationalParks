<?php
namespace App\Service;

class GenerateData{

    private $parks = [
        [
            'nombre'=> 'Picos de Europa',
            'provincia' => 'Asturias, León y Cantabria',
            'ecosistema' =>'Alta montaña atlántica',
            'ficheiro' => 'picos.jpg'
        ],
        [
            'nombre'=> 'Valle de Ordesa y Monte Perdido',
            'provincia' => 'Huesca',
            'ecosistema' =>'Alta montaña',
            'ficheiro' => 'ordesa.jpg'
        ],
        [
            'nombre'=> 'Caldera de Taburiente',
            'provincia' => 'Sta. Cruz de Tenerife',
            'ecosistema' =>'Volcánico',
            'ficheiro' => 'caldera.jpg'
        ],
        [
            'nombre'=> 'Teide',
            'provincia' => 'Sta. Cruz de Tenerife', 
            'ecosistema' =>'Volcánico',
            'ficheiro' => 'teide.jpg'
        ],
        [
            'nombre'=> 'Aiguas Tortas y Lago de San Mauricio', 
            'provincia' => 'Lleida', 
            'ecosistema' =>'Alta montaña',
            'ficheiro' => 'tortas.jpg'
        ],
        [
            'nombre'=> 'Doñana', 
            'provincia' => 'Huelva, Sevilla y Cádiz', 
            'ecosistema' =>'Humedal',
            'ficheiro' => 'donana.jpg'
        ],
        [
            'nombre'=> 'Tablas de Daimiel', 
            'provincia' => 'Ciudad Real', 
            'ecosistema' =>'Humedal',
            'ficheiro' => 'daimiel.jpg'
        ],
        [
            'nombre'=> 'Cabañeros', 
            'provincia' => 'Ciudad Real y Toledo', 
            'ecosistema' =>'Media-alta montaña mediterránea',
            'ficheiro' => 'cabaneros.jpg'
        ],
        [
            'nombre'=> 'Sierra Nevada', 
            'provincia' => 'Granada y Almería', 
            'ecosistema' =>'Media-alta montaña mediterránea',
            'ficheiro' => 'nevada.jpg'
        ],
        [
            'nombre'=> 'Islas Atlánticas de Galicia', 
            'provincia' => 'Pontevedra y A Coruña', 
            'ecosistema' =>'Marítimo-terrestre',
            'ficheiro' => 'cies.jpg'
        ],
        [
            'nombre'=> 'Monfragüe', 
            'provincia' => 'Cáceres', 
            'ecosistema' =>'Media-alta montaña mediterránea',
            'ficheiro' => 'monfrague.jpg'
        ],
        [
            'nombre'=> 'Sierra de Guadarrama', 
            'provincia' => 'Madrid y Segovia', 
            'ecosistema' =>'Alta montaña mediterránea',
            'ficheiro' => 'guadarrama.jpg'
        ]
        ];
        public function getArray(){
        
        $response = $this->parks;

        return $response;
}}