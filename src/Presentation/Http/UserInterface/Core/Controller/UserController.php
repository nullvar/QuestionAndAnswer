<?php

declare(strict_types=1);

namespace App\Presentation\Http\UserInterface\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    public function index(): Response
    {
        return
            new Response('<html><body><h1>Index</h1></body></html>')
        ;
    }

    public function login(Request $request, Security $security, AuthenticationUtils $authenticationUtils): Response
    {
        return
            $this->render('core/user/login.html.twig', [
                'last_username' => $authenticationUtils->getLastUsername(),
                'error' => $authenticationUtils->getLastAuthenticationError(),
            ])
        ;
    }

    /**
     * @throws \Exception
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
}