<?php

namespace PanelBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends BaseController
{
    /**
     * @Route("/panel/giris")
     */
    public function girisAction(Request $request=null)
    {
        if($this->get('panel.user')->ifLogin()){
            return new RedirectResponse($this->generateUrl('panel.mod_user'));
        }
        $this->init('giris');
        $this->httpRequest = $request;
        $xss = $this->generateXssCode();
        $this->var['xss'] = $xss;
        return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
    }
    /**
     * @Route("/panel/giris/control")
     */
    public function controlAction(Request $request=null){
        $this->init('giris');
        $username           = $request ->request->get('username');
        $password           = $request ->request->get('password');
        $xss                = $request ->request->get('xss');
        $this->var['xss']   = $this->session->get('_xss');
        if($xss != null)
        {
            if ($this->isValidXss($xss))
            {
                $auth=$this->processLogin($username,$password);
                if($auth == 'success.session')
                {
                    /** @var ModUserAuthRepository $userRepo */
                    $repo    =  $this->getDoctrine()->getRepository('PanelBundle:ModUser');
                    $user = $repo->getUser($username);
                    $member_details = array(
                        'id'            => $user[0]['id'],
                        'username'      => $user[0]['username'],
                        'email'         => $user[0]['email'],
                        'name_surname'  => $user[0]['nameSurname'],
                        'status'        => $user[0]['status']
                    );
                    $this->session->set('authentication_data', $member_details);
                    $this->var['message']='success';
                    return new RedirectResponse($this->generateUrl('panel.mod_user'));
                }else{
                    $this->var['message']=$auth;
                }
            }else{
                $this->var['message'] = 'error.xss';
            }
        }else{
            $this->var['message'] = 'error.xss';
        }
        return $this->render('PanelBundle:Default:index.html.twig', ['var' => $this->var]);
    }

    private function processLogin($username,$password){
        if(($username != null or !empty($username)) and ($username != null or !empty($username))){
            /** @var mod_userRepository $repo */
            $this->model       = new  \stdClass();
            $this->model->user = $this->getDoctrine()->getRepository('PanelBundle:ModUser');
            $repo       =   $this->model->user;
            $response   =   $repo->getUser($username);
            $msg=null;
            if (!empty($response))
            {
                foreach ($response as $res)
                {
                    $msg = ($res['password'] == sha1($password)) ? 'success.session':'error.password';
                }
            }else{
                $msg = 'error.username';
            }
        }else{
            $msg = 'error.null';
        }
        return $msg;
    }
    public function generateXssCode(){
        if(!isset($this->session)){
            $this->session = $this->container->get('session');
        }
        $currentXssCode = $this->session->get('_xss');
        $currentXssTime = $this->session->get('_xss_timestamp');

        $ip = $this->httpRequest === null ? '127.0.0.1' : $this->httpRequest->getClientIp();
        $now = microtime(true);
        if (!$currentXssTime || !$currentXssCode) {
            $currentXssCode = md5($ip . $now);
            $this->session->set('_xss', $currentXssCode);
            $this->session->set('_xss_timestamp', $now);
            return $currentXssCode;
        }

        $timeDifference = $now - $currentXssTime;
        /**
         * 120 seconds * 5 = 600 seconds = 10 minutes
         */
        if ($timeDifference > 600) {
            /** If time difference since last request is more than 10 minutes change security code alongside with timestamp. */
            $now = microtime(true);
            $this->session->set('_xss', md5($ip . $now));
            $this->session->set('_xss_timestamp', $now);
        }
        else{
            /** If the last request happenned earliear than 10 minutes just update timestamp and increase life span of hash code. */
            $this->session->set('_xss_timestamp', $now);
        }
        return $currentXssCode;
    }
    public function isValidXss(string $xssCode){
        $savedXssCode = $this->session->get('_xss');
        if($savedXssCode === $xssCode){
            return true;
        }
        return false;
    }
}
