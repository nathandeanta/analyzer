<?php

namespace App\Entity;

use App\Repository\TotalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TotalRepository::class)]
class Total
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id_total = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $amount;
    public function getIdTotal(): ?int
    {
        return $this->id_total;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }


}
