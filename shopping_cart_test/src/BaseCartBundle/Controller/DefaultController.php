<?php

namespace BaseCartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use BaseCartBundle\Entity\BaseShoppingCartEntity;
use BaseCartBundle\Entity\BaseProductEntity;


class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }


    // action for adding new cart into the database

    /**
    * @Route("/new/cart/{cart_type}")
    */

    function addCartAction($cart_type){
    	$cart = new BaseShoppingCartEntity();

    	$cart->setCartType($cart_type);

		$cartManager = $this->getDoctrine()->getManager();

		$cartManager->persist($cart);
		$cartManager->flush();

		return new Response('Cart '.$cart->getCartType().' added to database');
    }


    // action for adding new product to the database

    /**
	* @Route("/new/product/{product_name}")
	*/

	function addProductAction($product_name){
		$product = new BaseProductEntity();
		// $cart = new BaseShoppingCartEntity();

		// $cart->setCartType('BaseCart');
		// $cart->setProductsIds([]);

		// $cartManager = $this->getDOctrine()->getManager();

		// $cartManager->persist($cart);
		// $cartManager->flush();

		$product->setName($product_name);
		$product->setColor('RED');
		$product->setDescription('Sample Product');
		$product->setProductType('BaseProduct');
		$product->setShoppingCartId(0);

		$productManager = $this->getDoctrine()->getManager();
		
		$productManager->persist($product);
		$productManager->flush();

		return new Response('Product '.$product->getName().' added to database'	);
	}

	// action for showing products

	/**
	* @Route("/show/product/{product_id}")
	*/

	function showProductAction($product_id){
		$product = $this->getDoctrine()->getRepository('BaseCartBundle:BaseProductEntity')->find($product_id);

		if (!$product){
			throw $this->createNotFoundException(
            'No product found with id '.$product_id);
		}
		else{
			return new Response('Product '.$product->getName().' found.');
		}
	}


	// action for adding products to cart

	/**
	* @Route("/add/product/{product_id}/cart/{cart_id}")
	*/

	function addToCartAction($product_id, $cart_id){

		$product = $this->getDoctrine()->getRepository('BaseCartBundle:BaseProductEntity')->find($product_id);

		if (!$product){
			throw $this->createNotFoundException(
            'No product found with id '.$product_id);
		}

		else{
			$cart = $this->getDoctrine()->getRepository('BaseCartBundle:BaseShoppingCartEntity')->find($cart_id);

			if (!$cart){
			throw $this->createNotFoundException(
            'No cart found with id '.$cart_id);
			}

			else{

				$cart->setProductsIds($product_id);

				$cartManager = $this->getDoctrine()->getManager();

				$cartManager->persist($cart);
				$cartManager->flush();
				

				$products_ids_str = implode(",", $cart->getProductsIds());

				// return new Response('Cart with id # '.$cart->getId().' have products '.$products_ids_str);
				return $this->render('/addtocart.html.twig', array("cart_type"=> $cart->getCartType(), "products"=>$cart->getProductsIds()));
			}
		}
	}

}
