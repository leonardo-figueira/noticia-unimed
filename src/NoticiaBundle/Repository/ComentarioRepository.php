<?php

namespace NoticiaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use NoticiaBundle\Entity\Comentario;

/**
 * ComentarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComentarioRepository extends EntityRepository
{

    public function buscarComentariosPorNoticia($noticiaId)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.noticia = :noticia_id')
            ->addOrderBy('c.dtCadastro')
            ->setParameter('noticia_id', $noticiaId);

        return $qb->getQuery()->getResult();
    }

    public function adicionar(Comentario $comentario) {

        $this->_em->persist($comentario);
        $this->_em->flush();
        return true;

    }

}
