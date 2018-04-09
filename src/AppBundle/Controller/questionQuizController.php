<?php

namespace AppBundle\Controller;

use AppBundle\Entity\questionQuiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Questionquiz controller.
 *
 */
class questionQuizController extends Controller
{
    /**
     * Lists all questionQuiz entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $questionQuizzes = $em->getRepository('AppBundle:questionQuiz')->findAll();

        $paginator  = $this->get('knp_paginator');
        $pag = $paginator->paginate(
            $questionQuizzes,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',6)

        );

        return $this->render('questionquiz/index.html.twig', array(
            'questionQuizzes' => $pag,
        ));
    }
    /**
     * Creates a new questionQuiz entity.
     *
     */
    public function newAction(Request $request)
    {
        $questionQuiz = new Questionquiz();
        $form = $this->createForm('AppBundle\Form\questionQuizType', $questionQuiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questionQuiz);
            $em->flush();

            return $this->redirectToRoute('questionquiz_show', array('id' => $questionQuiz->getId()));
        }

        return $this->render('questionquiz/new.html.twig', array(
            'questionQuiz' => $questionQuiz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a questionQuiz entity.
     *
     */
    public function showAction(questionQuiz $questionQuiz)
    {
        $deleteForm = $this->createDeleteForm($questionQuiz);

        return $this->render('questionquiz/show.html.twig', array(
            'questionQuiz' => $questionQuiz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing questionQuiz entity.
     *
     */
    public function editAction(Request $request, questionQuiz $questionQuiz)
    {
        $deleteForm = $this->createDeleteForm($questionQuiz);
        $editForm = $this->createForm('AppBundle\Form\questionQuizType', $questionQuiz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('questionquiz_edit', array('id' => $questionQuiz->getId()));
        }

        return $this->render('questionquiz/edit.html.twig', array(
            'questionQuiz' => $questionQuiz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a questionQuiz entity.
     *
     */
    public function deleteAction(Request $request, questionQuiz $questionQuiz)
    {
        $form = $this->createDeleteForm($questionQuiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($questionQuiz);
            $em->flush();
        }

        return $this->redirectToRoute('questionquiz_index');
    }

    /**
     * Creates a form to delete a questionQuiz entity.
     *
     * @param questionQuiz $questionQuiz The questionQuiz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(questionQuiz $questionQuiz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('questionquiz_delete', array('id' => $questionQuiz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
