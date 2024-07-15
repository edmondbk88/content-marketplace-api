<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentController
{
    /**
     * @Route("/api/content", methods={"POST"})
     */
    public function createContent(Request $request): Response
    {
        // Lógica para crear contenido
    }

    /**
     * @Route("/api/content", methods={"GET"})
     */
    public function getContents(): Response
    {
        // Lógica para obtener lista de contenidos
    }

    /**
     * @Route("/api/content/{id}", methods={"GET"})
     */
    public function getContent($id): Response
    {
        // Lógica para obtener contenido específico
    }

    /**
     * @Route("/api/content/{id}", methods={"PUT"})
     */
    public function updateContent(Request $request, $id): Response
    {
        // Lógica para actualizar contenido
    }

    /**
     * @Route("/api/content/{id}", methods={"DELETE"})
     */
    public function deleteContent($id): Response
    {
        // Lógica para eliminar contenido
    }
}
