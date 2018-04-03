<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Discussion;
use AppBundle\Form\DiscussionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DiscussionController extends Controller
{
    public function addaction(Request $request,$defi)
    {

        $em = $this->getDoctrine()->getManager();
        $user  = $this->getUser();
        $Defi = $em->getRepository('AppBundle:Defis')->find($defi);

        $d = new Discussion();
      //  $form = $this->createForm(DiscussionType::class,$d);
      //  $form->handleRequest($request);
        if ($request->isMethod('post'))
        {
            $d->setIdDefis($Defi);
            $d->setIdUser($user);
            $d->setContenu($request->get('message'));

            $em->persist($d);
            $em->flush();
            return $this->redirectToRoute('battle',array(
                'defi'=>$defi
            ));

        }
        $em->clear();
        return $this->render('discussion/add.html.twig', array(

            'user'=>$user,
            'd'=>$defi

        ));
    }
    public  function deletediscussionaction($defi,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $disc = $em->getRepository("AppBundle:Discussion")->find($id);
        $em->remove($disc);
        $em->flush();
        return $this->redirectToRoute('battle',array(
            'defi'=>$defi
        ));

    }

    public function updateaction($defi ,$id ,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Disc = new Discussion();
        $Disc = $em->getRepository("AppBundle:Discussion")->find($id);
            if ($request->isMethod('post'))
            {
                $Disc->setContenu($request->get('message'));
                $em->flush();
                return $this->redirectToRoute('battle',array(
                    'defi'=>$defi
                ));

            }



        return $this->render('discussion/edit.html.twig', array(
           'disc' =>$Disc

        ));
    }



}
