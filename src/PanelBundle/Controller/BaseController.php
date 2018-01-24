<?php
/**
 * Created by PhpStorm.
 * UserControl: uveys
 * Date: 4.01.2018
 * Time: 14:16
 */

namespace PanelBundle\Controller;

use PanelBundle\Service\UserServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class BaseController extends Controller
{

    public $session;
    public $var;
    public $em;
    public $userService;
    public $httpRequest = null;

    public function __construct(){
        $this->session = new Session();
        $this->var['css']   = 'theme/panel/style.css';
        $this->var['title'] = 'Biber İçerik Yönetim Sistemi';
    }

    public function init($page=null){
        $this->var['page']='PanelBundle:Default:'.$page.'.html.twig';
    }
}