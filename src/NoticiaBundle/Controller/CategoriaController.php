<?php

namespace NoticiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NoticiaBundle\Entity\Categoria;
use NoticiaBundle\Form\CategoriaType;

/**
 * @Route("/categoria")
 */
class CategoriaController extends Controller
{

    /**
     * @Route("/", name="_categoria_index")
     * @Template()
     */
    public function indexAction(){

        $categoriaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Categoria');
        $categorias = $categoriaRepository->findAll();

        return array('categorias' => $categorias);

    }

    /**
     * @Route("/cadastrar", name="_categoria_cadastrar")
     * @Template()
     */
    public function cadastrarAction() {
        $categoria = new Categoria();
        $request = $this->getRequest();
        $form = $this->createForm(new CategoriaType(), $categoria);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $categoria = $form->getData();

                $categoriaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Categoria');
                $categoriaRepository->adicionar($categoria);

                $this->addFlash('success', 'Categoria cadastrada com sucesso');

                return $this->redirectToRoute('_categoria_index');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array("form" => $form->createView());
    }

    /**
     * @Route("/excluir/{categoria}", name="_categoria_excluir")
     * @Template()
     */
    public function excluirAction(Categoria $categoria) {

        $request = $this->getRequest();

        if ($request->isMethod('POST')) {
            try {

                $categoriaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Categoria');
                $categoriaRepository->excluir($categoria);

                $this->addFlash('success', 'Categoria excluida com sucesso');

                return $this->redirectToRoute('_categoria_index');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array('categoria' => $categoria);
    }

    /**
     * @Route("/alterar/{categoria}", name="_categoria_alterar")
     * @Template()
     */
    public function alterarAction(Categoria $categoria) {

        $form = $this->createForm(new CategoriaType(), $categoria);
        $request = $this->getRequest();
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $categoria = $form->getData();

                $categoriaRepository = $this->getDoctrine()->getRepository('NoticiaBundle:Categoria');
                $categoriaRepository->alterar($categoria);

                $this->addFlash('success', 'Cateogira alterada com sucesso');

                return $this->redirectToRoute('_categoria_index');
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }

        return array("form" => $form->createView());
    }

}
