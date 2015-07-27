<?php

namespace NoticiaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use \NoticiaBundle\Entity\Noticia;

/**
 * NoticiaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NoticiaRepository extends EntityRepository
{

    public function buscaNoticiaPorData()
    {
        $qb = $this->createQueryBuilder('n')
            ->select('n')
            ->addOrderBy('n.dtCadastro', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function buscaNoticiaWeb($limit = null)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT n FROM \NoticiaBundle\Entity\Noticia n JOIN n.categoria c
                            WHERE c.versao = 1 OR c.versao = 0 ORDER BY n.dtCadastro DESC")
            ->setMaxResults($limit)
            ->getResult();
    }

    public function buscaNoticiaMobile($limit = null)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT n FROM \NoticiaBundle\Entity\Noticia n JOIN n.categoria c
                            WHERE c.versao = 2 OR c.versao = 0 ORDER BY n.dtCadastro DESC")
            ->setMaxResults($limit)
            ->getResult();
    }

    public function buscarPorFiltro($categoriaId)
    {
        $qb = $this->createQueryBuilder('n')
            ->select('n')
            ->where('n.categoria = :categoriaId')
            ->setParameter('categoriaId', $categoriaId)
            ->orderBy('n.dtCadastro','desc');

        return $qb->getQuery()->getResult();
    }

    public function adicionar(Noticia $noticia) {

        $this->_em->persist($noticia);
        $this->_em->flush();
        return true;
    }

    public function excluir(Noticia $noticia) {
        $this->_em->remove($noticia);
        $this->_em->flush();
        return true;
    }

    public function alterar(Noticia $noticia) {
        $this->_em->merge($noticia);
        $this->_em->flush();
        return true;
    }
}
