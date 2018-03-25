<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Defis;
use AppBundle\Entity\MembresDefis;
use AppBundle\Form\DefisType;
use AppBundle\Form\MembresDefisType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $defis = $em->getRepository('AppBundle:Defis')->findAll();
        $defi = new Defis();
        $form = $this->createForm(DefisType::class,$defi);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $em->persist($defi);
            $em->flush();
            return $this->redirectToRoute('defis');
        }


        return $this->render('defis/index.html.twig', array(
            'defis' => $defis,
            'form'=>$form->createView()
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
