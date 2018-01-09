<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Products
{
    /**
     * @ORM\ManyToOne(targetEntity="ManufacturingResources", inversedBy="products")
     * @ORM\JoinColumn(name="manufacturing_resource_id", referencedColumnName="id")
     */
    private $manufacturing_resource;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $manufacturing_resource_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $manufacturing_resource_count;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    private $available_count;

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

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($val)
    {
        $this->price = $val;
    }

    public function getManufacturingResourceCount()
    {
        return $this->manufacturing_resource_count;
    }

    public function setManufacturingResourceCount($val)
    {
        $this->manufacturing_resource_count = $val;
    }

    public function getManufacturingResourceId()
    {
        return $this->manufacturing_resource_id;
    }

    public function setManufacturingResourceId($val)
    {
        $this->manufacturing_resource_id = $val;
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

    public function getManufacturingResource()
    {
        return $this->manufacturing_resource;
    }

    public function setManufacturingResource($val)
    {
        $this->manufacturing_resource = $val;
    }

    public function getAvailableCount()
    {
        return intval($this->getManufacturingResource()->getCount() / $this->getManufacturingResourceCount());
    }
}