<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ReponseController extends Controller
{
    public function Showaction(Request $request, $id)

    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $question = $em->getRepository('AppBundle:Question')->find($id);
        $reponses = $em->getRepository('AppBundle:Reponse')->findrep($id);
        $reponse = new Reponse();

        if ($request->isMethod('post'))
        {
            $reponse->setIdUser($user);
            $reponse->setContenuRep($request->get('addRep'));
            $reponse->setIdQuestion($question);
            $em->persist($reponse);
            $em->flush();
            return $this->redirectToRoute('reponse',array(
                'id'=>$id
            ));
        }
        return $this->render('forum/reponse.html.twig', array(
            'question' => $question,
            'reponses' => $reponses,
            'user'=>$user
        ));
    }

    public function editReponseaction( $idq ,$idr , Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $reponse = new Reponse();
        $reponse = $em->getRepository('AppBundle:Reponse')->find($idr);
        if ($request->isMethod('post'))
        {
            $reponse->setContenuRep($request->get('contenu'));
            $em->flush();
            return $this->redirectToRoute('reponse',array(
                    'id'=>$idq
                )
            );
        }
        return $this->render('forum/editReponse.html.twig',array(

            'reponse'=>$reponse
        ));
    }

    public function deleteresponseaction($idq ,$idr)
    {
        $em = $this->getDoctrine()->getManager();
        $reponse = $em->getRepository('AppBundle:Reponse')->find($idr);
        $em->remove($reponse);
        $em->flush();
        return $this->redirectToRoute('reponse',array(
            'id'=>$idq
        ));


    }
    /*public function addRepaction(Request $request , $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user= $this->getUser();
        $question = $em->getRepository('AppBundle:Question')->find($id);
        $reponse = new Reponse();
        if ($request->isMethod('post'))
        {
            $reponse->setIdUser($user);
            $reponse->getContenuRep($request->get('addComment'));
            $reponse->setIdQuestion($question);
            $em->persist($reponse);
            $em->flush();
        }

        return $this->redirectToRoute('reponse',array(
            'id'=>$id
        ));
    }*/
}
