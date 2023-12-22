<?php

namespace App\Entity;

use App\Repository\BitcoinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BitcoinRepository::class)]
class Bitcoin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_bitcoin = null;

    #[ORM\Column]
    private ?string $symbol = null;

    #[ORM\Column]
    private ?string $description = null;

    #[ORM\Column]
    private ?string $currency = null;

    #[ORM\Column]
    private ?string $base_currency = null;

    #[ORM\Column(nullable: true)]
    private ?string $ticker = null;

    /**
     * @return string|null
     */
    public function getTicker(): ?string
    {
        return $this->ticker;
    }

    /**
     * @param string|null $ticker
     */
    public function setTicker(?string $ticker): void
    {
        $this->ticker = $ticker;
    }

    public function build(array $dados): void
    {
        $this->symbol = $dados['symbol'] ?? null;
        $this->description = $dados['description'] ?? null;
        $this->currency = $dados['currency'] ?? null;
        $this->base_currency = $dados['base-currency'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param string|null $symbol
     */
    public function setSymbol(?string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string|null
     */
    public function getBaseCurrency(): ?string
    {
        return $this->base_currency;
    }

    /**
     * @param string|null $base_currency
     */
    public function setBaseCurrency(?string $base_currency): void
    {
        $this->base_currency = $base_currency;
    }

    public function getIdBitcoin(): ?int
    {
        return $this->id_bitcoin;
    }


}
