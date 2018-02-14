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
           return new RedirectResponse($this->generateUrl('panel.login'));
       }

       $this->init( 'userList','ModUser');
       $this->var['title']=$this->var['lang']['grid'][14];

       if(!$this->get('panel.user')->ifRoll('ModUser','list')){
           $this->var['error']= array(
               'status'  => true,
               'message' => $this->var['lang']['not_roll']
           );
           return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
       }
       return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
   }
}
