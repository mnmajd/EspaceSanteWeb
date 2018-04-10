<?php
/**
 * Created by PhpStorm.
 * User: majd
 * Date: 15/03/18
 * Time: 12:01 ص
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
    public function adminaction()
    {

        return $this->render('Admin/admin.html.twig', [

        ]);

    }



    public function testaction()
    {

        return $this->render('Forum/forum.html.twig', [

        ]);

    }

    public  function articleAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AppBundle:Article')->findAll();
        return $this->render('Admin/confirmerArticle.html.twig',array(
            'article' => $article


        ));

    }



    public function confirmarticleAction($id)
    {
         $article = new Article();
         $em = $this -> container->get('doctrine')->getEntityManager();
         $article=$em->getRepository('AppBundle:Article')->find($id);
         $vis = $article->getVisibilite();
         if($vis == 0 ){
          $article->setVisibilite(1);

         }else {
             $article->setVisibilite(0);
         }
         $em->persist($article);
         $em->flush();
              return $this->redirectToRoute('backarticle');



    }

    public function supprimAdminAction($id){
        $em = $this -> container->get('doctrine')->getEntityManager();
        $article=$em->getRepository('AppBundle:Article')->find($id);
        var_dump($article);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('backarticle');


    }
}