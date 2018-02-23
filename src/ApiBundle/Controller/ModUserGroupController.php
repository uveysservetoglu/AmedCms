<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\ModUserGroup;
use ApiBundle\Repository\ModUserGroupRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ModUserGroupController extends BaseController
{
    public function listAction()
    {
        if(!$this->get('panel.user')->ifRoll('ModUserGroup','list')){
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
        /** @var ModUserGroupRepository $repo */

        $repo =$this->getRepo('ApiBundle:ModUserGroup');
        $data = array(
            'data' => $repo->getUserGroupList($param),
            'page'     => $param['page'],
            'total'    => count($repo->findAll())
        );
        return new JsonResponse(
            $this->get('panel.flexi')->jsonUserGroup($data)
        );
    }

    public function insertAction(){
        if(!$this->get('panel.user')->ifRoll('ModUserGroup','insert')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        if (empty($request->request)){
            return new JsonResponse('null.input');
        }
        $data = $request->request;
        $group = new ModUserGroup();
        $data->get('groupName');
        $group->setName($data->get('groupName'));
        $group->setUserId($this->session->get('authentication_data')['id']);
        $action = array('action'=>'insert', 'data' => $group);
        $this->crudData($action);
        return new JsonResponse('success.insert');
    }

    public function loadEditUserGroupAction(){
        if(!$this->get('panel.user')->ifLogin()){
            return new RedirectResponse($this->generateUrl('panel.login'));
        }
        $request = Request::createFromGlobals();
        $repo = $this->getRepo('ApiBundle:ModUserGroup')->findOneBy([
            'id'=>$request->get('id')[0]
        ]);
        $repo->getName();
        return new JsonResponse(array('id'=>$repo->getId(), 'name'=>$repo->getName()));
    }

    public function editAction(){
        if(!$this->get('panel.user')->ifRoll('ModUserGroup','edit')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $editUser = $request->request;

        $repo = $this->getRepo('ApiBundle:ModUserGroup')->findOneBy([
            'id'=>$request->get('id')
        ]);
        if(!$repo){
            return new JsonResponse('not.id');
        }
        $repo->setName($editUser->get('name'));
        $repo->setUserId($this->session->get('authentication_data')['id']);

        $action = array('action'=>'update', 'data' => $repo);
        $this->crudData($action);
        return new JsonResponse('success.update');
    }

    public function deleteAction(){
        if(!$this->get('panel.user')->ifRoll('ModUserGroup','delete')){
            return new JsonResponse('not.roll');
        }

        $request = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $req = $request->get('sil');
        foreach ($req as $id){
            $userRepo = $em->getRepository('ApiBundle:ModUserGroup')->find($id);
            $action = array('action'=>'delete', 'data' => $userRepo);
            $this->crudData($action);
        }

        return new JsonResponse('success.delete');

    }

}
