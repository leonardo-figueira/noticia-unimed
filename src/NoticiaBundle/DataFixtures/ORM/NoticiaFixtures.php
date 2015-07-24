<?php
namespace NoticiaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use NoticiaBundle\Entity\Noticia;

class NoticiaFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $noticia1 = new Noticia();
        $noticia1->setTitulo('A day with Symfony2');
        $noticia1->setNoticia('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $noticia1->setImagem('beach.jpg');
        $noticia1->setDtCadastro(new \DateTime());
        $noticia1->setDtAtualizacao($noticia1->getDtCadastro());
        $manager->persist($noticia1);

        $noticia2 = new noticia();
        $noticia2->setTitulo('The pool on the roof must have a leak');
        $noticia2->setnoticia('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
        $noticia2->setImagem('pool_leak.jpg');
        $noticia2->setDtCadastro(new \DateTime("2011-07-23 06:12:33"));
        $noticia2->setDtAtualizacao($noticia2->getDtCadastro());
        $manager->persist($noticia2);

        $noticia3 = new noticia();
        $noticia3->setTitulo('Misdirection. What the eyes see and the ears hear, the mind believes');
        $noticia3->setnoticia('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $noticia3->setImagem('misdirection.jpg');
        $noticia3->setDtCadastro(new \DateTime("2011-07-16 16:14:06"));
        $noticia3->setDtAtualizacao($noticia3->getDtCadastro());
        $manager->persist($noticia3);

        $noticia4 = new noticia();
        $noticia4->setTitulo('The grid - A digital frontier');
        $noticia4->setnoticia('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $noticia4->setImagem('the_grid.jpg');
        $noticia4->setDtCadastro(new \DateTime("2011-06-02 18:54:12"));
        $noticia4->setDtAtualizacao($noticia4->getDtCadastro());
        $manager->persist($noticia4);

        $noticia5 = new noticia();
        $noticia5->setTitulo('You\'re either a one or a zero. Alive or dead');
        $noticia5->setnoticia('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $noticia5->setImagem('one_or_zero.jpg');
        $noticia5->setDtCadastro(new \DateTime("2011-04-25 15:34:18"));
        $noticia5->setDtAtualizacao($noticia5->getDtCadastro());
        $manager->persist($noticia5);

        $manager->flush();

        $this->addReference('noticia-1', $noticia1);
        $this->addReference('noticia-2', $noticia2);
        $this->addReference('noticia-3', $noticia3);
        $this->addReference('noticia-4', $noticia4);
        $this->addReference('noticia-5', $noticia5);
    }

    public function getOrder()
    {
        return 1;
    }    

}