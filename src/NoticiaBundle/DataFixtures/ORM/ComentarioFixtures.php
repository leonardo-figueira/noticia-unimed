<?php

namespace NoticiaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use NoticiaBundle\Entity\Comentario;
use NoticiaBundle\Entity\Noticia;

class ComentarioarioFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comentario = new Comentario();
        $comentario->setUsuario('symfony');
        $comentario->setDescricao('To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-1')));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('David');
        $comentario->setDescricao('To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-1')));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Dade');
        $comentario->setDescricao('Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Kate');
        $comentario->setDescricao('Are you challenging me? ');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 06:15:20"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Dade');
        $comentario->setDescricao('Name your stakes.');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 06:18:35"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Kate');
        $comentario->setDescricao('If I win, you become my slave.');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 06:22:53"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Dade');
        $comentario->setDescricao('Your SLAVE?');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 06:25:15"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Kate');
        $comentario->setDescricao('You wish! You\'ll do shitwork, scan, crack copyrights...');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 06:46:08"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Dade');
        $comentario->setDescricao('And if I win?');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 10:22:46"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Kate');
        $comentario->setDescricao('Make it my first-born!');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-23 11:08:08"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Dade');
        $comentario->setDescricao('Make it our first-date!');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-24 18:56:01"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Kate');
        $comentario->setDescricao('I don\'t DO dates. But I don\'t lose either, so you\'re on!');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-2')));
        $comentario->setDtCadastro(new \DateTime("2011-07-25 22:28:42"));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Stanley');
        $comentario->setDescricao('It\'s not gonna end like this.');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-3')));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Gabriel');
        $comentario->setDescricao('Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-3')));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Mile');
        $comentario->setDescricao('Doesn\'t Bill Gates have something like that?');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-5')));
        $manager->persist($comentario);

        $comentario = new Comentario();
        $comentario->setUsuario('Gary');
        $comentario->setDescricao('Bill Who?');
        $comentario->setNoticia($manager->merge($this->getReference('noticia-5')));
        $manager->persist($comentario);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}