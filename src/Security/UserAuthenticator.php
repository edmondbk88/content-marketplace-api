<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport; // Asegúrate de esta línea
use Symfony\Component\Security\Http\Authenticator\Passport\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\CredentialsBadge;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserAuthenticator extends AbstractLoginFormAuthenticator
{
    private $userProvider;

    public function __construct(UserProviderInterface $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    public function authenticate(Request $request): Passport
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        if (empty($username) || empty($password)) {
            throw new AuthenticationException('Username or password cannot be empty.');
        }

        $userBadge = new UserBadge($username, function ($userIdentifier) {
            return $this->userProvider->loadUserByIdentifier($userIdentifier);
        });

        $credentialsBadge = new CredentialsBadge($password);

        return new Passport($userBadge, $credentialsBadge);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Aquí deberías definir la lógica que maneja el éxito de la autenticación.
        return new Response('Authentication successful!', Response::HTTP_OK);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        return new Response('Authentication failed: ' . $exception->getMessage(), Response::HTTP_UNAUTHORIZED);
    }

    public function getLoginUrl(Request $request): string
    {
        return '/login'; // Ajusta esta ruta según tu aplicación
    }
}
