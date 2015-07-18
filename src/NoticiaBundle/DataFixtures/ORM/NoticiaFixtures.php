<?php
namespace NoticiaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use NoticiaBundle\Entity\Noticia;

class NoticiaFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $noticia1 = new Noticia();
        $noticia1->setTitulo('A day with Symfony2');
        $noticia1->setNoticia('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $noticia1->setImagem('beach.jpg');
        $noticia1->setAutor('dsyph3r');
        $noticia1->setTags('symfony2, php, paradise, symBlog');
        $noticia1->setCriado(new \DateTime());
        $noticia1->setAtualizado($noticia1->getCriado());
        $manager->persist($noticia1);

        $noticia2 = new noticia();
        $noticia2->setTitulo('The pool on the roof must have a leak');
        $noticia2->setnoticia('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
        $noticia2->setImagem('pool_leak.jpg');
        $noticia2->setAutor('Zero Cool');
        $noticia2->setTags('pool, leaky, hacked, movie, hacking, symBlog');
        $noticia2->setCriado(new \DateTime("2011-07-23 06:12:33"));
        $noticia2->setAtualizado($noticia2->getCriado());
        $manager->persist($noticia2);

        $noticia3 = new noticia();
        $noticia3->setTitulo('Misdirection. What the eyes see and the ears hear, the mind believes');
        $noticia3->setnoticia('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $noticia3->setImagem('misdirection.jpg');
        $noticia3->setAutor('Gabriel');
        $noticia3->setTags('misdirection, magic, movie, hacking, symBlog');
        $noticia3->setCriado(new \DateTime("2011-07-16 16:14:06"));
        $noticia3->setAtualizado($noticia3->getCriado());
        $manager->persist($noticia3);

        $noticia4 = new noticia();
        $noticia4->setTitulo('The grid - A digital frontier');
        $noticia4->setnoticia('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $noticia4->setImagem('the_grid.jpg');
        $noticia4->setAutor('Kevin Flynn');
        $noticia4->setTags('grid, daftpunk, movie, symBlog');
        $noticia4->setCriado(new \DateTime("2011-06-02 18:54:12"));
        $noticia4->setAtualizado($noticia4->getCriado());
        $manager->persist($noticia4);

        $noticia5 = new noticia();
        $noticia5->setTitulo('You\'re either a one or a zero. Alive or dead');
        $noticia5->setnoticia('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $noticia5->setImagem('one_or_zero.jpg');
        $noticia5->setAutor('Gary Winston');
        $noticia5->setTags('binary, one, zero, alive, dead, !trusting, movie, symBlog');
        $noticia5->setCriado(new \DateTime("2011-04-25 15:34:18"));
        $noticia5->setAtualizado($noticia5->getCriado());
        $manager->persist($noticia5);

        $manager->flush();
    }

}