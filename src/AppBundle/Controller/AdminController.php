<?php
/**
 * Created by PhpStorm.
 * User: majd
 * Date: 15/03/18
 * Time: 12:01 ص
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
    public function adminaction()
    {

        return $this->render('Admin/admin.html.twig', [

        ]);

    }
}