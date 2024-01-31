<?php 
namespace App\Service;

use Psr\Log\LoggerInterface;

class CreateMessage{

    public function __construct(private LoggerInterface $loggerInterface)
    {
        
    }
    public function messageToLogger(string $message){
        $this->loggerInterface->info($message);
    }
}