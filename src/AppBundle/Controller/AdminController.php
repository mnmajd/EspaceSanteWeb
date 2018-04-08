<?php
/**
 * Created by PhpStorm.
 * User: majd
 * Date: 15/03/18
 * Time: 12:01 ص
 */

namespace AppBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    public function adminaction()
    {

        return $this->render('Admin/admin.html.twig', [

        ]);

    }


     public  function stataction()
     {
         $pieChart = new PieChart();
         $em = $this->getDoctrine()->getManager();
         $questionApps = $em->getRepository('AppBundle:Question')->findBy(array('approvedQuestion'=> 1));
         $questionNot = $em->getRepository('AppBundle:Question')->findBy(array('approvedQuestion'=> 0));
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
             [['Question', 'Apprové'],
                 ['Question Acceptées',     $nbr1],
                 ['Question refusées',      $nbr2],

             ]
         );

         $pieChart->getOptions()->setTitle('Pourcentages des questions acceptées');
         $pieChart->getOptions()->setHeight(500);
         $pieChart->getOptions()->setWidth(900);
         $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
         $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
         $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
         $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
         $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);




         return $this->render('Admin/stat.html.twig', array(
             'piechart'=>$pieChart
         ));
     }
   public function Questionaction(Request $request)
   {
       $em = $this->getDoctrine()->getManager();

       $questionNot = $em->getRepository('AppBundle:Question')->findBy(array('approvedQuestion'=> 0));

       if($request->isMethod('POST')){
           $message = \Swift_Message::newInstance()
               ->setSubject('Invitation')
               ->setFrom('majd.mimoun@esprit.tn')
               ->setTo($request->get('sender'))
               ->setBody('salut je suis  et je veux que vous rejoignez notre site Santé et bien etre :D !');            ;
           $this->get('mailer')->send($message);
       }


       return $this->render('Admin/Question.html.twig' ,array(
           'quest'=>$questionNot
       ));

   }
}