<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ReponseController extends Controller
{
    public function Showaction(Request $request)

    {

        return $this->render('forum/reponse.html.twig');
    }
}
