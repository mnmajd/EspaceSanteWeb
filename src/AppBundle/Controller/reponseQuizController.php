<?php

namespace AppBundle\Controller;

use AppBundle\Entity\reponseQuiz;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



/**
 * Reponsequiz controller.
 *
 */
class reponseQuizController extends Controller
{
    /**
     * Lists all reponseQuiz entities.
     *
     */




    public function statAction()
    {

        $pieChart = new PieChart();
        $em = $this->getDoctrine()->getManager();
        $questionApps = $em->getRepository('AppBundle:reponseQuiz')->findBy(array('isCorrect'=> 1));
        $questionNot = $em->getRepository('AppBundle:reponseQuiz')->findBy(array('isCorrect'=> 0));
        $nbr1 = 1;
        $nbr2 = 1 ;
        foreach ($questionApps as $questionApp)
        {
            $nbr1 = $nbr1 + 1 ;
        }
        foreach ($questionNot as $questionNot)
        {
            $nbr2 = $nbr2+1;
        }

        $pieChart->getData()->setArrayToDataTable(
            [['reponseQuiz', 'Apprové'],
                ['reponseQuiz correct',     $nbr1],
                ['reponseQuiz not correct',      $nbr2],

            ]
        );

        $pieChart->getOptions()->setTitle('Pourcentages des questions correcte');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);




        return $this->render('reponsequiz/statistique.html.twig', array(
            'piechart'=>$pieChart
        ));
    }



    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reponseQuizzes = $em->getRepository('AppBundle:reponseQuiz')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pag = $paginator->paginate(
            $reponseQuizzes,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',6)

        );

        return $this->render('reponsequiz/index.html.twig', array(
            'reponseQuizzes' => $pag,
        ));
    }

    /**
     * Creates a new reponseQuiz entity.
     *
     */
    public function newAction(Request $request)
    {
        $reponseQuiz = new Reponsequiz();
        $form = $this->createForm('AppBundle\Form\reponseQuizType', $reponseQuiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reponseQuiz);
            $em->flush();

            return $this->redirectToRoute('reponsequiz_show', array('id' => $reponseQuiz->getId()));
        }

        return $this->render('reponsequiz/new.html.twig', array(
            'reponseQuiz' => $reponseQuiz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reponseQuiz entity.
     *
     */
    public function showAction(reponseQuiz $reponseQuiz)
    {
        $deleteForm = $this->createDeleteForm($reponseQuiz);

        return $this->render('reponsequiz/show.html.twig', array(
            'reponseQuiz' => $reponseQuiz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reponseQuiz entity.
     *
     */
    public function editAction(Request $request, reponseQuiz $reponseQuiz)
    {
        $deleteForm = $this->createDeleteForm($reponseQuiz);
        $editForm = $this->createForm('AppBundle\Form\reponseQuizType', $reponseQuiz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponsequiz_edit', array('id' => $reponseQuiz->getId()));
        }

        return $this->render('reponsequiz/edit.html.twig', array(
            'reponseQuiz' => $reponseQuiz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reponseQuiz entity.
     *
     */
    public function deleteAction(Request $request, reponseQuiz $reponseQuiz)
    {
        $form = $this->createDeleteForm($reponseQuiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reponseQuiz);
            $em->flush();
        }

        return $this->redirectToRoute('reponsequiz_index');
    }

    /**
     * Creates a form to delete a reponseQuiz entity.
     *
     * @param reponseQuiz $reponseQuiz The reponseQuiz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(reponseQuiz $reponseQuiz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponsequiz_delete', array('id' => $reponseQuiz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
