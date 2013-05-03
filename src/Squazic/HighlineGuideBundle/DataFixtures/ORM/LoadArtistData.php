<?php

namespace Squazic\HighlineGuideBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Squazic\HighlineGuideBundle\Entity\Artist;

/**
 * Artist Fixtures
 *
 * Class LoadArtistData
 * @package Squazic\HighlineGuideBundle\DataFixtures\ORM
 */
class LoadArtistData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $artist = new Artist();
        $artist->setName('Ryan McGinley');
        $manager->persist($artist);
        $this->addReference('mcginley', $artist);

        $artist = new Artist();
        $artist->setName('Guido van der Werve');
        $manager->persist($artist);
        $this->addReference('vanderwerve', $artist);

        $artist = new Artist();
        $artist->setName('Oscar Muñoz');
        $manager->persist($artist);
        $this->addReference('munoz', $artist);

        $artist = new Artist();
        $artist->setName('El Anatsui');
        $manager->persist($artist);
        $this->addReference('anatsui', $artist);

        $artist = new Artist();
        $artist->setName('Uri Aran');
        $manager->persist($artist);
        $this->addReference('aran', $artist);

        $artist = new Artist();
        $artist->setName('Spencer Finch');
        $manager->persist($artist);
        $this->addReference('finch', $artist);

        $artist = new Artist();
        $artist->setName('Virginia Overton');
        $manager->persist($artist);
        $this->addReference('overton', $artist);

        $artist = new Artist();
        $artist->setName('Frank Benson');
        $manager->persist($artist);
        $this->addReference('benson', $artist);

        $artist = new Artist();
        $artist->setName('Steven Claydon');
        $manager->persist($artist);
        $this->addReference('claydon', $artist);

        $artist = new Artist();
        $artist->setName('George Condo');
        $manager->persist($artist);
        $this->addReference('condo', $artist);

        $artist = new Artist();
        $artist->setName('Mark Grotjahn');
        $manager->persist($artist);
        $this->addReference('grotjahn', $artist);

        $artist = new Artist();
        $artist->setName('Sean Landers');
        $manager->persist($artist);
        $this->addReference('landers', $artist);

        $artist = new Artist();
        $artist->setName('Goshka Macuga');
        $manager->persist($artist);
        $this->addReference('macuga', $artist);

        $artist = new Artist();
        $artist->setName('Ruby Neri');
        $manager->persist($artist);
        $this->addReference('neri', $artist);

        $artist = new Artist();
        $artist->setName('Amalia Pica');
        $manager->persist($artist);
        $this->addReference('pica', $artist);

        $artist = new Artist();
        $artist->setName('Andra Ursuta');
        $manager->persist($artist);
        $this->addReference('ursuta', $artist);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}