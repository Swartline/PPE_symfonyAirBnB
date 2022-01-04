<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route(name="home", path="/accueil")
     */
    public function home(): Response
    {
        return $this->render('login/index.html.twig');  
    }
}