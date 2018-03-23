<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Defis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Defi controller.
 *
 * @Route("defis")
 */
class DefisController extends Controller
{
    /**
     * Lists all defi entities.
     *
     * @Route("/", name="defis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $defis = $em->getRepository('AppBundle:Defis')->findAll();

        return $this->render('defis/index.html.twig', array(
            'defis' => $defis,
        ));
    }

    /**
     * Finds and displays a defi entity.
     *
     * @Route("/{id}", name="defis_show")
     * @Method("GET")
     */
    public function showAction(Defis $defi)
    {

        return $this->render('defis/show.html.twig', array(
            'defi' => $defi,
        ));
    }
}
