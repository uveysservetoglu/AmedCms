<?php

/**
 * Created by PhpStorm.
 * User: uveys
 * Date: 24.01.2018
 * Time: 11:13
 */
namespace ApiBundle\Service;
use Symfony\Component\EventDispatcher\Tests\Service;
use Symfony\Component\HttpFoundation\Session\Session;

class FlexiServices
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

    /** User Json  */
    public function jsonUser($data){
        $json = array(
            'total' => $data['total'],
            'page'  => $data['page'],
            'rows'  => array()
        );

        foreach ($data['userList'] as $dt){
            $dt['status']= ($dt['status'] == 'a') ? $this->colorData($dt['status'],'green'):$this->colorData($dt['status'],'red');
            $json['rows'][] =array(
                'id'  => $dt['id'],
                'cell'=>[
                    $dt['id'],
                    $dt['nameSurname'],
                    $dt['email'],
                    $dt['status'],
                    $dt['username']]
            );
        }
        return ($json);
    }
    private function colorData($data, $color){
        return "<i style='color:$color' >$data<i>";
    }

}
