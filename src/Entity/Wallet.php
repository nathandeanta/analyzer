<?php

namespace App\Entity;

use App\Repository\WalletRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WalletRepository::class)]
class Wallet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_wallet = null;

    #[ORM\Column]
    private ?string $exchange = null;
    #[ORM\Column]
    private ?string $type_money = null;
    #[ORM\Column]
    private ?string $quantity;

    #[ORM\ManyToOne(targetEntity: Bitcoin::class)]
    #[ORM\JoinColumn(name: "id_bitcoin", referencedColumnName: "id_bitcoin"),]
    private ?Bitcoin $bitcoin;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $amount;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $value_iten;

    #[ORM\Column(type: "datetime",nullable: true)]
    private $date;

    /**
     * @return mixed
     */
    public function getValueIten()
    {
        return $this->value_iten;
    }

    /**
     * @param mixed $value_iten
     */
    public function setValueIten($value_iten): void
    {
        $this->value_iten = $value_iten;
    }

    public function getIdWallet(): ?int
    {
        return $this->id_wallet;
    }

    /**
     * @return string|null
     */
    public function getExchange(): ?string
    {
        return $this->exchange;
    }

    /**
     * @param string|null $exchange
     */
    public function setExchange(?string $exchange): void
    {
        $this->exchange = $exchange;
    }

    /**
     * @return string|null
     */
    public function getTypeMoney(): ?string
    {
        return $this->type_money;
    }

    /**
     * @param string|null $type_money
     */
    public function setTypeMoney(?string $type_money): void
    {
        $this->type_money = $type_money;
    }

    /**
     * @return string|null
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param string|null $quantity
     */
    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }



    /**
     * @return Bitcoin|null
     */
    public function getBitcoin(): ?Bitcoin
    {
        return $this->bitcoin;
    }

    /**
     * @param Bitcoin|null $bitcoin
     */
    public function setBitcoin(?Bitcoin $bitcoin): void
    {
        $this->bitcoin = $bitcoin;
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
