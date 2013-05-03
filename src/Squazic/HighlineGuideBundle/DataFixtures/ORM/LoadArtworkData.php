<?php

namespace Squazic\HighlineGuideBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Squazic\HighlineGuideBundle\Entity\Artwork;

/**
 * Artwork Fixtures
 *
 * Class LoadArtworkData
 * @package Squazic\HighlineGuideBundle\DataFixtures\ORM
 */
class LoadArtworkData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $artwork = new Artwork();
        $artwork->setTitle('Blue Falling');
        $artwork->setDescription('A dreamlike image of a figure floating in a vast blue background');
        $artwork->setLatitude(40.744663);
        $artwork->setLongitude(-74.006798);
        $artwork->addArtist($this->getReference('mcginley'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle("Nummer negen, the day I didn't turn with the world");
        $artwork->setDescription('Time-lapse video of the artist turning in the opposite direction of the earth');
        $artwork->setLatitude(40.741550);
        $artwork->setLongitude(-74.007913);
        $artwork->addArtist($this->getReference('vanderwerve'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Re/trato');
        $artwork->setDescription('A self-portrait on a concrete sidewalk using a brush and water, creating an endless drawing');
        $artwork->setLatitude(40.747346);
        $artwork->setLongitude(-74.005017);
        $artwork->addArtist($this->getReference('munoz'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Broken Bridge II');
        $artwork->setDescription('A monumental sculpture made of pressed tin and mirrors creating wave-like patterns and folds');
        $artwork->setLatitude(40.746809);
        $artwork->setLongitude(-74.005650);
        $artwork->addArtist($this->getReference('anatsui'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Untitled (Good & Bad)');
        $artwork->setDescription('A playful sound installation transforms the High Line into an imaginary jungle');
        $artwork->setLatitude(40.749272);
        $artwork->setLongitude(-74.003659);
        $artwork->addArtist($this->getReference('aran'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('The River That Flows Both Ways');
        $artwork->setDescription('A glass installation inspired by a 700-minute journey along the Hudson River');
        $artwork->setLatitude(40.743274);
        $artwork->setLongitude(-74.007034);
        $artwork->addArtist($this->getReference('finch'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Untitled');
        $artwork->setDescription('A pickup truck is transformed into a sculpture in a vertical parking lot next to the High Line');
        $artwork->setLatitude(40.745972);
        $artwork->setLongitude(-74.006143);
        $artwork->addArtist($this->getReference('overton'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Human Statue (Jessie)');
        $artwork->setDescription('A life-size sculpture of a woman, referencing both classical Greek sculpture and modern technology');
        $artwork->setLatitude(40.742209);
        $artwork->setLongitude(-74.007720);
        $artwork->addArtist($this->getReference('benson'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('UNLIMITEDS & LIMITERS');
        $artwork->setDescription('Two seemingly traditional busts installed upside down which will weather over time');
        $artwork->setLatitude(40.750913);
        $artwork->setLongitude(-74.002608);
        $artwork->addArtist($this->getReference('claydon'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Liquor Store Attendant');
        $artwork->setDescription('A bronze bust depicts a grotesque face covered with barnacles');
        $artwork->setLatitude(40.747809);
        $artwork->setLongitude(-74.004759);
        $artwork->addArtist($this->getReference('condo'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Untitled (Top Gates Mask M22.gi)');
        $artwork->setDescription('An abstract cardboard mask cast in bronze resembles a childlike construction');
        $artwork->setLatitude(40.740737);
        $artwork->setLongitude(-74.008107);
        $artwork->addArtist($this->getReference('grotjahn'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Pan');
        $artwork->setDescription('A satyr wearing a Scottish kilt evokes a world where reality and mythology meet');
        $artwork->setLatitude(40.739526);
        $artwork->setLongitude(-74.008171);
        $artwork->addArtist($this->getReference('landers'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Colin Powell');
        $artwork->setDescription('A sculpture of the former Secretary of State during a 2003 speech at the United Nations');
        $artwork->setLatitude(40.747191);
        $artwork->setLongitude(-74.005317);
        $artwork->addArtist($this->getReference('macuga'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Before a Framwork');
        $artwork->setDescription('A figurative sculpture of a women against an open framework gazing out at the cityscape');
        $artwork->setLatitude(40.744891);
        $artwork->setLongitude(-74.006851);
        $artwork->addArtist($this->getReference('neri'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Number one (from the series heroes on the run)');
        $artwork->setDescription('An empty pedestal covered with oxidation marks suggests the artwork has disappeared');
        $artwork->setLatitude(40.744639);
        $artwork->setLongitude(-74.007012);
        $artwork->addArtist($this->getReference('pica'));
        $manager->persist($artwork);

        $artwork = new Artwork();
        $artwork->setTitle('Nose Job');
        $artwork->setDescription('A giant marble nose sits in a wheelbarrow, referencing defaced monuments');
        $artwork->setLatitude(40.741233);
        $artwork->setLongitude(-74.007946);
        $artwork->addArtist($this->getReference('ursuta'));
        $manager->persist($artwork);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}