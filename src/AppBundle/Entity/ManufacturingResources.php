<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="manufacturing_stock")
 */
class ManufacturingResources
{
    /**
     * @ORM\OneToMany(targetEntity="Products", mappedBy="manufacturing_resource")
     */

    private $products;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $count;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($val)
    {
        $this->id = $val;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($val)
    {
        $this->name = $val;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($val)
    {
        $this->count = $val;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($val)
    {
        $this->created_at = $val;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($val)
    {
        $this->updated_at = $val;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($val)
    {
        $this->products = $val;
    }
}