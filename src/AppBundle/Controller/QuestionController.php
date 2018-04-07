<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends Controller
{
 public function showaction()
 {

     $em = $this->getDoctrine()->getManager();
     $question = $em->getRepository('AppBundle:Question')->findAll();
     $categorie = $em->getRepository('AppBundle:CategorieForum')->findAll();

     return $this->render('forum/forum.html.twig', array(
         'categorie'=>$categorie,
         'question'=>$question ));

 }
 public function findQuesaction($cat)
 {
     $em = $this->getDoctrine()->getManager();
     $categorie = $em->getRepository('AppBundle:CategorieForum')->findAll();

     $question = $em->getRepository('AppBundle:Question')->catquestion($cat);
     return $this->render('forum/forum.html.twig', array(
         'categorie'=>$categorie,

         'question'=>$question ));
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
     }

     return $this->render('forum/Question.html.twig',array(

         'categorie'=>$categorie
     ));
 }
 public function editQuestionaction( $id , Request $request)
 {
     $em = $this->getDoctrine()->getManager();
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
