<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Defis;
use AppBundle\Entity\Discussion;
use AppBundle\Entity\MembresDefis;
use AppBundle\Form\DefisType;
use AppBundle\Form\DiscussionType;
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
            'form'=>$form->createView(),

        ));
    }

    /**
     * Finds and displays a defi entity.
     *
     * @Route("/{id}", name="defis_show")
     * @Method("GET")
     */
    public function showAction(Defis $defi , Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
            $m = new MembresDefis();
            $discussion = new Discussion();
            //$exist= $em->getRepository('AppBundle:Defis')->existBattle($defi->getId(),$user->getId());

        $disc = $em->getRepository('AppBundle:Defis')->FindDisc($defi->getId());
        $Defi = $em->getRepository('AppBundle:Defis')->find($defi->getId());

       if ($request->isMethod('post'))
        {
            $m->setIdUser($user);
            $m->setIdDefis($Defi);
            $em->persist($m);
            $em->flush();

        }



        $em->clear();
        return $this->render('defis/show.html.twig', array(
            'defi' => $defi,
           /* 'f'=>$form->createView(),*/
            'u'=>$user,
            'd'=>$disc,

            //'exist'=>$exist



        ));
    }





}
