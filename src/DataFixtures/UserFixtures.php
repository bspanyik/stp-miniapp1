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

        $user = new User;
        $user
            ->setName('Lajos')
            ->setActive(false)
            ->setPassword(addslashes($this->passwordEncoder->encodePassword('abc123')))
            ->setRFID(uniqid())
            ->setCompany('Lajoska Bt.')
            ->setAddress('1169 Bp. Kökörcsin utca 9.')
            ->setComment('lótifuti')
        ;

        $manager->persist($user);

        $user = new User;
        $user
            ->setName('Péter')
            ->setActive(true)
            ->setPassword(addslashes($this->passwordEncoder->encodePassword('stp123')))
            ->setRFID(uniqid())
            ->setCompany('Oximoron Kft.')
            ->setAddress('1191 Budapest Dunno közöm 0.')
            ->setComment('boss')
        ;

        $manager->persist($user);

        $manager->flush();
    }
}
