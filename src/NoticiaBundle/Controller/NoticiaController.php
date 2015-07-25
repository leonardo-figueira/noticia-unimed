<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NoticiaBundle\Entity\Noticia;
use NoticiaBundle\Form\NoticiaType;
/**
 * @Route("/noticia")
 */
class NoticiaController extends Controller
{

    /**
     * @Route("/", name="_noticia_index")
     * @Template()
     */
    public function indexAction(){

        $em = $this->getDoctrine()->getEntityManager();

        $noticias = $em->getRepository('NoticiaBundle:Noticia')->buscaNoticiaPorData();

        return $this->render('NoticiaBundle:Noticia:index.html.twig', array(
            'noticias' => $noticias
        ));

    }

    /**
     * @Route("/show/{id}" , name="_noticia_show")
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
     * @Route("/cadastrar", name="_noticia_cadastrar")
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

                return $this->redirectToRoute('_area_restrita');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array("form" => $form->createView());
    }

    /**
     * @Route("/excluir/{noticia}", name="_excluir_noticia")
     * @Template()
     */
    public function excluirAction(Noticia $noticia) {

        $request = $this->getRequest();

        if ($request->isMethod('POST')) {
            try {

                $noticiaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Noticia');
                $noticiaRepository->excluir($noticia);

                $this->addFlash('success', 'Raia ' . $noticia->getTitulo() . ' excluída com sucesso');

                return $this->redirectToRoute('_area_restrita');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array('noticia' => $noticia);
    }

    /**
     * @Route("/alterar/{noticia}", name="_alterar_noticia")
     * @Template()
     */
    public function alterarAction(Noticia $noticia) {

        $form = $this->createForm(new NoticiaType(), $noticia);
        $request = $this->getRequest();
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $noticia = $form->getData();

                $noticiaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Noticia');
                $noticiaRepository->alterar($noticia);

                $this->addFlash('success', 'Noticia ' . $noticia->getId() . ' alterada com sucesso');

                return $this->redirectToRoute('_area_restrita');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array("form" => $form->createView());
    }
}
