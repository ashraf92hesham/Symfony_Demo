<? php
namespace BaseCartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

use BaseCartBundle\Entity\BaseShoppingCartEntity;
use BaseCartBundle\Entity\BaseProductEntity;


/*
here is a declaration of what the controller should do ..
NOTE THAT I KNOW THAT IT IS NOT DONE RIGHT BECAUSE I STILL DON'T GET HOW THE WHOLE FRAMEWORK GOES.

when the user presses 'add to cart' on a product , this should retrieve a $product_id to the routing ,
which will be passed to the cart and then it will be used for searching the product in the database and get its full info.

every product added to cart , its id shoukd be passed to the cart.  
*/

class SHoppingCartController extends Controller{

	/**
	* @Route("/{product_id}/cart")
	*/

	function addToCartAction($product_id){
		$shopping_cart = new BaseShoppingCartEntity();

		$shopping_cart->setProductsIds($product_id);

		$manager = $this->getDoctrine()->getManager();

		$manager->persist($shopping_cart)
		$manager->flush();

		return new Response('Product '.$product_name.' Added to '.$shopping_cart->getCaryType());
	}

	/**
	* @Route("/add/product/{product_name}")
	*/

	function addProductAction($product_name){
		$product = new BaseProductEntity($product_name, 'Red');

		$manager = $this->getDoctrine()->getManager();
		
		$manager->persist($product);
		$manager->flush();

		return new Response('Product '.$product_name.' added to database');
	}
}

?>