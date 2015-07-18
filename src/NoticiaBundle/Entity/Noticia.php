<?php

namespace NoticiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Noticia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NoticiaBundle\Repository\NoticiaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Noticia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=255)
     */
    private $autor;

    /**
     * @var string
     *
     * @ORM\Column(name="noticia", type="string", length=255)
     */
    private $noticia;

    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="string", length=255)
     */
    private $imagem;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;


    private $comentarios = array();


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="criado", type="datetime")
     */
    private $criado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="atualizado", type="datetime")
     */
    private $atualizado;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Noticia
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Noticia
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set noticia
     *
     * @param string $noticia
     * @return Noticia
     */
    public function setNoticia($noticia)
    {
        $this->noticia = $noticia;

        return $this;
    }

    /**
     * Get noticia
     *
     * @return string 
     */
    public function getNoticia()
    {
        return $this->noticia;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     * @return Noticia
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get imagem
     *
     * @return string 
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Noticia
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function addComentario(Comentario $comentario)
    {
        $this->comentarios[] = $comentario;
    }

    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set criado
     *
     * @param \DateTime $criado
     * @return Noticia
     */
    public function setCriado($criado)
    {
        $this->criado = $criado;

        return $this;
    }

    /**
     * Get criado
     *
     * @return \DateTime 
     */
    public function getCriado()
    {
        return $this->criado;
    }

    /**
     * Set atualizado
     *
     * @param \DateTime $atualizado
     * @return Noticia
     */
    public function setAtualizado($atualizado)
    {
        $this->atualizado = $atualizado;

        return $this;
    }

    /**
     * Get atualizado
     *
     * @return \DateTime 
     */
    public function getAtualizado()
    {
        return $this->atualizado;
    }

    public function __construct()
    {
        $this->setCriado(new \DateTime());
        $this->setAtualizado(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function setAtualizadoValue()
    {
        $this->setAtualizado(new \DateTime());
    }
}
