<?php
namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Guard\Passport\Passport;
use Symfony\Component\Security\Guard\Passport\Badge\UserBadge;
use Symfony\Component\Security\Guard\Passport\Badge\CredentialsBadge;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuthenticator extends AbstractGuardAuthenticator
{
    private $entityManager;
    private $authenticationUtils;

    public function __construct(EntityManagerInterface $entityManager, AuthenticationUtils $authenticationUtils)
    {
        $this->entityManager = $entityManager;
        $this->authenticationUtils = $authenticationUtils;
    }

    public function supports(Request $request): bool
    {
        return $request->attributes->get('_route') === 'api_login_check' && $request->isMethod('POST');
    }

    public function authenticate(Request $request)
    {
        $credentials = json_decode($request->getContent(), true);

        $email = $credentials['email'] ?? '';
        $password = $credentials['password'] ?? '';

        if (empty($email) || empty($password)) {
            throw new AuthenticationException('Email and password required.');
        }

        // Validar las credenciales aquí (ejemplo simple)
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user || !password_verify($
