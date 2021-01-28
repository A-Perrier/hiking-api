<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Hiking;
use APerrier\Faker\Travel;
use App\Entity\Commune;
use App\Entity\HikingPicture;
use App\Repository\CommuneRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    public $communeRepository;
    public $slugger;
 

    public function __construct(CommuneRepository $communeRepository, SluggerInterface $slugger)
    {
        $this->communeRepository = $communeRepository;
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->addProvider(new Travel($faker));

        for($i = 0; $i < 100; $i++) {
            $hiking = new Hiking();
            $hiking->setTitle($faker->hiking())
                   ->setHeaders($faker->words(12, true))
                   ->setDescription($faker->paragraphs(3, true))
                   ->setDuration($faker->duration())
                   ->setLength($faker->length())
                   ->setAscElevation(mt_rand(100, 3000))
                   ->setDescElevation(mt_rand(100, 3000))
                   ->setTopPoint(mt_rand(100, 3000))
                   ->setBottomPoint(mt_rand(0, ($hiking->getTopPoint() - 100)))
                   ->setDifficulty($faker->difficulty())
                   ->setIsLoop($faker->boolean())
                   ->setWay($faker->way())
                   ->setCoordinates($faker->coordinates());

            $commune = new Commune();
            $commune->setName($faker->commune())
                    ->setPostalCode($faker->postalCode())
                    ->setSlug($this->slugger->slug($commune->getName()))
                    ->addHiking($hiking);
            
            $manager->persist($commune);

            for($j = 0; $j < mt_rand(2, 4); $j++) {
                $picture = new HikingPicture();
                $picture->setDescription($faker->words(mt_rand(3, 9), true))
                        ->setUrl($faker->mountainImg())
                        ->setHiking($hiking);

                $manager->persist($picture);
            }

            $manager->persist($hiking);
        }

        $manager->flush();
    }
}
