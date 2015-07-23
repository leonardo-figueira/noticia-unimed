<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Route("/" , name="_inicio")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $noticias = $em->getRepository('NoticiaBundle:Noticia')->buscaNoticiaPorData();

        return $this->render('NoticiaBundle:Page:index.html.twig', array(
            'noticias' => $noticias
        ));
    }

    /**
     * @Route("/area_restrita", name="_area_restrita")
     * @Template()
     */
    public function areaRestritaAction(){

        $em = $this->getDoctrine()->getEntityManager();

        $noticias = $em->getRepository('NoticiaBundle:Noticia')->buscaNoticiaPorData();

        return $this->render('NoticiaBundle:Page:areaRestrita.html.twig', array(
            'noticias' => $noticias
        ));

    }

    /**
     * @Route("/sobre" , name="_sobre")
     * @Template()
     */
    public function aboutAction()
    {
        return $this->render('NoticiaBundle:Page:sobre.html.twig');
    }
}
