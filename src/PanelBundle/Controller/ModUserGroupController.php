<?php

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ModUserGroupController extends BaseController
{
    public function listAction(){
        if(!$this->get('panel.user')->ifLogin()){
            return new RedirectResponse($this->generateUrl('panel.login'));
        }
        $this->init( 'userGroupList','ModUserGroup');
        $this->var['title']=$this->var['lang']['admin'][10];

        if(!$this->get('panel.user')->ifRoll('ModUserGroup','list')){
            $this->var['error']= array(
                'status'  => true,
                'message' => $this->var['lang']['genel']['tr']['not_roll']
            );
            return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
        }
        return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
    }
}
