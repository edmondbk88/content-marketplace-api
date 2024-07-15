<?php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class UserAuthenticator extends AbstractLoginFormAuthenticator
{
    private $userProvider;

    public function __construct(UserProviderInterface $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    public function authenticate(Request $request): TokenInterface
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        if (empty($username) || empty($password)) {
            throw new AuthenticationException('Username or password cannot be empty.');
        }

        $user = $this->userProvider->loadUserByIdentifier($username);

        if (!$user || !password_verify($password, $user->getPassword())) {
            throw new AuthenticationException('Invalid credentials.');
        }

        return new UsernamePasswordToken($user, $password, 'main', $user->getRoles());
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Aquí deberías definir la lógica que maneja el éxito de la autenticación.
        // Por ejemplo, redirigir al usuario a la página de inicio.
        
        return new Response('Authentication successful!', Response::HTTP_OK);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        return new Response('Authentication failed: ' . $exception->getMessage(), Response::HTTP_UNAUTHORIZED);
    }
}
