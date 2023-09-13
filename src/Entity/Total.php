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

    #[ORM\Column(type: "string", length: 255,nullable: true)]
    private ?string $service;

    #[ORM\Column(type: "datetime",nullable: true)]
    private $date;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

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

    /**
     * @return string|null
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * @param string|null $service
     */
    public function setService(?string $service): void
    {
        $this->service = $service;
    }


}
