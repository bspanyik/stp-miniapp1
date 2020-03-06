<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Security\Sha1PasswordEncoder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    /**
     * @var Sha1PasswordEncoder
     */
    private $passwordEncoder;

    public function __construct(Sha1PasswordEncoder $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User;
        $user
            ->setName('Balázs')
            ->setActive(true)
            ->setPassword(addslashes($this->passwordEncoder->encodePassword('almafa')))
            ->setRFID(uniqid())
            ->setCompany('Balasoft')
            ->setAddress('1156 Bp. Páskomliget u. 16.')
            ->setComment('dev')
        ;

        $manager->persist($user);

        $manager->flush();
    }
}
