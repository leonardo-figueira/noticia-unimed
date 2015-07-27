<?php

namespace NoticiaBundle\Controller;

use NoticiaBundle\Utility\DetectMobileDevice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    /**
     * @Route("/" , name="_inicio")
     * @Template()
     */
    public function indexAction()
    {
        $detectMobile = new DetectMobileDevice($_SERVER['HTTP_USER_AGENT']);

        $mobile = $detectMobile->isMobile();

        $em = $this->getDoctrine()->getEntityManager();

        if ($mobile == 1){
            $noticias = $em->getRepository('NoticiaBundle:Noticia')->buscaNoticiaMobile();
        }else{
            $noticias = $em->getRepository('NoticiaBundle:Noticia')->buscaNoticiaWeb();
        }

        return $this->render('NoticiaBundle:Page:index.html.twig', array(
            'noticias' => $noticias
        ));
    }

    /**
     * @Route("/filtro_categoria/{categoriaId}" , name="_filtro_inicio")
     * @Template()
     */
    public function filtroAction($categoriaId)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $noticias = $em->getRepository('NoticiaBundle:Noticia')->buscarPorFiltro($categoriaId);

        return $this->render('NoticiaBundle:Page:index.html.twig', array(
            'noticias' => $noticias
        ));
    }

    /**
     * @Route("/area_restrita", name="_area_restrita")
     * @Template()
     */
    public function areaRestritaAction(){

        $detectMobile = new DetectMobileDevice($_SERVER['HTTP_USER_AGENT']);
        $mobile = $detectMobile->isMobile();
        if ($mobile == 1){
            throw exception("Area restrita disponivel apenas na versao web");
        }

        $securityContext = $this->get('security.context');
        if(!$securityContext->isGranted('ROLE_USER')){
            throw new AccessDeniedException("Realize o login para poder acessar");
        }

        $em = $this->getDoctrine()->getEntityManager();

        return $this->render('NoticiaBundle:Page:areaRestrita.html.twig');

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
