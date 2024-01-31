<?php

namespace App\Controller;

use App\Service\CreateMessage;
use Symfony\Component\Routing\Annotation\Route;

class MessageClass{

    public function __construct(private CreateMessage $createMessage){

    }
    #[Route('/message/{data}' , name:'app_message')]
    public function sendMessage($data = null){

        if($data){
            $this->createMessage->messageToLogger($data);
        }

    }

}