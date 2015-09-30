<?php

namespace BaseCartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseShoppingCartEntity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BaseCartBundle\Entity\BaseShoppingCartEntityRepository")
 */
abstract class BaseShoppingCartEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @var string
    *
    * @ORM\Column(name="cart_type", type="string")
    */
    private $cart_type;

    /**
    * @var array
    *
    * @ORM\Column(name="products_ids", type="array")
    */
    private $products_ids;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cartType
     *
     * @param string $cartType
     *
     * @return BaseShoppingCartEntity
     */
    public function setCartType($cartType)
    {
        $this->cart_type = $cartType;

        return $this;
    }

    /**
     * Get cartType
     *
     * @return string
     */
    public function getCartType()
    {
        return $this->cart_type;
    }

    /**
     * Set productsIds
     *
     * @param array $productsIds
     *
     * @return BaseShoppingCartEntity
     */
    public function setProductsIds($productsIds)
    {
        $this->products_ids = $productsIds;

        return $this;
    }

    /**
     * Get productsIds
     *
     * @return array
     */
    public function getProductsIds()
    {
        return $this->products_ids;
    }

    abstract protected function emptyCart($thisp->roducts_ids); // this should be implemented depends on how the children will empty the cart 
}

// this is the first child of BaseShopingCart , its implemented emptyCart() saves the products_ids..
// in case that user would like to get them back in his cart.
// this implementation is just a show case of implementing an abstract method.
class ShopCartEntity extends BaseShoppingCartEntity{

    /**
    * @var array
    *
    * @ORM\Column(name="deleted_products_ids", type="array")
    */
    private deleted_products_ids;
    public function emptyCart($this->products_ids){
        $this->deleted_products_ids = $this->products_ids;
        $this->products_ids = [];
    }
}

// this is the second child of BaseShopingCart , its implemented emptyCart() DON'T save the products_ids..
// it just removes them.
// this implementation is just a show case of implementing an abstract method.
class WishListCartEntity extends BaseShoppingCartEntity{

    public function emptyCart($this->products_ids){
        $this->products_ids = [];
    }
}
