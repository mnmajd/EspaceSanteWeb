<?php

namespace AppBundle\Controller;
use AppBundle\Entity\resulatQuiz;
use AppBundle\Entity\Question;
use AppBundle\Entity\questionQuiz;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\reponseQuiz;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Quiz controller.
 *
 */
class QuizController extends Controller
{
    /**
     * Lists all quiz entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quizzes = $em->getRepository('AppBundle:Quiz')->findAll();

        return $this->render('quiz/index.html.twig', array(
            'quizzes' => $quizzes,
        ));
    }
    public function indexFrontAction()
    {
        $em = $this->getDoctrine()->getManager();

        $quizzes = $em->getRepository('AppBundle:Quiz')->findBy(array('valide'=>1));

        return $this->render('quiz/indexFront.html.twig', array(
            'quizzes' => $quizzes,
        ));
    }
    /**
     * Creates a new quiz entity.
     *
     */
    public function newAction(Request $request)
    {
        $quiz = new Quiz();
        $form = $this->createForm('AppBundle\Form\QuizType', $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quiz);
            $em->flush();

            return $this->redirectToRoute('quiz_question', array('id' => $quiz->getId()));
        }

        return $this->render('quiz/new.html.twig', array(
            'quiz' => $quiz,
            'form' => $form->createView(),
        ));
    }
      public function AddQuestionAction(Request $request){
          $em=$this->getDoctrine()->getManager();
          $idQuiz= $request->get('id');

          $quiz=$em->getRepository('AppBundle:Quiz')->find($idQuiz);

        if($request->getMethod()=='POST'){

            $question=new questionQuiz();
            $questionC= $request->get('question');
            $correct=$request->get('correct');
            $question->setQuestion($questionC);
            $question->setIdQuiz($quiz);
            $em->persist($question);
            $em->flush();
            $reponse1=new reponseQuiz();
            $reponse1-> setIsCorrect(false);
            $reponse2=new reponseQuiz();
            $reponse2-> setIsCorrect(false);
            $reponse3=new reponseQuiz();
            $reponse3-> setIsCorrect(false);
            $reponse1C=$request->get('reponse1');
            $reponse2C= $request->get('reponse2');
            $reponse3C= $request->get('reponse3');
            $reponse1->setReponse($reponse1C);
            $reponse1->setIdQuestion($question);
            if($correct==='1')
                $reponse1-> setIsCorrect(true);

            $reponse2->setReponse($reponse2C);
            $reponse2->setIdQuestion($question);
            if($correct==='2')
                $reponse2-> setIsCorrect(true);
            $reponse3->setReponse($reponse3C);
            $reponse3->setIdQuestion($question);
            if($correct==='3')
                $reponse3-> setIsCorrect(true);
            $em->persist($reponse1);
            $em->persist($reponse2);
            $em->persist($reponse3);
            $em->flush();

            //var_dump($questionC);
           return $this->redirectToRoute('quiz_question', array('id' => $quiz->getId()));

        }


          return $this->render('quiz/Question.html.twig', array(

          ));

      }
      public function affichageQuizAction(Request $request){
        $quiz=$request->get('id');

        return $this->render('quiz/AffichageQuiz.html.twig', array(array('id' => $quiz->getId())

        ));
      }

    public function playQuizAction(Quiz $quiz,Request $request)
    {

        $request->request->get('name');

        $deleteForm = $this->createDeleteForm($quiz);
        $em=$this->getDoctrine()->getManager();
        $questions=$em->getRepository('AppBundle:questionQuiz')->findby(array('idQuiz'=>$quiz->getId()));
        $idq1=$questions[0]->getId();
        $idq2=$questions[1]->getId();
        $idq3=$questions[2]->getId();
        $idq4=$questions[3]->getId();
        $idq5=$questions[4]->getId();
        $reponses1=$em->getRepository('AppBundle:reponseQuiz')->findby(array('idQuestion'=>$idq1));
        $reponses2=$em->getRepository('AppBundle:reponseQuiz')->findby(array('idQuestion'=>$idq2));
        $reponses3=$em->getRepository('AppBundle:reponseQuiz')->findby(array('idQuestion'=>$idq3));
        $reponses4=$em->getRepository('AppBundle:reponseQuiz')->findby(array('idQuestion'=>$idq4));
        $reponses5=$em->getRepository('AppBundle:reponseQuiz')->findby(array('idQuestion'=>$idq5));




        return $this->render('quiz/show.html.twig', array(
            'quiz' => $quiz,
            'question1'=>$questions[0],
            'question2'=>$questions[1],
            'question3'=>$questions[2],
            'question4'=>$questions[3],
            'question5'=>$questions[4],
            'reponses1'=>$reponses1,
            'reponses2'=>$reponses2,
            'reponses3'=>$reponses3,
            'reponses4'=>$reponses4,
            'reponses5'=>$reponses5,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Finds and displays a quiz entity.
     *
     */
    public function showAction(Quiz $quiz,Request $request)
    {

        if($request->getMethod()=='POST'){
            $Qr1=$request->request->get('rep1');
            $Qr2=$request->request->get('rep2');
            $Qr3=$request->request->get('rep3');
            $Qr4=$request->request->get('rep4');
            $Qr5=$request->request->get('rep5');
            $Score=0;
            $Reps=array($Qr1,$Qr2,$Qr3,$Qr4,$Qr5);

            foreach ($Reps as $R) {
                if($R==='1'){
                    $Score++;
                }

            }

            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $resulatQuiz = new Resulatquiz();
            $resulatQuiz->setIdQuiz($quiz);
            $resulatQuiz->setScore($Score);
            $resulatQuiz->setIdUser($user->getId());
            $em->persist($resulatQuiz);
            $em->flush();
            return $this->render('resulatquiz/show.html.twig', array(
                'resulatQuiz' => $resulatQuiz,

            ));
        }
        $deleteForm = $this->createDeleteForm($quiz);
        $em=$this->getDoctrine()->getManager();
        $questions=$em->getRepository('AppBundle:questionQuiz')->findby(array('idQuiz'=>$quiz->getId()));

        $reponses=$em->getRepository('AppBundle:reponseQuiz')->findAll();




        return $this->render('quiz/show.html.twig', array(
            'quiz' => $quiz,
            'questions'=>$questions,
            'reponses'=>$reponses,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing quiz entity.
     *
     */
    public function editAction(Request $request, Quiz $quiz)
    {
        $deleteForm = $this->createDeleteForm($quiz);
        $editForm = $this->createForm('AppBundle\Form\QuizType', $quiz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quiz_edit', array('id' => $quiz->getId()));
        }

        return $this->render('quiz/edit.html.twig', array(
            'quiz' => $quiz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function rechercheFrontAction(Request $request)
    {
        //     var_dump("x");

        if($request->isXmlHttpRequest() && $request->isMethod('post')){

            $em = $this->getDoctrine()->getManager();


            $nom=$request->get('nom');
            $query=$em->getRepository('AppBundle:Quiz')->createQueryBuilder('u');
            $quizzes= $query->where($query->expr()->like('u.titre',':p'))
                ->setParameter('p','%'.$nom.'%')->getQuery()->getResult();
            $response = $this->renderView('quiz/searchFront.html.twig',array('quizzes' => $quizzes,
            ));
            //    var_dump($response);
            return  new JsonResponse($response) ;
        }
        return new JsonResponse(array("status"=>true));

    }


    public function rechercheAction(Request $request)
    {
   //     var_dump("x");

        if($request->isXmlHttpRequest() && $request->isMethod('post')){

            $em = $this->getDoctrine()->getManager();


            $nom=$request->get('nom');
            $query=$em->getRepository('AppBundle:Quiz')->createQueryBuilder('u');
            $quizzes= $query->where($query->expr()->like('u.titre',':p'))
            ->setParameter('p','%'.$nom.'%')->getQuery()->getResult();
            $response = $this->renderView('quiz/search.html.twig',array('quizzes' => $quizzes,
            ));
        //    var_dump($response);
            return  new JsonResponse($response) ;
        }
        return new JsonResponse(array("status"=>true));

    }

    /**
     * Deletes a quiz entity.
     *
     */
    public function deleteAction(Request $request, Quiz $quiz)
    {
        $form = $this->createDeleteForm($quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($quiz);
            $em->flush();
        }

        return $this->redirectToRoute('quiz_index');
    }

    public function validerAction(Request $request, Quiz $quiz)
    {


            $quiz->setValide(true);
            $em = $this->getDoctrine()->getManager();
            $em->merge($quiz);
            $em->flush();
            $this->sendEmail($quiz->getTitre());

        return $this->redirectToRoute('quiz_index');
    }

    private function sendEmail($quiz)
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.mail.yahoo.com', 465,'ssl')->setUsername('said_hmidi@yahoo.com')->setPassword('s54550468h');

        $mailer = \Swift_Mailer::newInstance($transport);

       // $mailer=\Swift_Mailer::newInstance();
        $message = \Swift_Message::newInstance()
            ->setSubject('test')
            ->setTo($this->getAllMails())
            ->setFrom("said_hmidi@yahoo.com")
            ->setBody('Veuillez essayer notre nouveau quiz de '.$quiz);

        $mailer->send($message);

  //  var_dump($this->get('mailer'));
    //    die();

    }



    public function desactiverAction(Request $request, Quiz $quiz)
    {


        $quiz->setValide(false);
        $em = $this->getDoctrine()->getManager();
        $em->merge($quiz);
        $em->flush();

        return $this->redirectToRoute('quiz_index');
    }

    /**
     * Creates a form to delete a quiz entity.
     *
     * @param Quiz $quiz The quiz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Quiz $quiz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quiz_delete', array('id' => $quiz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function getAllMails(){

        $em = $this->getDoctrine()->getManager();
            $i=0;
        $users = $em->getRepository('AppBundle:User')->findAll();

        foreach ($users as $v) {
            $mails[$i] = $v->getEmail();
            $i++;
        }
return $mails;
    }
}
