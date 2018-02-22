<?php
/**
 * Created by PhpStorm.
 * UserControl: uveys
 * Date: 4.01.2018
 * Time: 14:16
 */

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class BaseController extends Controller
{

    public $session;
    public $var;
    public $em;
    public $dc;
    public $local;
    public $langService;
    public $userService;
    public $currentPage;
    public $currentDirectory;
    public $httpRequest = null;

    public function  __construct(){
        $this->session = new Session();
    }

    public function getRepo($repo){
        return  $this->getDoctrine()->getRepository($repo);
    }
    public function crudData($data){
        if($data['action']=='insert'){
            $this->getDoctrine()->getManager()->persist($data['data']);
            $this->getDoctrine()->getManager()->flush();
        }else if($data['action']=='update'){
            $this->getDoctrine()->getManager()->flush();
        }else if ($data['action']=='delete'){
            $this->getDoctrine()->getManager()->remove($data['data']);
            $this->getDoctrine()->getManager()->flush();
        }
        return 'success';
    }

}