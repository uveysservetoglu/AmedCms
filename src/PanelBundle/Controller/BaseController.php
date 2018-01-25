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
    public $httpRequest = null;

    public function __construct(){
        $this->session = new Session();
        $this->var['title'] = 'Biber İçerik Yönetim Sistemi';
        //$this->var['css']="/theme/panel/bootstrap/dist/css/bootstrap.min.css" ;
        $this->generateCssAndJs();
        $this->panelMenu();
    }
    public function init($page=null){
        $this->var['page']='PanelBundle:Default:'.$page.'.html.twig';
    }
    private function generateCssAndJs(){

        /** JS Include **/
        $this->var['css'][]   = "/theme/panel/bootstrap/dist/css/bootstrap.min.css" ;
        $this->var['css'][]   = "/theme/panel/font-awesome/css/font-awesome.min.css";
        $this->var['css'][]   = "/theme/panel/nprogress/nprogress.css"  ;
        $this->var['css'][]   = "/theme/panel/iCheck/skins/flat/green.css" ;
        $this->var['css'][]   = "/theme/panel/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"  ;
        $this->var['css'][]   = "/theme/panel/jqvmap/dist/jqvmap.min.css"  ;
        $this->var['css'][]   = "/theme/panel/bootstrap-daterangepicker/daterangepicker.css" ;
        $this->var['css'][]   = "/theme/panel/build/css/custom.min.css";

        /** JS Include **/
        $this->var['js'][]    = "/theme/panel/jquery/dist/jquery.min.js" ;
        $this->var['js'][]    = "/theme/panel/bootstrap/dist/js/bootstrap.min.js";
        $this->var['js'][]    = "/theme/panel/fastclick/lib/fastclick.js";
        $this->var['js'][]    = "/theme/panel/nprogress/nprogress.js";
        $this->var['js'][]    = "/theme/panel/Chart.js/dist/Chart.min.js";
        $this->var['js'][]    = "/theme/panel/gauge.js/dist/gauge.min.js";
        $this->var['js'][]    = "/theme/panel/bootstrap-progressbar/bootstrap-progressbar.min.js";
        $this->var['js'][]    = "/theme/panel/iCheck/icheck.min.js";
        $this->var['js'][]    = "/theme/panel/skycons/skycons.js";
        $this->var['js'][]    = "/theme/panel/Flot/jquery.flot.js";
        $this->var['js'][]    = "/theme/panel/Flot/jquery.flot.pie.js";
        $this->var['js'][]    = "/theme/panel/Flot/jquery.flot.time.js";
        $this->var['js'][]    = "/theme/panel/Flot/jquery.flot.stack.js";
        $this->var['js'][]    = "/theme/panel/Flot/jquery.flot.resize.js";
        $this->var['js'][]    = "/theme/panel/flot.orderbars/js/jquery.flot.orderBars.js";
        $this->var['js'][]    = "/theme/panel/flot-spline/js/jquery.flot.spline.min.js";
        $this->var['js'][]    = "/theme/panel/flot.curvedlines/curvedLines.js";
        $this->var['js'][]    = "/theme/panel/DateJS/build/date.js";
        $this->var['js'][]    = "/theme/panel/jqvmap/dist/maps/jquery.vmap.world.js";
        $this->var['js'][]    = "/theme/panel/jqvmap/examples/js/jquery.vmap.sampledata.js";
        $this->var['js'][]    = "/theme/panel/moment/min/moment.min.js";
        $this->var['js'][]    = "/theme/panel/bootstrap-daterangepicker/daterangepicker.js";
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

    public function ifLoginBase(){
        if($this->get('panel.user')->ifLogin() == false){
            return new RedirectResponse($this->generateUrl('panel.login'));
        }
    }
}