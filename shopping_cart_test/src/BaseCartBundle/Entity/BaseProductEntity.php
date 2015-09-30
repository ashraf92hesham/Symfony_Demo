<?php

namespace BaseCartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BaseCartBundle\Entity\BaseShoppingCartEntity;

/**
 * BaseProductEntity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BaseCartBundle\Entity\BaseProductEntityRepository")
 */
class BaseProductEntity
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
    *@var string
    *
    * @ORM\Column(name="name", type="string")
    */
    private $name;

    /**
    *@var string
    *
    * @ORM\Column(name="color", type="string")
    */
    private $color;

    /**
    *@var string
    *
    * @ORM\Column(name="description", type="string")
    */
    private $description;

    /**
    *@var string
    *
    * @ORM\Column(name="product_type", type="string")
    */
    private $product_type;

    /**
    *@var integer
    *
    * @ORM\Column(name="shopping_cart_id", type="integer")
    */
    private $shopping_cart_id;


    function _construct($name, $color, $cart_id){
        $this->name = $name;
        $this->color = $olor;
        $this->shopping_cart_id = $cart_id; 
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return BaseProductEntity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return BaseProductEntity
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return BaseProductEntity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set productType
     *
     * @param string $productType
     *
     * @return BaseProductEntity
     */
    public function setProductType($productType)
    {
        $this->product_type = $productType;

        return $this;
    }

    /**
     * Get productType
     *
     * @return string
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * Set shoppingCartId
     *
     * @param integer $shoppingCartId
     *
     * @return BaseProductEntity
     */
    public function setShoppingCartId($shoppingCartId)
    {
        $this->shopping_cart_id = $shoppingCartId;

        return $this;
    }

    /**
     * Get shoppingCartId
     *
     * @return integer
     */
    public function getShoppingCartId()
    {
        return $this->shopping_cart_id;
    }
}

class SaleProductEntity extends BaseProductEntity{}
