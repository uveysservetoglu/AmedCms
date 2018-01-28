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
use Symfony\Component\HttpFoundation\RedirectResponse;


class BaseController extends Controller
{

    public $session;
    public $var;
    public $em;
    public $userService;
    public $currentPage;
    public $currentDirectory;
    public $httpRequest = null;

    public function __construct(){
        $this->session = new Session();
        $this->var['title'] = 'Biber İçerik Yönetim Sistemi';
        //$this->var['css']="/theme/panel/bootstrap/dist/css/bootstrap.min.css" ;
        $this->panelMenu();
    }
    public function init($page=null,$directory = null){
        $this->currentPage = $page;
        $this->currentDirectory = $directory;
        $this->generateCssAndJs();

        $this->var['page'] ='@Panel/Default'.$directory.'/'.$page.'.html.twig';
        //$this->var['page']='PanelBundle:Default:'.$page.'.html.twig';
    }
    private function generateCssAndJs(){


        /** JS Include **/
        $this->var['css'][]   = "/theme/panel/bootstrap/dist/css/bootstrap.min.css" ;
        $this->var['css'][]   = "/theme/panel/font-awesome/css/font-awesome.min.css";
        $this->var['css'][]   = "/theme/panel/build/css/custom.min.css";
        $this->var['css'][]   = "/theme/panel/style.css";

        /** JS Include **/
        $this->var['js'][]    = "/theme/panel/jquery/dist/jquery.min.js" ;
        $this->var['js'][]    = "/theme/panel/bootstrap/dist/js/bootstrap.min.js";
        switch ($this->currentPage){
            case 'user_list':
                /*
                $this->var['js'][]    = "/theme/panel/datatables.net/js/jquery.dataTables.min.js" ;
                $this->var['js'][]    = "/theme/panel/datatables.net-bs/js/dataTables.bootstrap.min.js" ;
                $this->var['js'][]    = "/theme/panel/datatables.net-buttons/js/dataTables.buttons.min.js" ;
                $this->var['js'][]    = "/theme/panel/datatables.net-buttons-bs/js/buttons.bootstrap.min.js" ;
                $this->var['js'][]    = "/theme/panel/datatables.net-buttons/js/buttons.flash.min.js" ;
                $this->var['js'][]    = "/theme/panel/datatables.net-buttons/js/buttons.html5.min.js" ;
                $this->var['js'][]    = "/theme/panel/datatables.net-buttons/js/buttons.print.min.js" ;
                */
                $this->var['css'][]    = "/theme/panel/flexigrid/css/flexigrid/flexigrid.css" ;
                $this->var['js'][]    = "/theme/panel/flexigrid/flexigrid.js" ;

                break;
        }
        $this->var['js'][]    = "/theme/panel/build/js/custom.min.js";

        $this->scriptSrc($this->var['js']);
        $this->linkStyleSheet($this->var['css']);
    }
    private function linkStyleSheet($cssRoute){
        $link = null;
        foreach ($cssRoute as $css){
            $link = $link . " <link rel='stylesheet' href='".$css."' >";
        }
        $this->var['css'] = $link;
    }
    private function scriptSrc($jsRoute){
        $src = null;
        foreach ($jsRoute as $js){
            $src = $src . "<script src='".$js."'></script> ";
        }
        $this->var['js'] = $src;
    }

    private function panelMenu(){
        $menu =
            array(
                array(
                    'name'  => 'User Control',
                    'icon'  => 'fa fa-user',
                    'item'  => array(
                        0   => array('href'=>'mod_user/user_list','name'=>'User Lists'),
                        1   => array('href'=>'mod_user/user_list','name'=>'User Lists'),
                        2   => array('href'=>'mod_user/member_setting','name'=>'Member Setting'),
                        3   => array('href'=>'mod_user/user_group','name'=>'User Group'),
                        4   => array('href'=>'mod_user/user_roll','name'=>'User Roll')
                    )
                ),
                array(
                    'name'  => 'Content Management',
                    'icon'  => 'fa fa-connectdevelop',
                    'item'  => array(
                        0   => array('href'=>'mod_user/user_list','name'=>'User Listse'),
                        1   => array('href'=>'mod_user/user_list','name'=>'User Listse'),
                        2   => array('href'=>'mod_user/member_setting','name'=>'Member Settinge'),
                        3   => array('href'=>'mod_user/user_group','name'=>'User Groupe'),
                        4   => array('href'=>'mod_user/user_roll','name'=>'User Rolle')
                    )
                )
            );

        $this->var['menu'] = $menu;
    }
}