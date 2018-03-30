<?php
/**
 * Created by PhpStorm.
 * User: tarek
 * Date: 22/03/2018
 * Time: 13:30
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Annonce;
use AppBundle\Form\AnnonceType;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Workflow\Event\Event;


class AnnonceController extends Controller

{

    public function AjoutEventAction(Request $request){

        $Annonce = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $form=$this->createForm(AnnonceType::class,$Annonce);
        $form->handleRequest($request);
        if($form->isSubmitted()) {

            $em->persist($Annonce);
            $em->flush();

            //return $this->redirectToRoute ("");
        }

        return $this->render("AjoutEvent.html.twig", array(
            'form'=>$form->createView()
        ));
    }


    public function afficherOffreAction(Request $request , $typeAnnonce)
    {
        $em = $this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")
            ->afficherOffreDQL($typeAnnonce);
        if ($request->isMethod('POST')){
            $titreAnnonce=$request->get('titreAnnonce');
            $Offre=$em->getRepository("AppBundle:Annonce")->findBy(array('titreAnnonce'=>$titreAnnonce));
        }
        return $this->render('Annonce/afficherOffre.html.twig', array(
            'Offre'=>$Offre ));

    }

    public function afficherOffreDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")->find($id);

        return $this->render('Annonce/afficheOffreDetail.html.twig ', array(
            'Offre'=>$Offre ));

    }

    Public function afficherEventAction(Request $request , $typeAnnonce)
    {
        $em = $this->getDoctrine()->getManager();
        $Event = $em->getRepository("AppBundle:Annonce")
               ->afficherEventDQL($typeAnnonce);
        if ($request->isMethod('POST')){
            $titreAnnonce=$request->get('titreAnnonce');
            $Event=$em->getRepository("AppBundle:Annonce")->findBy(array('titreAnnonce'=>$titreAnnonce));
        }
        return $this->render("Annonce/afficherEvent.html.twig", array('Event'=>$Event));
    }

    public function afficherEventDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->find($id);

        return $this->render('Annonce/afficherEventDetail.html.twig ', array(
            'Event'=>$Event ));

    }


    public function DeleteEventAction(Request $request ,$id){

        $Event = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->find($id);
        $em->remove($Event);
        $em->flush();
        return $this->redirectToRoute("AfficherEvent");
    }



    public function modifierEventAction(Request $request ,$id){

        $em=$this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->find($id);
        $form=$this->createForm(AnnonceType::class , $Event);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em->persist($Event);
            $em->flush();

            return $this->redirectToRoute ("AfficherEventDetail");
        }

        return $this->render("Annonce/modifierEvent.html.twig", array( 'form'=>$form->createView()
        ));
    }


    public function RechercheEventAction(Request $request )
    {

        $em=$this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->findAll();
        if ($request->isMethod('POST')){
            $Event=$request->get('Event');
            $Event=$em->getRepository("AppBundle:Annonce")->findBy(array('Event'=>$Event));

        }

        return $this->render("Annonce/afficherEvent.html.twig",array('Event'=>$Event));

    }

    public function AjoutOffreAction(Request $request){

        $Annonce = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $form=$this->createForm(AnnonceType::class,$Annonce);
        $form->handleRequest($request);
        if($form->isSubmitted()) {

            $em->persist($Annonce);
            $em->flush();

            //return $this->redirectToRoute ("");
        }

        return $this->render("Annonce/AjoutOffre.html.twig", array(
            'form'=>$form->createView()
        ));
    }

    public function DeleteOffreAction(Request $request ,$id){

        $Offre = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")->find($id);
        $em->remove($Offre);
        $em->flush();
        return $this->redirectToRoute("AfficherOffre");
    }

    public function RechercheOffreAction(Request $request )
    {

        $em=$this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")->findAll();
        if ($request->isMethod('POST')){
            $Offre=$request->get('Offre');
            $Offre=$em->getRepository("AppBundle:Annonce")->findBy(array('Offre'=>$Offre));

        }

        return $this->render("Annonce/afficherOffre.html.twig",array('Offre'=>$Offre));

    }

    public function modifierOffreAction(Request $request ,$id){

        $em=$this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")->find($id);
        $form=$this->createForm(AnnonceType::class , $Offre);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em->persist($Offre);
            $em->flush();

            return $this->redirectToRoute ("AfficherOffreDetail");
        }

        return $this->render("Annonce/modifierOffre.html.twig", array( 'form'=>$form->createView()
        ));
    }


}