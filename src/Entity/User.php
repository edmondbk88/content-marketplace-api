<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @IgnoreAnnotation("ORM\Entity")
 * @IgnoreAnnotation("ORM\Id")
 * @IgnoreAnnotation("ORM\GeneratedValue")
 * @IgnoreAnnotation("ORM\Column")
 */
class User
{
    // Atributos
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    // Getters y Setters
}
