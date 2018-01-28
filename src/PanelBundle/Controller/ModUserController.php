<?php

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use PanelBundle\Service\UserControl;

class ModUserController extends BaseController
{
    /**
     * @Route("/panel/mod_user")
     */
   public function listAction(){
       if(!$this->get('panel.user')->ifLogin()){
           $this->init('login');
           return $this->render('PanelBundle:Default:login.html.twig', ['var' => $this->var['message']='error.session']);
       }
       $this->init( 'user_list','/ModUser');

       $this->var['title']='User Profile';
       return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
   }
}
