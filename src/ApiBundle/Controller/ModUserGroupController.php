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
}
