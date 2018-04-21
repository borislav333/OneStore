<?php
/**
 * Created by PhpStorm.
 * User: Borislav
 * Date: 21.4.2018 г.
 * Time: 10:30 ч.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {


        return $this->render('index.html.twig');
    }
}