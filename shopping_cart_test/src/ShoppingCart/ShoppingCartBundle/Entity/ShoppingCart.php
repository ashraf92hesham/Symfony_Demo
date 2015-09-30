<?php

namespace ShoppingCart\ShoppingCartBundle\Entity;

/**
 * ShoppingCart
 */
class ShoppingCart
{
    /**
     * @var integer
     */
    private $id;
    protected $cart_type;
    protected $product_id;


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
     * @return ShoppingCart
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
     * Set productId
     *
     * @param integer $productId
     *
     * @return ShoppingCart
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->product_id;
    }
}
