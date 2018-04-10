<?php

namespace AppBundle\Controller;

use AppBundle\Form\OutilsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Outils;

class CalculControllerController extends Controller
{
    /**
     * @return $this
     */
    public function calculImcAction(Request $request)

    {
        $outils = new Outils();

       /* $form = $this->createForm('AppBundle\Form\OutilsType', $outils);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $taille = $form["taille"]->getData();
            $poids = $form["poids"]->getData();
            $imc =  $poids / ($taille * $taille);


            //  return $this->redirectToRoute('imc', array('idArticle' => $article->getIdarticle()));
        }*/
        return $this->render('AppBundle:CalculController:calcul_imc.html.twig', array(
            'outils' => $outils,
            //'form' => $form->createView(),
           // 'imc' => $imc
        ));

    }








    public function calculImgAction()
    {
        return $this->render('AppBundle:CalculController:calcul_img.html.twig', array(
            // ...
        ));
    }

    public function calculPIdAction()
    {
        return $this->render('AppBundle:CalculController:calcul_p_id.html.twig', array(
            // ...
        ));
    }

}
