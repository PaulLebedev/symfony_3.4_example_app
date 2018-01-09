<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\ManufacturingResources;

class DebugController extends Controller
{
    public function flushDbAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('DELETE AppBundle:ManufacturingResources r');
        $query->execute();
        $query = $em->createQuery('DELETE AppBundle:Products r');
        $query->execute();
        foreach ([
                     ['id' => 1, 'count' => 100, 'name' => 'Берёза'],
                     ['id' => 2, 'count' => 200, 'name' => 'Дуб'],
                 ] as $item) {
            $resource = new ManufacturingResources();
            $resource->setId($item['id']);
            $resource->setCount($item['count']);
            $resource->setName($item['name']);
            $resource->setCreatedAt(date_create());
            $resource->setUpdatedAt(date_create());

            $em->persist($resource);
        }

        foreach ([
                     ['price' => 400, 'name' => 'С2', 'manufacturing_resource_id' => 2, 'manufacturing_resource_count' => 2],
                     ['price' => 600, 'name' => 'С3', 'manufacturing_resource_id' => 2, 'manufacturing_resource_count' => 3],
                     ['price' => 500, 'name' => 'К5', 'manufacturing_resource_id' => 1, 'manufacturing_resource_count' => 5],
                     ['price' => 700, 'name' => 'К7', 'manufacturing_resource_id' => 1, 'manufacturing_resource_count' => 7],
                 ] as $item) {
            $product = new Products();
            $product->setName($item['name']);
            $product->setPrice($item['price']);
            $product->setManufacturingResourceId($item['manufacturing_resource_id']);
            $product->setManufacturingResourceCount($item['manufacturing_resource_count']);
            $product->setCreatedAt(date_create());
            $product->setUpdatedAt(date_create());

            $em->persist($product);
        }

        $em->flush();

        return $this->redirectToRoute('start_page');
    }
}
