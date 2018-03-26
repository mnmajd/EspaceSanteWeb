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


class AnnonceController extends Controller

{

    public function AjoutAnnonceAction(Request $request){

        $Annonce = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $form=$this->createForm(AnnonceType::class,$Annonce);
        $form->handleRequest($request);
        if($form->isSubmitted()) {

            $em->persist($Annonce);
            $em->flush();

            //return $this->redirectToRoute ("");
        }

        return $this->render("Annonce/AjoutAnnonce.html.twig", array(
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

}