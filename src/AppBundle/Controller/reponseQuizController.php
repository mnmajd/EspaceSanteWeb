<?php

namespace AppBundle\Controller;

use AppBundle\Entity\reponseQuiz;
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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reponseQuizzes = $em->getRepository('AppBundle:reponseQuiz')->findAll();

        return $this->render('reponsequiz/index.html.twig', array(
            'reponseQuizzes' => $reponseQuizzes,
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
