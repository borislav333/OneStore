<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\CartType;
use function Sodium\crypto_pwhash;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Cookie;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(AuthorizationCheckerInterface $authChecker,Request $request)
    {
        if ((false === $authChecker->isGranted('ROLE_USER')) || (false === $authChecker->isGranted('ROLE_ADMIN'))) {

            /*$cookies=$request->cookies->get('PHPSESSID');
            $cookiesMD5=md5($cookies);
            $request->getSession()->set('GUEST_SESS',$cookiesMD5);

            var_dump();*/
        }

        $product=$this->getDoctrine()->getRepository(Product::class)->findAll();
        $session=$request->getSession();
        $cartProducts=$session->get('products');
        //var_dump($request->request->get('add'));

        //count($cartProducts);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'product'=>$product,'cartProducts'=>$cartProducts
        ]);
    }


}
