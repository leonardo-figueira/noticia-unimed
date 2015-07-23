<?php

namespace NoticiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categoria
 *
 * @ORM\Table(name="CATEGORIA")
 * @ORM\Entity(repositoryClass="NoticiaBundle\Repository\CategoriaRepository")
 */
class Categoria
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
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="versao", type="integer")
     */
    private $versao;

    /**
     * @ORM\OneToMany(targetEntity="Noticia", mappedBy="categoria")
     */
    private $noticias = array();

    public function __construct()
    {
        $this->noticias = new ArrayCollection();

    }

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
     * Set nome
     *
     * @param string $nome
     * @return Categoria
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set versao
     *
     * @param integer $versao
     * @return Categoria
     */
    public function setVersao($versao)
    {
        $this->versao = $versao;

        return $this;
    }

    /**
     * Get versao
     *
     * @return integer 
     */
    public function getVersao()
    {
        return $this->versao;
    }

    /**
     * @return mixed
     */
    public function getNoticias()
    {
        return $this->noticias;
    }

    public function addNoticias(Noticia $noticias)
    {
        $this->noticias[] = $noticias;

        return $this;
    }

    /**
     * Remove noticias
     *
     * @param \NoticiaBundle\Entity\Noticia $noticias
     */
    public function removeComentario(\NoticiaBundle\Entity\Noticia $noticias)
    {
        $this->noticias->removeElement($noticias);
    }

    public function __toString()
    {
        return $this->nome;
    }
}
