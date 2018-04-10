<?php

namespace AppBundle\Controller;
use AppBundle\Entity\LikedQuestion;
use AppBundle\Entity\Question;
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
       $likedreponse = $em->getRepository('AppBundle:LikedQuestion')->findBy(array('idUser'=> $user->getId()));
        /*$likedquestions = $em->getRepository('AppBundle:Reponse')->likedrepuser($user->getId());*/
        $question = $em->getRepository('AppBundle:Question')->find($id);
        $em->getRepository('AppBundle:Question')->SetRepNbr($id);
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
            'user'=>$user,
            'liked'=>$likedreponse
            /*'likedrep'=>$likedquestions*/
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
    public function likeaction($idq,$idr, Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $likedQuestion = new LikedQuestion();
        $rep = $em->getRepository('AppBundle:Reponse')->find($idr);
        $likedQuestion->setIdUser($user);

        $likedQuestion->setIdRep($rep);
        $em->getRepository('AppBundle:Reponse')->like($idr);

        $em->persist($likedQuestion);
        $em->flush();
        return $this->redirectToRoute('reponse',array(
            'id'=>$idq
        ));

    }
    public function dislikeaction($idq,$idr, Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('AppBundle:Reponse')->dislike($idr);
        $likedQuestion = $em->getRepository('AppBundle:LikedQuestion')->findBy(array('idRep'=> $idr));
        $em->remove($likedQuestion);
        $em->flush();
        return $this->redirectToRoute('reponse',array(
            'id'=>$idq
        ));

    }
}
