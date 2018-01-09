<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Products;

class ProductController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('product/index.html.twig', [
            'header' => 'Product list',
            'items' => $this->getDoctrine()
                ->getRepository(Products::class)
                ->findBy([], ['id' => 'ASC']),
        ]);
    }
}
