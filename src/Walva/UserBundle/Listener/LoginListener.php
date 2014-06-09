<?php
/**
 * Created by PhpStorm.
 * User: Teta
 * Date: 1/06/14
 * Time: 14:01
 */

namespace Walva\UserBundle\Listener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginListener implements AuthenticationSuccessHandlerInterface{

    /**
     * @var Router
     */
    protected $router;
    /**
     * @var SecurityContext
     */
    protected $security;

    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router   = $router;
        $this->security = $security;
    }


    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->getSecurity()->isGranted('ROLE_ADMIN'))
        {
            return new RedirectResponse($this->getRouter()->generate('article'));
        }
        if ($this->getSecurity()->isGranted('ROLE_USER'))
        {
            return new RedirectResponse($this->getRouter()->generate('livre_public'));
        }
    }

    /**
     * @param mixed $security
     */
    public function setSecurity($security)
    {
        $this->security = $security;
    }

    /**
     * @return SecurityContext
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param mixed $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }






} 