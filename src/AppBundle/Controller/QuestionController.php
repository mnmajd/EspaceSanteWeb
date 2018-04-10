<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends Controller
{
 public function showaction(Request $request)
 {
    $user = $this->getUser();
     $em = $this->getDoctrine()->getManager();
     $question = $em->getRepository('AppBundle:Question')->findBy(array('approvedQuestion'=> 1));
     $categorie = $em->getRepository('AppBundle:CategorieForum')->findAll();
     $paginator  = $this->get('knp_paginator');
     $pag = $paginator->paginate(
         $question,
         $request->query->getInt('page',1),
         $request->query->getInt('limit',6)

     );
     return $this->render('forum/forum.html.twig', array(
         'categorie'=>$categorie,
         'user'=>$user,
         'question'=>$pag ));

 }
 public function findQuesaction($cat,Request $request)
 {
     $em = $this->getDoctrine()->getManager();
     $user = $this->getUser();
     $categorie = $em->getRepository('AppBundle:CategorieForum')->findAll();

     $question = $em->getRepository('AppBundle:Question')->catquestion($cat);
     $paginator  = $this->get('knp_paginator');
     $pag = $paginator->paginate(
         $question,
         $request->query->getInt('page',1),
         $request->query->getInt('limit',6)

     );
     return $this->render('forum/forum.html.twig', array(
         'categorie'=>$categorie,
            'user'=>$user,
         'question'=>$pag ));
 }

 public function addQuestaction(Request $request)
 {
     $em = $this->getDoctrine()->getManager();
     $user= $this->getUser();

     $categorie = $em->getRepository('AppBundle:CategorieForum')->findAll();
     $question = new Question();
     if ($request->isMethod('post'))
     {
        $question->setIdUser($user);
        $question->setContenuQuest($request->get('question'));
        $question->setSujetQuestion($request->get('subject'));
        $question->setNomCatf($request->get('cat'));
        $question->setApprovedQuestion(false);
        $question->setNbrRep(0);
        $em->persist($question);
        $em->flush();
         return $this->redirectToRoute('forum'


         );
     }

     return $this->render('forum/Question.html.twig',array(

         'categorie'=>$categorie
     ));
 }
 public function editQuestionaction( $id , Request $request)
 {
     $em = $this->getDoctrine()->getManager();
      $em->getRepository('AppBundle:Question')->SetRepNbr($id);
     $question = new Question();
     $question = $em->getRepository('AppBundle:Question')->find($id);
     if ($request->isMethod('post'))
     {
         $question->setContenuQuest($request->get('contenu'));
         $em->flush();
         return $this->redirectToRoute('reponse',array(
             'id'=>$id
             )
             );
     }
     return $this->render('forum/editQuestion.html.twig',array(

         'question'=>$question
     ));
 }

 public function deletequestionaction($id)
 {
     $em = $this->getDoctrine()->getManager();
     $question = $em->getRepository('AppBundle:Question')->find($id);
     $em->remove($question);
     $em->flush();
     return $this->redirectToRoute('forum'
     );


 }


}
