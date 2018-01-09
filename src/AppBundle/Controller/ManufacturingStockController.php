<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\ORM\EntityManagerInterface;

use AppBundle\Entity\ManufacturingResources;

class ManufacturingStockController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('manufacturing_stock/index.html.twig', [
            'header' => 'Manufacturing resource list',
            'items' => $this->getDoctrine()
                ->getRepository(ManufacturingResources::class)
                ->findBy([], ['id' => 'ASC']),
        ]);
    }

    public function resourceChangeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $resource = $em->getRepository(ManufacturingResources::class)->find($id);
        $current_count = $resource->getCount();
        $requested_count = intval($request->request->get('count'));
        if ($request->request->get('incrementing')) {
            $new_count = $current_count + $requested_count;
        } else {
            if ($current_count - $requested_count < 0)
                return $this->redirectToRoute('manufacturing_resource_list');
            else
                $new_count = $current_count - $requested_count;
        }
        $resource->setCount($new_count);

        $em->flush();

        return $this->redirectToRoute('manufacturing_resource_list');
    }
}
