<?php
namespace App\Infrastructure\Repository;

use App\Domain\Entity\Product;
use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function save(Product $product): void
    {
        $this->_em->persist($product);
        $this->_em->flush();
    }
}