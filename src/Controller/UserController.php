<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    /**
     * @Route("/api/user", methods={"GET"})
     */
    public function getUser(): Response
    {
        // Lógica para obtener datos de usuario
    }

    /**
     * @Route("/api/user", methods={"PUT"})
     */
    public function updateUser(Request $request): Response
    {
        // Lógica para actualizar perfil de usuario
    }
}
