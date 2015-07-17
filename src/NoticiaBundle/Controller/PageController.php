<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Route("/" , name="inicio")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('NoticiaBundle:Page:index.html.twig');
    }

    /**
     * @Route("/sobre" , name="sobre")
     * @Template()
     */
    public function aboutAction()
    {
        return $this->render('NoticiaBundle:Page:sobre.html.twig');
    }
}
