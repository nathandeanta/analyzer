<?php

namespace App\Entity;

use App\Repository\CashFlowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CashFlowRepository::class)]
class CashFlow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_cash_flow = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $value;
    #[ORM\Column(type: "text", nullable: true)]
    private $description;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $type;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $type_transactiion;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $bank;

    #[ORM\Column(type: "string", length: 255,nullable: true)]
    private $currency;

    #[ORM\Column(type: "string", length: 255,nullable: true)]
    private $currency_to;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2,nullable: true)]
    private $current_convert;

    #[ORM\Column(type: "string", length: 255,nullable: true)]
    private $merchant;

    #[ORM\Column(type: "datetime")]
    private $date;

    #[ORM\Column(type: "datetime")]
    private $createdAt;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

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

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getIdCashFlow(): ?int
    {
        return $this->id_cash_flow;
    }

    /**
     * @return mixed
     */
    public function getTypeTransactiion()
    {
        return $this->type_transactiion;
    }

    /**
     * @param mixed $type_transactiion
     */
    public function setTypeTransactiion($type_transactiion): void
    {
        $this->type_transactiion = $type_transactiion;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank): void
    {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCurrencyTo()
    {
        return $this->currency_to;
    }

    /**
     * @param mixed $currency_to
     */
    public function setCurrencyTo($currency_to): void
    {
        $this->currency_to = $currency_to;
    }

    /**
     * @return mixed
     */
    public function getCurrentConvert()
    {
        return $this->current_convert;
    }

    /**
     * @param mixed $current_convert
     */
    public function setCurrentConvert($current_convert): void
    {
        $this->current_convert = $current_convert;
    }

    /**
     * @return mixed
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param mixed $merchant
     */
    public function setMerchant($merchant): void
    {
        $this->merchant = $merchant;
    }



}
