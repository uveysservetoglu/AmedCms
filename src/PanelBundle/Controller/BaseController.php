<?php
/**
 * Created by PhpStorm.
 * UserControl: uveys
 * Date: 4.01.2018
 * Time: 14:16
 */

namespace PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class BaseController extends Controller
{

    public $session;
    public $var;
    public $em;
    public $local;
    public $langService;
    public $userService;
    public $currentPage;
    public $currentDirectory;
    public $httpRequest = null;

    public function __construct(){
        $this->session = new Session();
        $this->var['title'] = 'Biber İçerik Yönetim Sistemi';
    }
    public function init($page=null,$mod = null){
        $this->var['error']= array(
            'status'  => false,
            'message' => null
        );
        $this->currentPage = $page;
        $this->currentDirectory = $mod;
        $this->var['locale'] = $this->get('translator')->getLocale();
        $directory =null;
        if($mod != null ){
            $directory = '/'.$mod;
        }

        $lang = $this->get('panel.lang')->lang($mod);
        $this->var['lang'] = $lang[$mod][$this->var['locale']];

        $this->panelMenu();
        $this->generateCssAndJs();
        $this->var['page'] ='@Panel/Default'.$directory.'/'.$page.'.html.twig';
    }

    private function generateCssAndJs(){
        /** JS Include **/
        $this->var['css'][]   = "/web/theme/panel/bootstrap/dist/css/bootstrap.min.css" ;
        $this->var['css'][]   = "/web/theme/panel/font-awesome/css/font-awesome.min.css";
        $this->var['css'][]   = "/web/theme/panel/build/css/custom.min.css";
        $this->var['css'][]   = "/web/theme/panel/style.css";

        /** JS Include **/
        $this->var['js'][]    = "/web/theme/panel/jquery/dist/jquery.min.js" ;
        $this->var['js'][]    = "/web/theme/panel/bootstrap/dist/js/bootstrap.min.js";
        $this->var['js'][]    = "/web/theme/panel/bootstrap/dist/js/bootstrap-confirmation.min.js";

        switch ($this->currentPage){
            case 'userList':
                $this->var['css'][]    = "/web/theme/panel/flexigrid/css/flexigrid/flexigrid.css" ;
                $this->var['css'][]    = "/web/theme/panel/toastr/toastr.min.css" ;

                $this->var['js'][]    = "/web/theme/panel/flexigrid/flexigrid.js" ;
                $this->var['js'][]    = "/web/theme/panel/toastr/toastr.min.js" ;
                break;
            case 'userGroupList';
                $this->var['css'][]    = "/web/theme/panel/flexigrid/css/flexigrid/flexigrid.css" ;
                $this->var['css'][]    = "/web/theme/panel/toastr/toastr.min.css" ;

                $this->var['js'][]    = "/web/theme/panel/flexigrid/flexigrid.js" ;
                $this->var['js'][]    = "/web/theme/panel/toastr/toastr.min.js" ;
                break;
        }
        $this->var['js'][]    = "/web/theme/panel/build/js/custom.min.js";

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
        $menu =array(
            'tr' => array(
                array(
                    'name'  => 'Üyelik Işlemleri',
                    'icon'  => 'fa fa-user',
                    'item'  => array(
                        1   => array('href'=>'panel/mod_user/user_list','name'=>'Üye Listesi'),
                        3   => array('href'=>'panel/mod_user_group/group_list','name'=>'Üye Grupları'),
                        4   => array('href'=>'panel/mod_user/user_roll','name'=>'Üye Yetkileri')
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
            )
        );

        $this->var['menu'] = $menu[$this->var['locale']];
    }
}