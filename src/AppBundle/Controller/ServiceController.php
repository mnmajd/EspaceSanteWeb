<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Service controller.
 *
 * @Route("service")
 */
class ServiceController extends Controller
{
    /**
     * Lists all service entities.
     *
     *
     */


    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('AppBundle:Service')->findAll();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $user2=$em->getRepository('AppBundle:User')->find($user);
        $reclamation=$em->getRepository('AppBundle:Reclamation')->findBy(array('idUser'=>$user2));

        return $this->render('service/index.html.twig', array(
            'services' => $services,'reclamations'=>$reclamation,'user'=>$user2
        ));
    }

    /**
     * Creates a new service entity.
     *
     * @Route("/new", name="service_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $user=$this->getUser();
        $latitude='36.8064948';
        $longitude='10.181531599999971';
        $service = new Service();
        $service->setLatitude($request->get('latitude'));
        $service->setLongitude($request->get('longitude'));
        $form = $this->createForm('AppBundle\Form\ServiceType', $service);
        $service->setIdUser($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $service->upload();

            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('profil', array('idService' => $service->getIdservice()));
        }

        return $this->render('service/new.html.twig', array(
            'service' => $service,
            'form' => $form->createView(),
            'user'=>$user,
            'latitude'=>$latitude,
            'longitude'=>$longitude
        ));
    }

    public function profilAction($idService)
    {
        $user=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $service=new Service();
        $services=$em->getRepository('AppBundle:Service')->findservice($idService);
        return $this->render('Profile/profile1.html.twig',array(
            'services'=>$services,'user'=>$user
        ));


    }


    /**
     * Finds and displays a service entity.
     *
     * @Route("/{idService}", name="service_show")
     * @Method("GET")
     */


    public function showAction(Service $service)
    {

        $deleteForm = $this->createDeleteForm($service);
        $service->upload();
        return $this->render('service/show.html.twig', array(
            'service' => $service,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing service entity.
     *
     * @Route("/{idService}/edit", name="service_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request,$idService)
    {
        $service = new Service();
        $em = $this->getDoctrine()->getManager();
        $service=$em->getRepository('AppBundle:Service')->find($idService);
        $user=$this->getUser();
        //$service->getLatitude();
        $latitude=$service->getLatitude();
        $longitude=$service->getLongitude();
        $service->setLatitude($request->get('latitude'));
        $service->setLongitude($request->get('longitude'));
        $deleteForm = $this->createDeleteForm($service);
        $editForm = $this->createForm('AppBundle\Form\ServiceType', $service);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $service->upload();
            return $this->redirectToRoute('profil', array('idService' => $service->getIdservice()));
        }

        return $this->render('service/edit.html.twig', array(
            'service' => $service,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'user'=>$user,
            'latitude'=>$latitude,
            'longitude'=>$longitude
        ));
    }


    /**
     * Deletes a service entity.
     *
     *
     */
    public function deleteAction(Request $request, $idService)
    {
        $em = $this->getDoctrine()->getManager();
        // $em = $this -> container -> get('doctrine')->getEntityManager();
        $service=$em->getRepository('AppBundle:Service')->find($idService);
        var_dump($service);
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute('indexservice');

    }

    public function suppserviceadminAction($idService)
    {
        $em = $this -> container -> get('doctrine')->getEntityManager();
        $service=$em->getRepository('AppBundle:Service')->find($idService);
        var_dump($service);
        $em->remove($service);
        $em->flush();
        return $this->redirectToRoute('afficherserviceback');

    }

    public function afficherservicebackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('AppBundle:Service')->findServByRec();


        return $this->render('service/afficheback.html.twig', array(
            'services' => $services,
        ));
    }

    /**
     * Creates a form to delete a service entity.
     *
     * @param Service $service The service entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Service $service)
    {
        return $this->createFormBuilder()

            ->setAction($this->generateUrl('supprimeservice', array('idService' => $service->getIdservice())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    public function searchAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        if($request->isMethod('POST')){
            $specialite=$request->get('specialite');
            $services=$em->getRepository("AppBundle:Service")->searchserviceByName($specialite);
            return $this->render("service/index.html.twig",array('services'=>$services));

        }
        $services=$em->getRepository("AppBundle:Service")->findAll();

        return $this->render("service/index.html.twig",array('services'=>$services));
    }



    public function chercherAction(Request $request)
    {
        if($request->isXmlHttpRequest() && $request->isMethod('post')){

            $eMail =$request->get('eMail');
            $em = $this->getDoctrine()->getEntityManager();
            $query =$em->getRepository('AppBundle:Service')->createQueryBuilder('u');
            $services= $query->where($query->expr()->like('u.eMail',':p'))
                ->setParameter('p','%'.$eMail.'%')
                ->getQuery()->getResult();

            $response = $this->renderView('service/afficheback.html.twig',array('services'=>$services));
            return  new JsonResponse($response) ;
        }
        return new JsonResponse(array("status"=>true));




    }


    /* public function chercherAction(Request $request)
     {
         if($request->isXmlHttpRequest() && $request->isMethod('post')){

             $nom =$request->get('nom');
             $em = $this->getDoctrine()->getEntityManager();
             $query =$em->getRepository('AppBundle:Service')->createQueryBuilder('u');
             $service= $query->where($query->expr()->like('u.nom',':p'))
                 ->setParameter('p','%'.$nom.'%')
                 ->getQuery()->getResult();

             $response = $this->renderView('service/chercher.html.twig',array('service'=>$service));
             return  new JsonResponse($response) ;
         }
         return new JsonResponse(array("status"=>true));

     }*/

    public function indexmapAction(){
        $name='name';
        return $this->render('default/indexmap.html.twig',array('name'=>$name));
    }


}
