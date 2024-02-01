<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class B_PhoneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

            $phone = new Phone();
            $phone->setBrand('Apple');
            $phone->setModel('Iphone 10S');
            $phone->setColor('Blue');
            $phone->setMemory('512Go');
            $phone->setPrice('1250.25');
            $manager->persist($phone);

            $phone = new Phone();
            $phone->setBrand('Samsung');
            $phone->setModel('S24');
            $phone->setColor('Black');
            $phone->setMemory('256Go');
            $phone->setPrice('1080.65');
            $manager->persist($phone);

            $phone = new Phone();
            $phone->setBrand('Xiaomi');
            $phone->setModel('13T');
            $phone->setColor('White');
            $phone->setMemory('1024Go');
            $phone->setPrice('860.87');
            $manager->persist($phone);

            $phone = new Phone();
            $phone->setBrand('Apple');
            $phone->setModel('Iphone 15 Pro');
            $phone->setColor('Black');
            $phone->setMemory('512Go');
            $phone->setPrice('1345.45');
            $manager->persist($phone);

            $phone = new Phone();
            $phone->setBrand('Samsung');
            $phone->setModel('Z Fold 5');
            $phone->setColor('White');
            $phone->setMemory('256Go');
            $phone->setPrice('920.42');
            $manager->persist($phone);

            $phone = new Phone();
            $phone->setBrand('Xiaomi');
            $phone->setModel('Note 13');
            $phone->setColor('Blue');
            $phone->setMemory('1024Go');
            $phone->setPrice('999.97');
            $manager->persist($phone);

        $manager->flush();
    }
}