<?php

namespace App\Controller;

use App\Service\CreateMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageClass extends AbstractController
{
    public function __construct(private CreateMessage $createMessage)
    {
    }

    #[Route('/message/{data}', name: 'app_message')]
    public function sendMessage($data = null): Response
    {
        $result = '';

        if ($data) {
            $result = $this->createMessage->messageToLogger($data);
        }

        return new Response($result);
    }
}
