<?php

declare(strict_types=1);

namespace App\Presentation\Http\UserInterface\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    public function login(): Response
    {
        return
            new Response(
                '<html><body><h1>Login</h1></body></html>'
            )
        ;
    }
}