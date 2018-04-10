<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reclamation;
use AppBundle\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Reclamation controller.
 *
 * @Route("reclamation")
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     *
     */
    public function affichereclamationbackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclamations = $em->getRepository('AppBundle:Reclamation')->findreclamation();


        return $this->render('reclamation/index.html.twig', array(
            'reclamations' => $reclamations,
        ));
    }



    /**
     * Finds and displays a reclamation entity.
     *
     * @Route("/{id}", name="reclamation_show")
     * @Method("GET")
     */
    public function showAction(Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);

        return $this->render('reclamation/show.html.twig', array(
            'reclamation' => $reclamation,
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing reclamation entity.
     *
     * @Route("/{id}/edit", name="reclamation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);
        $editForm = $this->createForm('AppBundle\Form\ReclamationType', $reclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reclamation_edit', array('id' => $reclamation->getId()));
        }

        return $this->render('reclamation/edit.html.twig', array(
            'reclamation' => $reclamation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reclamation entity.
     *
     * @Route("/{id}", name="reclamation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reclamation $reclamation)
    {
        $form = $this->createDeleteForm($reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('reclamation_index');
    }

    /**
     * Creates a form to delete a reclamation entity.
     *
     * @param Reclamation $reclamation The reclamation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reclamation $reclamation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reclamation_delete', array('id' => $reclamation->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


    /**
     * Creates a new reclamation entity.

     */

    public function ajouterReclamationAction(Request $request,$idService)
    {
        $user=$this->getUser();

        $reclamation = new Reclamation();
        $em = $this->getDoctrine()->getManager();
        $service = new Service();
        $service = $em->getRepository('AppBundle:Service')->find($idService);
        $reclamation->setIdService($service);
        $reclamation->setIdUser($user);
        $reclamation->setDescription($request->get('description'));
        $reclamation->setConfirmation(0);
        $em->persist($reclamation);
        $em->flush($reclamation);
        return $this->redirectToRoute('indexservice');
    }


    public  function refuserreclamationAction (Request $requestAjax){
        $data=$requestAjax->get("idReclamation");
        $em=$this->getDoctrine()->getManager();
        $rec=$em->getRepository("AppBundle:Reclamation")->find($data);


        $em->remove($rec);
        $em->flush();


        return new Response(json_encode(array('data'=>$rec->getId())));
    }


    public function acceptreclamationAction(Request $requestAjax){

        $data=$requestAjax->get("idReclamation");
        $em=$this->getDoctrine()->getManager();
        $rec=$em->getRepository("AppBundle:Reclamation")->find($data);
        $rec ->setConfirmation(1);
        $em->persist($rec);
        $em->flush();
        $service=$em->getRepository("AppBundle:Service")->find($rec->getIdService());
        $service->setNbreclamation($service->getNbreclamation()+1);
        $em->persist($service);
        $em->flush();



        return new Response(json_encode(array('data'=>$rec->getId())));

    }



}
