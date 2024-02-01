<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class C_CustomerFixtures extends Fixture
{

    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {

            $customer = new Customer();
            $customer->setEmail('contact@entreprise123.com');
            $customer->setName('Innovatech Solutions');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $customer->setCreatedAt($creationDate);
            $customer->setPassword($this->userPasswordHasher->hashPassword($customer, "password"));
            $manager->persist($customer);
            $this->addReference('customer_1', $customer);

            $customer = new Customer();
            $customer->setEmail('info@servicesinnovants.net');
            $customer->setName('FutureWave Technologies');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $customer->setCreatedAt($creationDate);
            $customer->setPassword($this->userPasswordHasher->hashPassword($customer, "password"));
            $manager->persist($customer);
            $this->addReference('customer_2', $customer);

            $customer = new Customer();
            $customer->setEmail('support@technologiesavancees.org');
            $customer->setName('Nouveau Horizon Industries');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $customer->setCreatedAt($creationDate);
            $customer->setPassword($this->userPasswordHasher->hashPassword($customer, "password"));
            $manager->persist($customer);
            $this->addReference('customer_3', $customer);

            $customer = new Customer();
            $customer->setEmail('inquiries@nouvellesidees.biz');
            $customer->setName('Services Progressifs Inc');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $customer->setCreatedAt($creationDate);
            $customer->setPassword($this->userPasswordHasher->hashPassword($customer, "password"));
            $manager->persist($customer);
            $this->addReference('customer_4', $customer);

            $customer = new Customer();
            $customer->setEmail('customerservice@innovationfuture.co');
            $customer->setName('Idées Avant-gardistes S.A');
            $daysAgo = rand(0, 30);
            $creationDate = new \DateTimeImmutable("-$daysAgo days");
            $customer->setCreatedAt($creationDate);
            $customer->setPassword($this->userPasswordHasher->hashPassword($customer, "password"));
            $manager->persist($customer);
            $this->addReference('customer_5', $customer);

        $manager->flush();
    }
}