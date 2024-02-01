<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class D_UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('user1@example.com');
            $user->setUsername('TechMaster42');
            $user->setFirstname('Emily');
            $user->setLastname('Johnson');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('client23@mail.net');
            $user->setUsername('AdventureSeeker');
            $user->setFirstname('Alex');
            $user->setLastname('Rodriguez');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('contact.xyz@gmail.com');
            $user->setUsername('QuantumCoder');
            $user->setFirstname('Chloe');
            $user->setLastname('Patel');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('john.doe@email.org');
            $user->setUsername('MusicLover88');
            $user->setFirstname('Ryan');
            $user->setLastname('Smith');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('username007@hotmail.com');
            $user->setUsername('FitnessGuru21');
            $user->setFirstname('Jasmine');
            $user->setLastname('Kim');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('customer789@domain.co');
            $user->setUsername('TravelExplorer');
            $user->setFirstname('Gabriel');
            $user->setLastname('Thompson');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('jsmith@example.net');
            $user->setUsername('CodingNinjaXYZ');
            $user->setFirstname('Olivia');
            $user->setLastname('Lopez');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('sarah.connor@email.com');
            $user->setUsername('BookWorm123');
            $user->setFirstname('Ethan');
            $user->setLastname('Miller');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('webuser45@mail.org');
            $user->setUsername('SkyDiver007');
            $user->setFirstname('Ava');
            $user->setLastname('Davis');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

            $user = new User();
            $customerId = $this->getReference('customer_'.rand(1, 5));
            $user->setCustomer($customerId);
            $user->setEmail('info.company@domain.org');
            $user->setUsername('FoodieEnthusiast');
            $user->setFirstname('Mason');
            $user->setLastname('Lee');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $user->setCreatedAt($creationDate);
            $manager->persist($user);

        $manager->flush();
    }
}