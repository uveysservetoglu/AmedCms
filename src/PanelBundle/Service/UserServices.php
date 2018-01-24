<?php

/**
 * Created by PhpStorm.
 * User: uveys
 * Date: 24.01.2018
 * Time: 11:13
 */
namespace PanelBundle\Service;
use Symfony\Component\EventDispatcher\Tests\Service;
use Symfony\Component\HttpFoundation\Session\Session;

class UserServices
{
    private $session;
    public function __construct(){
        $this->session = new Session();
    }
    public function ifLogin(){
        if($this->session->get('authentication_data')){
            return true;
        }else{
            return false;
        }
    }
}
