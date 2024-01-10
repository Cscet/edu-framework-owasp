<?php

namespace Template\home\Xss;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DiscoverController implements ControllerInterface
{
    /**
     * @param Request $request Requête HTTP
     * @return string|null
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function execute(Request $request): string|null
    {

        if($request->getHttpMethod() === "GET" && isset($_GET["email"])){
            $email = $_GET["email"];
        }

        return TwigCore::getEnvironment()->render(
            'xss/discover.html.twig',
            [
                'titre'   => 'OWASP XSS',
                'requete' => $request,
                'email' =>  $email ?? ""
            ]
        );
    }
}
