<?php

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use PanelBundle\Service\UserControl;

class ModUserController extends BaseController
{
    /**
     * @Route("/panel/mod_user")
     */
   public function listAction(){
        echo 'burda';
        die;
   }
}
