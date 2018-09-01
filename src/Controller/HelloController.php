<?php

namespace App\Controller;

use App\Service\NameGenerator;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function hello(NameGenerator $nameGenerator)
    {
        $name = $nameGenerator->randomName();

        $message = 'Hello '.$name;

        return new Response($message);
    }
}