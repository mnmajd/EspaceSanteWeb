<?php

namespace AppBundle\Controller;

use AppBundle\Entity\resulatQuiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Resulatquiz controller.
 *
 */
class resulatQuizController extends Controller
{
    /**
     * Lists all resulatQuiz entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resulatQuizzes = $em->getRepository('AppBundle:resulatQuiz')->findAll();

        return $this->render('resulatquiz/index.html.twig', array(
            'resulatQuizzes' => $resulatQuizzes,
        ));
    }

    /**
     * Creates a new resulatQuiz entity.
     *
     */
    public function newAction(Request $request)
    {
        $resulatQuiz = new Resulatquiz();
        $form = $this->createForm('AppBundle\Form\resulatQuizType', $resulatQuiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resulatQuiz);
            $em->flush();

            return $this->redirectToRoute('resulatquiz_show', array('id' => $resulatQuiz->getId()));
        }

        return $this->render('resulatquiz/new.html.twig', array(
            'resulatQuiz' => $resulatQuiz,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resulatQuiz entity.
     *
     */
    public function showAction(resulatQuiz $resulatQuiz)
    {
        $deleteForm = $this->createDeleteForm($resulatQuiz);

        return $this->render('resulatquiz/show.html.twig', array(
            'resulatQuiz' => $resulatQuiz,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resulatQuiz entity.
     *
     */
    public function editAction(Request $request, resulatQuiz $resulatQuiz)
    {
        $deleteForm = $this->createDeleteForm($resulatQuiz);
        $editForm = $this->createForm('AppBundle\Form\resulatQuizType', $resulatQuiz);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resulatquiz_edit', array('id' => $resulatQuiz->getId()));
        }

        return $this->render('resulatquiz/edit.html.twig', array(
            'resulatQuiz' => $resulatQuiz,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resulatQuiz entity.
     *
     */
    public function deleteAction(Request $request, resulatQuiz $resulatQuiz)
    {
        $form = $this->createDeleteForm($resulatQuiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resulatQuiz);
            $em->flush();
        }

        return $this->redirectToRoute('resulatquiz_index');
    }

    /**
     * Creates a form to delete a resulatQuiz entity.
     *
     * @param resulatQuiz $resulatQuiz The resulatQuiz entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(resulatQuiz $resulatQuiz)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resulatquiz_delete', array('id' => $resulatQuiz->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
