<?php

namespace NoticiaBundle\Controller;

use NoticiaBundle\Utility\DetectMobileDevice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PageController extends Controller
{
    /**
     * @Route("/" , name="_inicio")
     * @Template()
     */
    public function indexAction()
    {
        /**$detectMobile = new DetectMobileDevice($_SERVER['HTTP_USER_AGENT']);
        $mobile = $detectMobile->isMobile();
        if ($mobile == 1){
            echo "MOBILE";
        }else{
            echo "DESKTOP";
        }
        exit;**/

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
