<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\ModUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class ModUserController extends BaseController
{
    /**
     * @Route("/api/mod_user/user_list")
     */
    public function listAction()
    {
        if(!$this->get('panel.user')->ifRoll('ModUser','list')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $param   = array(
            'page'          => $request->get('page')      != null ?  $request->get('page')  : 1,
            'sortname'      => $request->get('sortname')  != null ?  $request->get('sortname')  : 'id',
            'sortorder'     => $request->get('sortorder') != null ?  $request->get('sortorder') : 'asc',
            'query'         => $request->get('query'),
            'qtype'         => $request->get('qtype'),
            'rp'            => $request->get('rp'),
            'offset'        => $request->get('page') != 1 ? (($request->get('page')-1) * $request->get('rp')) : NULL
        );
        /** @var ModUser $userRepo */
        $repo =$this->getRepo('ApiBundle:ModUser');
        $data = array(
            'userList' => $repo->getUserList($param),
            'page'     => $param['page'],
            'total'    => count($repo->findAll())
        );
        return new JsonResponse(
            $this->get('panel.flexi')->jsonUser($data)
        );
    }

    public function checkUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','list')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $repo = $this ->getRepo('ApiBundle:ModUser')->getUser($request->get('username')[0]);
        $status='';
        if(!empty($repo)){
           $status ='false';
        }else{
            $status ='true';
        }
        return new JsonResponse($status);
    }

    public function getGroupAction(){
        if(!$this->get('panel.user')->ifRoll('ModUserGroup','list')){
            return new JsonResponse('not.roll');
        }
        $repo = $this ->getRepo('ApiBundle:ModUserGroup')->getGroup();
        return new JsonResponse($repo);
    }

    public function insertUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','insert')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        if (empty($request->request)){
            return new JsonResponse('null.input');
        }
        $repo = $this -> getRepo('ApiBundle:ModUser');
        if($repo->getUser($request->request->get('username'))){
            return new JsonResponse('not.username');
        }
        $data = $request->request;
        $user = new ModUser();
        $user->setNameSurname($data->get('nameSurname'));
        $user->setMobil($data->get('mobil'));
        $from =  new \DateTime( $data->get('birthday'));
        $user->setBirthday($from);
        $user->setEmail($data->get('email'));
        $user->setAddress($data->get('address'));
        $user->setJob($data->get('job'));
        $user->setWebsite($data->get('website'));
        $user->setUsername($data->get('username'));
        $user->setPassword($data->get('password'));
        $user->setGroupId($data->get('group'));
        $user->setStatus('a');
        $user->setIp($request->server->get('REMOTE_ADDR'));
        $action = array('action'=>'insert', 'data' => $user);
        $this->crudData($action);
        return new JsonResponse('success.insert');
    }

    public function forEditUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','edit')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $repo = $this->getRepo('ApiBundle:ModUser')->getUser((int)$request->get('id')[0]);
        return new JsonResponse($repo);
    }

    public function editUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','edit')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $editUser = $request->request;
        $userRepo = $this->getRepo('ApiBundle:ModUser')->find($editUser->get('userId'));

        if(!$userRepo){
            return new JsonResponse('not.userId');
        }
        $userRepo->setNameSurname($editUser->get('nameSurname'));
        $userRepo->setNameSurname($editUser->get('nameSurname'));
        $userRepo->setMobil($editUser->get('mobil'));
        $from =  new \DateTime( $editUser->get('birthday'));
        $userRepo->setBirthday($from);
        $userRepo->setEmail($editUser->get('email'));
        $userRepo->setAddress($editUser->get('address'));
        $userRepo->setJob($editUser->get('job'));
        $userRepo->setWebsite($editUser->get('website'));
        $userRepo->setGroupId($editUser->get('group'));
        $userRepo->setIp($request->server->get('REMOTE_ADDR'));
        $action = array('action'=>'update', 'data' => $userRepo);
        $this->crudData($action);
        return new JsonResponse('success.insert');
    }

    public function deleteUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','delete')){
            return new JsonResponse('not.roll');
        }

        $request = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $req = $request->get('sil');
        foreach ($req as $id){
            $userRepo = $em->getRepository('ApiBundle:ModUser')->find($id);
            $action = array('action'=>'delete', 'data' => $userRepo);
            $this->crudData($action);
        }

        return new JsonResponse('success.delete');

    }

    public function statusUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','edit')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $editUser = $request->request;

        $getId = $editUser->get('id');
        foreach ($getId as $id){
            $userRepo = $this->getRepo('ApiBundle:ModUser')->find($id);
            if (!$userRepo){
                return new JsonResponse('not.userId');
            }
            $userRepo->setStatus($editUser->get('status')[0]);
            $action = array('action' => 'update', 'data' => $userRepo);
            $this->crudData($action);
        }
        return new JsonResponse('success.active');
    }
}
