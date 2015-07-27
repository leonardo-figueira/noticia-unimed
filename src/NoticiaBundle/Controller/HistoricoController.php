<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NoticiaBundle\Entity\Historico;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/historico")
 */
class HistoricoController extends Controller
{
    /**
     * @Route("/", name="_historico_index")
     * @Template()
     */
    public function indexAction()
    {

        $securityContext = $this->get('security.context');
        if(!$securityContext->isGranted('ROLE_ADMIN')){
            throw new AccessDeniedException("Somente Administradores estao aptos a visualizar o historico");
        }

        $historicoRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Historico');
        $historicos = $historicoRepository->buscaTodos();

        return array('historicos' => $historicos);
    }

    /**
     * @Route("/show/{noticiaId}", name="_historico_show")
     * @Template()
     */
    public function showAction($noticiaId)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $historicoRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Historico');
        $historicos = $historicoRepository->buscarHistorcoEspecifico($noticiaId);

        return $this->render('NoticiaBundle:Historico:show.html.twig', array(
            'historicos' => $historicos
        ));
    }

}
