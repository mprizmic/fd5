<?php

namespace App\Purger;

use Doctrine\Bundle\FixturesBundle\Purger\PurgerFactory;
use Doctrine\ORM\EntityManagerInterface;

class CustomPurgerFactory implements PurgerFactory {

    public function createForEntityManager(?string $emName, EntityManagerInterface $em, array $excluded = [], bool $purgeWithTruncate = false): PurgerInterface {
        return new CustomPurger($em);
    }

}
