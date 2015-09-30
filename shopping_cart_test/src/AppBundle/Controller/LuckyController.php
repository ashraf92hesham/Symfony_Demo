<?php
namespace AppBundle\Controller;

use ShoppingCart\ShoppingCartBundle\Entity\ShoppingCart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
    *@Route("/base/cart")
    */
    public function createBaseCartAction(){
        $base_cart = new ShoppingCart();

        $base_cart->setCartType('BaseCart');
        $base_cart->setProductId(1);

        $em = $this->getDoctrine()->getManager();
        $em->persist($base_cart);
        $em->flush();

        return new Response('Cart of type '.$base_cart->getCartType().' Created');
    }
}
?>