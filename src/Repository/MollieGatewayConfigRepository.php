<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusMolliePlugin\Repository;

use BitBag\SyliusMolliePlugin\Entity\GatewayConfigInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class MollieGatewayConfigRepository extends EntityRepository implements MollieGatewayConfigRepositoryInterface
{
    public function findAllEnabledByGateway(GatewayConfigInterface $gateway): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.enabled = true')
            ->andWhere('m.gateway = :gateway')
            ->setParameter('gateway', $gateway)
            ->getQuery()
            ->getResult()
        ;
    }
}
