<?php
/**
 * Created by PhpStorm.
 * User: chayma
 * Date: 04/04/2018
 * Time: 20:42
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Mail;
use AppBundle\Form\MailType;
use Symfony\Bridge\Swiftmailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{

    public function indexAction()
    {
        return $this->render('AppBundle:Mail:mail.html.twig', array());

}
    public function indexMailAction(Request $request,$idService)
    {
        $mail=new Mail();
        $em=$this->getDoctrine()->getManager();
        $service = $em->getRepository('AppBundle:Service')->find($idService);

        $message= \Swift_Message::newInstance()
            ->setSubject('Acusé de réception')
            ->setFrom('chaima.blaiech@esprit.tn')
            ->setTo($service->getEMail())
            ->setBody(

                $mail->setText($request->get('description')),
                'text/html'
            );
        $this->get('mailer')->send($message);
        return $this->redirect($this->generateUrl('my_app_mail_accuse'));

    }

    public function successAction(){
        return new Response("email envoyé avec succés,Merci de vérifier votre boite mail.");
    }

}
