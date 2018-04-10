<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Article;
use AppBundle\Entity\CategorieArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Repository\BlogRepository;

/**
 * Article controller.
 *
 * @Route("article")
 */
class ArticleController extends Controller
{
    /**
     * Lists all article entities.
     *
     * @Route("/", name="article_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('article/index.html.twig', array(
            'articles' => $articles,
        ));
    }

    public function newAction(Request $request)
    {
        $now = new \DateTime();
        $article = new Article();
        $categ = new CategorieArticle();
        $em = $this->getDoctrine()->getManager();



        $article->setDatePub($now);
        $user =$this->getUser()->getId() ;
        $article->setIdUser($user);
        $article->setVisibilite(0);



        if ($request->getMethod() == Request::METHOD_POST) {
            $contenu = $request->request->get('contenuArticle');
           $article->setContenuArticle($contenu);
           //  $cat = $request->request->get('idCat');
           // $nomcat = $request->request->get('nomCat');

            //$param = $request->query->all();

            //$params = $this->getRequest()->request->all();
           // $cat = $params['idCat'];
          //  $quest = $request->request->get('idCat');
         //   $cat = var_dump($request['idCat']);

           // $cat['idCat'] = Input::get('idCat');
        //  $article->setIdCat($cat);
        }

      $form = $this->createForm('AppBundle\Form\ArticleType', $article);
      $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $cat = $request->request->get('idCat')->getId();
            $cat = $form->get('idCat')->getData()->getIdCat();

            $article->setIdCat($cat);
           $em = $this->getDoctrine()->getManager();
            $em->persist($article);

            $em->flush();

           // $request->getSession()->getFlashBag()->add('notice', 'Votre message a été envoyé !');
       return $this->redirectToRoute('article_show', array('idArticle' => $article->getIdarticle()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/{idArticle}", name="article_show")
     * @Method("GET")
     */
    public function showAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/{idArticle}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('AppBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('idArticle' => $article->getIdarticle()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/{idArticle}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {

       {
        $em = $this -> container->get('doctrine')->getEntityManager();
        $article=$em->getRepository('AppBundle:Article')->find($id);
        var_dump($article);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('bloguser');


    }}
        /*

        $form = $this->createDeleteForm($article);
        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($article);
                $em->flush();
            }

           // return $this->redirectToRoute('article_edit', array('idArticle' => $article->getIdarticle()));
         return $this->render('article/blogByuser.html.twig', array(
                'delete_form' => $form->createView(),
                'article' => $article

            ));

        }

    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
        /*
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bloguser/{id}', array('idArticle' => $article->getIdarticle())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
*/

    /**
     * Finds and displays a article entity.
     *
     * @Route("/{blogHome}", name="blogHome")
     * @Method("GET")
     */
   public function affichblogAction()
    {
      $em = $this->getDoctrine()->getEntityManager();
       // $em =  $this->get('doctrine.orm.articleRepository');

        $articles = $em->getRepository('AppBundle:Article')->findAll();
        //$article = $em->getRepository('AppBundle:Article')->find($request->get('idArticle'));
        $R = $this->getDoctrine()
            ->getManager()
            ->createQueryBuilder('r')
            ->add('select','r')
            ->add('from','AppBundle:Article r')
            ->where('r.visibilite = 1')

            ->getQuery()
            ->getResult();

        return $this->render('article/blogHome.html.twig', array(
            'articles' => $articles,
            'r' => $R
        ));
    }


   /* public function affichvisiblBlogAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findArticleByVisib();


        return $this->render('article/blogHome.html.twig', array(
            'articles' => $articles,
        ));
    }*/

    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findBy(array('idArticle' => $id));


        return $this->render('article/detail.html.twig', array(
            'articles' => $articles

        ));
    }

    public function searcharticleAction(Request $request)
    {

        if($request->isXmlHttpRequest() && $request->isMethod('post')){

            $titre = $request->get('titre');
            $em = $this->getDoctrine()->getEntityManager();
            $query =$em->getRepository('AppBundle:Article')->createQueryBuilder('u');
            $article= $query->where($query->expr()->like('u.titre_article',':p'))
                ->setParameter('p','%'.$titre.'%')
                ->getQuery()->getResult();

            $response = $this->renderView('article/blogHome.html.twig',array('all'=>$article));
            return  new JsonResponse($response) ;
        }
        return new JsonResponse(array("status"=>true));




}
 /*

        $em = $this->getDoctrine()->getManager();
        $articles = new Article();

        try {
            if ($request->isXmlHttpRequest()) {
                $titre = $request->get('titre');
                $serializer = new Serializer((array(new ObjectNormalizer())));

           *    $req = $this->getEntityManager()->createQuery(
        //'select * from article where titre_article like :titre'
            "select  m from AppBundle:Article m where m.titre_article LIKE :titre"
        )->setParameter('titre', $titre);


                $articles = $em->getRepository('AppBundle:Article')->findAll();
                //$article = $em->getRepository('AppBundle:Article')->find($request->get('idArticle'));
                $R = $this->getDoctrine()
                    ->getManager()
                    ->createQueryBuilder('r')
                    ->add('select','r')
                    ->add('from','AppBundle:Article r')
                    ->where('r.titre_article LIKE :titre')
                    ->setParameter('titre', $titre)

                    ->getQuery()
                    ->getResult();

                return $this->render('article/blogHome.html.twig', array(

                    'r' => $R
                ));
                $data = $serializer->normalize($R);
                return new JsonResponse($data);

            }
        } catch (\Exception $exception){
            echo  $exception ;
    //    $articles = $em->getRepository('AppBundle:Article')->findAll();



        }




        return $this->render('article/blogHome.html.twig', array(
            'articles' => $articles,
        ));
   }
*/
    public function blogByUserAction()
    {

        $user =$this->getUser()->getId() ;

        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('AppBundle:Article')->findBy(array('idUser' => $user));


        return $this->render('article/blogByuser.html.twig', array(
            'article' => $article

        ));
}


    public function categAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieArticles = $em->getRepository('AppBundle:CategorieArticle')->findAll();

        return $this->render('article/new.html.twig', array(
            'categorieArticles' => $categorieArticles,
        ));
    }




}
