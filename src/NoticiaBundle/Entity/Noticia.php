<?php

namespace NoticiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Noticia
 *
 * @ORM\Table(name="NOTICIA")
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


    /**
     * @ORM\OneToMany(targetEntity="Comentario", mappedBy="noticia")
     */
    private $comentarios = array();

    public function __construct()
    {
        $this->comments = new ArrayCollection();

        $this->setDtCadastro(new \DateTime());
        $this->setDtAtualizacao(new \DateTime());
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime")
     */
    private $dtCadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_atualizacao", type="datetime")
     */
    private $dtAtualizacao;

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
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return Noticia
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;

        return $this;
    }

    /**
     * Get dtCadastro
     *
     * @return \DateTime 
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * Set dtAtualizacao
     *
     * @param \DateTime $dtAtualizacao
     * @return Noticia
     */
    public function setDtAtualizacao($dtAtualizacao)
    {
        $this->dtAtualizacao = $dtAtualizacao;

        return $this;
    }

    /**
     * Get dtAtualizacao
     *
     * @return \DateTime 
     */
    public function getdtAtualizacao()
    {
        return $this->dtAtualizacao;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setDtAtualizacaoValue()
    {
        $this->setDtAtualizacao(new \DateTime());
    }

    /**
     * Remove comentarios
     *
     * @param \NoticiaBundle\Entity\Comentario $comentarios
     */
    public function removeComentario(\NoticiaBundle\Entity\Comentario $comentarios)
    {
        $this->comentarios->removeElement($comentarios);
    }

    public function __toString()
    {
        return $this->getTitulo();
    }

}
