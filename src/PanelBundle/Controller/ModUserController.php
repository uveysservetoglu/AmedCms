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
   public function listAction(Request $request){

       if(!$this->get('panel.user')->ifLogin()){
           $this->init('login');
           return new RedirectResponse($this->generateUrl('panel.login'));
       }
       $this->var['locale']=$request->getLocale();

       $this->init( 'userList','ModUser');
       $this->var['title']='User Profile';
       return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
   }
}
