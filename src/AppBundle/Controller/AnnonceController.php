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
use Symfony\Component\HttpFoundation\Response;


class AnnonceController extends Controller

{

    public function AjoutEventAction(Request $request){

        $event = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $form=$this->createForm(AnnonceType::class,$event);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $event->setTypeAnnonce("Evenement");
           // $Annonce->uploadProfilePicture();
            $file = $event->getFile();
            $event->setPublished(false);
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getUploadRootDir(),
                $fileName
            );

            $event->setNomImage($fileName);
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute ("AfficherEvent", array('typeAnnonce'=>$event->getTypeAnnonce()));
        }
        return $this->render("Annonce/AjoutEvent.html.twig", array(
            'form'=>$form->createView()
        ));
    }

    public function afficherOffreAction(Request $request , $typeAnnonce)
    {
//        $em = $this->getDoctrine()->getManager();
//        $Offre=$em->getRepository("AppBundle:Annonce")
//            ->afficherOffreDQL($typeAnnonce);
//        $dql   = "SELECT * FROM AppBundle:Annonce a";
//        $query = $em->createQuery($dql);
//
//       $paginator  = $this->get('knp_paginator');
//       $result = $paginator->paginate(
//        $Offre,
//        $request->query->getInt('page', 1),
//        $request->query->getInt('page', 10)
//        );
//        return $this->render('Annonce/afficherOffre.html.twig', array('blog_Post' => $result));
//
//
//        if ($request->isMethod('POST')){
//            $titreAnnonce=$request->get('titreAnnonce');
//            $Offre=$em->getRepository("AppBundle:Annonce")->findBy(array('titreAnnonce'=>$titreAnnonce));
//        }
        $em = $this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")
            ->afficherOffreDQL($typeAnnonce);


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Offre, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        // parameters to template
        return $this->render('Annonce/afficherOffre.html.twig', array(
            'Offre'=>$Offre,
            'pagination' => $pagination));

    }

    Public function afficherEventAction(Request $request , $typeAnnonce)
    {
        $em = $this->getDoctrine()->getManager();
        $Event = $em->getRepository("AppBundle:Annonce")
            ->afficherEventDQL($typeAnnonce);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $Event, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render("Annonce/afficherEvent.html.twig", array('Event'=>$Event,
            'pagination' => $pagination));
    }


    public function afficherOffreDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $offre=$em->getRepository("AppBundle:Annonce")->find($id);

        return $this->render('Annonce/afficheOffreDetail.html.twig ', array(
            'offre'=>$offre ));

    }


    public function afficherEventDetailAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->find($id);

        return $this->render('Annonce/afficherEventDetail.html.twig ', array(
            'Event'=>$Event ));

    }


    public function DeleteEventAction($id,$typeAnnonce ){

        $Event = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->find($id);
        $em->remove($Event);
        $em->flush();
        return $this->redirectToRoute("AfficherEvent" ,array(

         'typeAnnonce'=>$typeAnnonce
        ));
    }



    public function modifierEventAction(Request $request ,$id){

        $em=$this->getDoctrine()->getManager();
        $Event=$em->getRepository("AppBundle:Annonce")->find($id);
        $form=$this->createForm(AnnonceType::class , $Event);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em->persist($Event);
            $em->flush();

            return $this->redirectToRoute ("AfficherEventDetail", array( 'id'=>$id));
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
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    public function AjoutOffreAction(Request $request){

        $annonce = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $form=$this->createForm(AnnonceType::class,$annonce);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $annonce->setTypeAnnonce("offre d'emploi");
           // $annonce->uploadProfilePicture();
            $file = $annonce->getFile();
            $annonce->setPublished(false);
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getUploadRootDir(),
                $fileName
            );

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $annonce->setNomImage($fileName);

            $em->persist($annonce);

            $em->flush();

            return $this->redirectToRoute ("AfficherOffre", array('typeAnnonce'=>$annonce->getTypeAnnonce()));
        }

        return $this->render("Annonce/AjoutOffre.html.twig", array(
            'form'=>$form->createView()
        ));
    }


    public function modifierOffreAction(Request $request ,$id){

        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository("AppBundle:Annonce")->find($id);
        $form=$this->createForm(AnnonceType::class , $offre);
        $form->handleRequest($request);
        if($form->isSubmitted()) {

            $em->persist($offre);
            $em->flush();

            return $this->redirectToRoute ("AfficherOffreDetail" , array( 'id'=>$id));
        }

        return $this->render("Annonce/modifierOffre.html.twig", array( 'form'=>$form->createView()
        ));
    }



    public function DeleteOffreAction($id,$typeAnnonce){

        $Offre = new Annonce();
        $em=$this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")->find($id);
        $em->remove($Offre);
        $em->flush();
        return $this->redirectToRoute("AfficherOffre",array(

            'typeAnnonce'=>$typeAnnonce
        ));

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


    protected function getUploadRootDir()
    {
        //var_dump(__DIR__);
        //die;

        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){

        return 'image';
    }


    public function pdfAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $offre=$em->getRepository("AppBundle:Annonce")->find($id);

//var_dump($offre); die;
        $snappy = $this->get('knp_snappy.pdf');

        $html = $this->renderView('Annonce/pdf.html.twig ', array(
            'offre'=>$offre ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }



    public function pdf2Action($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event=$em->getRepository("AppBundle:Annonce")->find($id);

//var_dump($offre); die;
        $snappy = $this->get('knp_snappy.pdf');

        $html = $this->renderView('Annonce/pdf2.html.twig ', array(
            'event'=>$event ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
    public function afficherOffreAdminAction(Request $request , $typeAnnonce)
    {
        $em = $this->getDoctrine()->getManager();
        $Offre=$em->getRepository("AppBundle:Annonce")
            ->afficherOffreAdminDQL($typeAnnonce);

        return $this->render('Annonce/afficherOffreAdmin.html.twig', array(
            'Offre'=>$Offre ));
    }


}