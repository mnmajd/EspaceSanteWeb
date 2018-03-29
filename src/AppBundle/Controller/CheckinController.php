<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Defis;
use AppBundle\Entity\CheckIn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CheckinController extends Controller
{

    public function checkAction($defi,Request $request)

    {
        $em = $this->getDoctrine()->getManager();
        $m = new CheckIn();
        $user  = $this->getUser();
        $Defi = $em->getRepository('AppBundle:Defis')->find($defi);

        if ($request->isMethod('post'))
        {
            $m->setChecked(true);
            $m->setIdUser($user);
            $m->setIdDefis($Defi);
            $em->persist($m);
            $em->flush();
           return $this->redirectToRoute('battle',array(
               'defi'=>$defi
           ));
        }
        $em->clear();

        return $this->render('checkin/check.html.twig',array(
                'u' => $user,
            'd'=>$defi
        ));


    }


}
