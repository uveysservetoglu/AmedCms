<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    /**
     * @Route("/api/product/list")
     */
    public function listAction()
    {
        $entity = array(
            'p' => array('name' => 'ApiBundle:Product', 'alias' => 'p'),
        );
        $qStr = 'SELECT '. $entity['p']['alias'].' '.$entity['p']['name']
            . ' FROM ' . $entity['p']['name'] . ' ' . $entity['p']['alias'];
        $em = $this->get('doctrine')->getManager();
        $query = $em->createQuery($qStr);
        $products = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        return new JsonResponse($products);
    }
}
