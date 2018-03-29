<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Defis;
use AppBundle\Entity\CheckIn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CheckinController extends Controller
{

    public  function check($defi)

    {

        $em = $this->getDoctrine()->getManager();

        $c = new CheckIn();
        $user = $this->getUser();
        $Defi = $em->getRepository('AppBundle:Defis')->find($defi);
        $c->setIdDefis($Defi);
        $c->setIdUser($user);
        $c->isChecked(true);

        $em->persist($c);
        $em->flush();


        return $this->render('defis/show.html.twig',array(
            'd'=>$defi,
            't'=>$user

        ));


    }
}
