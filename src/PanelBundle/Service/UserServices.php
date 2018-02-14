<?php

/**
 * Created by PhpStorm.
 * User: uveys
 * Date: 24.01.2018
 * Time: 11:13
 */
namespace PanelBundle\Service;

use Symfony\Component\HttpFoundation\Session\Session;

class UserServices
{
    private $session;
    private $em;

    public function __construct($em){
        $this->session = new Session();
        $this->em = $em;
    }
    public function ifLogin(){
        if($this->session->get('authentication_data')){
            return true;
        }else{
            return false;
        }
    }

    public function ifRoll($mod=null, $roll=null){
        $response = null;
        if(!empty($mod)){
             $response = $this->em->getRepository('ApiBundle:mods')->getMods($mod);
        }else{
            return false;
        }

        $getMods = $response[0];
        unset($response);

        if (!empty($roll)){
            $response = $this->em->getRepository('ApiBundle:ModUserRoll')->getRoll($roll, ($modId = $getMods['id']));
        }else{
            return false;
        }

        $getRoll = $response[0];
        unset($response);

        $getAuth = $this->em->getRepository('ApiBundle:ModUserAuth')->getAuth(
            array(
                'mod'   =>$modId,
                'roll'  =>$getRoll['id'],
                'group' =>$this->session->get('authentication_data')['group_id']
            )
        );

        if (!is_null($getAuth)){
            return true;
        }else{
            return false;
        }
    }
}
