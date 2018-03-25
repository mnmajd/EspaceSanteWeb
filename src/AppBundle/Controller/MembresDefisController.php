<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MembresDefis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Membresdefi controller.
 *
 * @Route("membresdefis")
 */
class MembresDefisController extends Controller
{
    /**
     * Lists all membresDefi entities.
     *
     * @Route("/", name="membresdefis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membresDefis = $em->getRepository('AppBundle:MembresDefis')->findAll();

        return $this->render('membresdefis/index.html.twig', array(
            'membresDefis' => $membresDefis,
        ));
    }

    /**
     * Finds and displays a membresDefi entity.
     *
     * @Route("/{id}", name="membresdefis_show")
     * @Method("GET")
     */
    public function showAction(MembresDefis $membresDefi)
    {

        return $this->render('membresdefis/show.html.twig', array(
            'membresDefi' => $membresDefi,
        ));
    }


    public function Joinaction( Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $defiM = new MembresDefis();
        if($request->isMethod('post'))
            $defiM->setIdDefis(1);
            $defiM->setIdUser(2);
            $em->persist($defiM);
            $em->flush();

        return new Response('Saved new product with id');

    }


}
