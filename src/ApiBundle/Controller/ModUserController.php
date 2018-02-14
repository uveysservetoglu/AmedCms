<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\ModUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ModUserController extends Controller
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
        $repo = $this -> getDoctrine()
                      -> getRepository('ApiBundle:ModUser');
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
        $repo = $this -> getDoctrine()
            -> getRepository('ApiBundle:ModUser')
            -> getUser($request->get('username')[0]);
        $status='';
        if(!empty($repo)){
           $status ='false';
        }else{
            $status ='true';
        }
        return new JsonResponse($status);
    }

    public function getGroupAction(){
        $repo = $this -> getDoctrine()
            -> getRepository('ApiBundle:ModUserGroup')
            ->getGroup();
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

        $em = $this->getDoctrine()->getManager();

        $repo = $this -> getDoctrine()
            -> getRepository('ApiBundle:ModUser');

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
        $em->persist($user);

        $em->flush();

        return new JsonResponse('success.insert');
    }

    public function forEditUserAction(){
        if(!$this->get('panel.user')->ifRoll('ModUser','edit')){
            return new JsonResponse('not.roll');
        }
        $request = Request::createFromGlobals();
        $repo = $this -> getDoctrine()
            -> getRepository('ApiBundle:ModUser')
            ->getUser((int)$request->get('id')[0]);
        return new JsonResponse($repo);
    }
}
