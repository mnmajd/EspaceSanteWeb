<?php

namespace AppBundle\Controller;

use AppBundle\Form\OutilsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Outils;

class CalculControllerController extends Controller
{
    public function calculImcAction(Request $request)
    {
       /* if ($request->isXmlHttpRequest()) {
            $taille = $request->request->get('taille');
            $poids = $request->request->get('poids');

           $imc = $poids / ($taille * $taille);
       // $imc = ($taille * $taille);

            $response = new JsonResponse();



           return $this->render('AppBundle:CalculController:calcul_imc.html.twig', array(

               $response->setData(array('imc' => $imc)),

             ));
            //return $this->render('ProjetBundle:Default:ajax.html.twig',array('som'=>$som));
       }
        else {
          throw new \Exception("Erreur");

        }
    }*/
}}


       /*
        return $this->render('AppBundle:CalculController:calcul_imc.html.twig', array(
'form' => $form->createView(),
'outils' => $outils


));

    }}}*/



                /*
                $imc = $poids / ($taille * $taille);


          //$em->getRepository("AppBundle:Outils")->imc($taille , $poids);
           return $this->render('imc');

        }


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
