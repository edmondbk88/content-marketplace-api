<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @IgnoreAnnotation("ORM\Entity")
 * @IgnoreAnnotation("ORM\Id")
 * @IgnoreAnnotation("ORM\GeneratedValue")
 * @IgnoreAnnotation("ORM\Column")
 * @IgnoreAnnotation("ORM\ManyToOne")
 */
class Review
{
    // Atributos
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="Content")
     */
    private $content;

    // Getters y Setters
}
