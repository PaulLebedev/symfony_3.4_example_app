<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('product/index.html.twig', [
            'header' => 'Product list',
            'items' => [
                ['name' => 'C2', 'available_count' => 15, 'price' => 20],
                ['name' => 'C3', 'available_count' => 10, 'price' => 30],
                ['name' => 'K5', 'available_count' => 6, 'price' => 25],
                ['name' => 'K7', 'available_count' => 4, 'price' => 35],
            ],
        ]);
    }

    /*public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }*/
}
