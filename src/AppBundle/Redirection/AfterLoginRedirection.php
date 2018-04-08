<?php
/**
 * Created by PhpStorm.
 * User: majd
 * Date: 08/04/18
 * Time: 02:39 م
 */

namespace AppBundle\Redirection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{

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
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;
    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // Get list of roles for current user
        $roles = $token->getRoles();
        // Tranform this list in array
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // If is a admin or super admin we redirect to the backoffice area
        if (in_array('ROLE_ADMIN', $rolesTab, true) )

            $redirection = new RedirectResponse($this->router->generate('admin'));


        // otherwise, if is a commercial user we redirect to the crm area
        elseif (in_array('ROLE_USER', $rolesTab, true))

            $redirection = new RedirectResponse($this->router->generate('homepage'));


            // otherwise we redirect user to the member area
       /* else

        $redirection = new RedirectResponse($this->router->generate('my_app_esprit_homepage'));
        */

        return $redirection;
}

}