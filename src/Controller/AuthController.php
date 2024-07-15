<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class AuthController
{
    /**
     * @Route("/api/register", methods={"POST"})
     */
    public function register(Request $request): Response
    {
        // Lógica para registro
    }

    /**
     * @Route("/api/login", methods={"POST"})
     */
    public function login(Request $request): Response
    {
        // Lógica para inicio de sesión
    }
}
