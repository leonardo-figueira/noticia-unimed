<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NoticiaController extends Controller
{
    /**
     * @Route("/noticia/{id}" , name="_noticia")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $noticia = $em->getRepository('NoticiaBundle:Noticia')->find($id);

        if (!$noticia) {
            throw $this->createNotFoundException('Nao foi possivel localizar noticia.');
        }

        return $this->render('NoticiaBundle:Noticia:show.html.twig', array(
            'noticia'      => $noticia,
        ));
    }
}
