<?php
/**
 * Created by PhpStorm.
 * User: uveys
 * Date: 2.02.2018
 * Time: 14:02
 */

namespace ApiBundle\Service;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Kernel;

class LocaleService
{

    private $container;

    public function __construct(Kernel $kernel)
    {
        $this->container = $kernel->getContainer();
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $languages   = $this->container->getParameter('languages');
        $site        = $this->container->getParameter('site');
        $pathInfo    = $event->getRequest()->getPathInfo();
        $locale      = $event->getRequest()->getDefaultLocale();
        $uri         = $event->getRequest()->getUri();
        $httpReq     = explode('//', $uri);
        $pathInfo    = trim($pathInfo, '/');
        $pathTrim    = explode('/' , $pathInfo);

        if($languages[array_search($pathTrim[0], $languages)] !== $pathTrim[0]){
            $web = explode('/', $pathInfo);
            if($web[0] !='theme')
            {
                $uri = $httpReq[0] . '//' . $site . '/' . $locale . '/' . $pathInfo;
                $src = '<script>';
                $src .= 'window.location = "' . $uri . '";';
                $src .= '</script>';
                echo $src;
                die;
            }
        }
    }


}