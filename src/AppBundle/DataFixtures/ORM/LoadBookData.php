<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Book;
use AppBundle\Entity\Genre;

class LoadBookData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $policeGenera = new Genre();
        $policeGenera->setName('Police');
        $manager->persist($policeGenera);

        $comedyGenera = new Genre();
        $comedyGenera->setName('Comedy');
        $manager->persist($comedyGenera);

        $dramaGenera = new Genre();
        $dramaGenera->setName('Drama');
        $manager->persist($dramaGenera);

        $nonFictionGenera = new Genre();
        $nonFictionGenera->setName('Non-fiction');
        $manager->persist($nonFictionGenera);

        $horrorGenera = new Genre();
        $horrorGenera->setName('Horror');
        $manager->persist($horrorGenera);

        $tragedyGenera = new Genre();
        $tragedyGenera->setName('Tragedy');
        $manager->persist($tragedyGenera);

        $childrenGenera = new Genre();
        $childrenGenera->setName('Children');
        $manager->persist($childrenGenera);

        $fictionGenera = new Genre();
        $fictionGenera->setName('Fiction');
        $manager->persist($fictionGenera);

        $satireGenera = new Genre();
        $satireGenera->setName('Satire');
        $manager->persist($satireGenera);

        $book = new Book();
        $book->setName('Doctor With Big Eyes');
        $book->setReleaseDate(new \DateTime('01.02.2016'));
        $book->setLength(200);
        $book->addGenre($policeGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Hunger Of My Town');
        $book->setReleaseDate(new \DateTime('02.05.2016'));
        $book->setLength(10);
        $book->addGenre($comedyGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Colleagues And Demons');
        $book->setReleaseDate(new \DateTime('06.04.2015'));
        $book->setLength(30);
        $book->addGenre($dramaGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Humans In The Library');
        $book->setReleaseDate(new \DateTime('15.06.1982'));
        $book->setLength(600);
        $book->addGenre($nonFictionGenera);
        $book->addGenre($horrorGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(false);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Founders Of Evil');
        $book->setReleaseDate(new \DateTime('30.08.1530'));
        $book->setLength(900);
        $book->addGenre($dramaGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Ancestor With Horns');
        $book->setReleaseDate(new \DateTime('10.10.2019'));
        $book->setLength(100);
        $book->addGenre($dramaGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Age Of The Light');
        $book->setReleaseDate(new \DateTime('06.12.1923'));
        $book->setLength(234);
        $book->addGenre($tragedyGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Learning With The River');
        $book->setReleaseDate(new \DateTime('02.02.1965'));
        $book->setLength(200);
        $book->addGenre($childrenGenera);
        $book->addGenre($fictionGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $book = new Book();
        $book->setName('Lord And Buffoon');
        $book->setReleaseDate(new \DateTime('09.07.2001'));
        $book->setLength(240);
        $book->addGenre($horrorGenera);
        $book->addGenre($satireGenera);
        $book->setAdminReadable(true);
        $book->setUserReadable(true);
        $manager->persist($book);

        $manager->flush();
    }
}
