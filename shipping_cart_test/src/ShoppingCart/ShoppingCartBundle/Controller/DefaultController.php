<?php

namespace ShoppingCart\ShoppingCartBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ShoppingCart\ShoppingCartBundle\Entity\ShoppingCart;


class DefaultController extends Controller
{


    public function indexAction($name)
    {
        return $this->render('ShoppingCartShoppingCartBundle:Default:index.html.twig', array('name' => $name));
    }

}
