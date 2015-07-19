<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NoticiaBundle\Entity\Comentario;
use NoticiaBundle\Form\ComentarioType;

class ComentarioController extends Controller
{
    public function newAction($noticia_id)
    {
        $noticia = $this->getNoticia($noticia_id);

        $comentario = new comentario();
        $comentario->setNoticia($noticia);
        $form   = $this->createForm(new comentarioType(), $comentario);

        return $this->render('NoticiaBundle:Comentario:form.html.twig', array(
            'comentario' => $comentario,
            'form'   => $form->createView()
        ));
    }

    /**
     * @Route("/comentario/{noticia_id}" , name="_comentario")
     * @Template()
     */
    public function cadastrarAction($noticia_id)
    {
        $noticia = $this->getnoticia($noticia_id);

        $comentario  = new Comentario();
        $comentario->setNoticia($noticia);
        $request = $this->getRequest();
        $form = $this->createForm(new ComentarioType(), $comentario);
        $form->handleRequest($request);

        if ($form->isValid()) {

            try {
                $comentario = $form->getData();

                $comentarioRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Comentario');
                $comentarioRepository->adicionar($comentario);

                $this->addFlash('success', 'Comentario adicionado com sucesso');

                return $this->redirect($this->generateUrl('_noticia', array(
                        'id' => $comentario->getNoticia()->getId())) .
                    '#comentario-' . $comentario->getId()
                );
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return $this->render('NoticiaBundle:Comentario:cadastrar.html.twig', array(
            'comentario' => $comentario,
            'form'    => $form->createView()
        ));
    }

    private function getNoticia($noticia_id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $noticia = $em->getRepository('NoticiaBundle:Noticia')->find($noticia_id);

        if (!$noticia) {
            throw $this->createNotFoundException('Noticia nao encontrada');
        }

        return $noticia;
    }
}
