<?php

namespace NoticiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historico
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NoticiaBundle\Repository\HistoricoRepository")
 */
class Historico
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
     * @var integer
     *
     * @ORM\Column(name="noticia_id", type="integer")
     */
    private $noticiaId;

    /**
     * @var string
     *
     * @ORM\Column(name="noticia_nome", type="string", length=255)
     */
    private $noticiaNome;

    /**
     * @var string
     *
     * @ORM\Column(name="acao", type="string", length=255)
     */
    private $acao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime")
     */
    private $data;


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
     * Set noticiaId
     *
     * @param integer $noticiaId
     * @return Historico
     */
    public function setNoticiaId($noticiaId)
    {
        $this->noticiaId = $noticiaId;

        return $this;
    }

    /**
     * Get noticiaId
     *
     * @return integer 
     */
    public function getNoticiaId()
    {
        return $this->noticiaId;
    }

    /**
     * Set noticiaNome
     *
     * @param string $noticiaNome
     * @return Historico
     */
    public function setNoticiaNome($noticiaNome)
    {
        $this->noticiaNome = $noticiaNome;

        return $this;
    }

    /**
     * Get noticiaNome
     *
     * @return string 
     */
    public function getNoticiaNome()
    {
        return $this->noticiaNome;
    }

    /**
     * Set acao
     *
     * @param string $acao
     * @return Historico
     */
    public function setAcao($acao)
    {
        $this->acao = $acao;

        return $this;
    }

    /**
     * Get acao
     *
     * @return string 
     */
    public function getAcao()
    {
        return $this->acao;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Historico
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }
}
