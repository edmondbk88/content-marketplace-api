<?php 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 * @IgnoreAnnotation("ORM\Entity")
 * @IgnoreAnnotation("ORM\Id")
 * @IgnoreAnnotation("ORM\GeneratedValue")
 * @IgnoreAnnotation("ORM\Column")
 */
class Content
{
    // Atributos
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    // Getters y Setters
}
