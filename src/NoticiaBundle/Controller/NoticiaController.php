<?php

namespace NoticiaBundle\Controller;

use NoticiaBundle\Entity\Noticia;
use NoticiaBundle\Form\NoticiaType;
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

        $comentarios = $em->getRepository('NoticiaBundle:Comentario')->buscarComentariosPorNoticia($noticia->getId());

        return $this->render('NoticiaBundle:Noticia:show.html.twig', array(
            'noticia'      => $noticia,
            'comentarios'  => $comentarios
        ));
    }

    /**
     * @Route("/cadastrar_noticia", name="_cadastrar_noticia")
     * @Template()
     */
    public function cadastrarAction() {
        $noticia = new Noticia();
        $request = $this->getRequest();
        $form = $this->createForm(new NoticiaType(), $noticia);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $noticia = $form->getData();

                $noticiaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Noticia');
                $noticiaRepository->adicionar($noticia);

                $this->addFlash('success', 'Noticia cadastrada com sucesso');

                return $this->redirectToRoute('_imagem_raias_index');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array("form" => $form->createView());
    }

}
