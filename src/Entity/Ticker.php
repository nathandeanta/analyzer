<?php

namespace App\Entity;

use App\Repository\TickerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TickerRepository::class)]
class Ticker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_ticker = null;
    #[ORM\Column]
    private ?string $buy = null;
    #[ORM\Column]
    private ?string $high = null;
    #[ORM\Column]
    private ?string $last = null;
    #[ORM\Column]
    private ?string $low = null;
    #[ORM\Column]
    private ?string $open = null;

    #[ORM\Column]
    private ?string $pair = null;

    #[ORM\Column]
    private ?string $sell = null;

    #[ORM\Column]
    private ?string $vol = null;

    #[ORM\Column]
    private ?int $date = null;

    #[ORM\Column(type: "datetime")]
    private \DateTime $date_real;


    #[ORM\ManyToOne(targetEntity: Bitcoin::class)]
    #[ORM\JoinColumn(name: "id_bitcoin", referencedColumnName: "id_bitcoin"),]
    private ?Bitcoin $bitcoin;

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

    public function getIdTicker(): ?int
    {
        return $this->id_ticker;
    }

    /**
     * @return string|null
     */
    public function getBuy(): ?string
    {
        return $this->buy;
    }

    /**
     * @param string|null $buy
     */
    public function setBuy(?string $buy): void
    {
        $this->buy = $buy;
    }

    /**
     * @return string|null
     */
    public function getHigh(): ?string
    {
        return $this->high;
    }

    /**
     * @param string|null $high
     */
    public function setHigh(?string $high): void
    {
        $this->high = $high;
    }

    /**
     * @return string|null
     */
    public function getLast(): ?string
    {
        return $this->last;
    }

    /**
     * @param string|null $last
     */
    public function setLast(?string $last): void
    {
        $this->last = $last;
    }

    /**
     * @return string|null
     */
    public function getLow(): ?string
    {
        return $this->low;
    }

    /**
     * @param string|null $low
     */
    public function setLow(?string $low): void
    {
        $this->low = $low;
    }

    /**
     * @return string|null
     */
    public function getOpen(): ?string
    {
        return $this->open;
    }

    /**
     * @param string|null $open
     */
    public function setOpen(?string $open): void
    {
        $this->open = $open;
    }

    /**
     * @return string|null
     */
    public function getPair(): ?string
    {
        return $this->pair;
    }

    /**
     * @param string|null $pair
     */
    public function setPair(?string $pair): void
    {
        $this->pair = $pair;
    }

    /**
     * @return string|null
     */
    public function getSell(): ?string
    {
        return $this->sell;
    }

    /**
     * @param string|null $sell
     */
    public function setSell(?string $sell): void
    {
        $this->sell = $sell;
    }

    /**
     * @return string|null
     */
    public function getVol(): ?string
    {
        return $this->vol;
    }

    /**
     * @param string|null $vol
     */
    public function setVol(?string $vol): void
    {
        $this->vol = $vol;
    }

    /**
     * @return int|null
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int|null $date
     */
    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getDateReal(): \DateTime
    {
        return $this->date_real;
    }

    /**
     * @param \DateTime $date_real
     */
    public function setDateReal(\DateTime $date_real): void
    {
        $this->date_real = $date_real;
    }

  /*  [
    {
    "buy": "160.00000005",
    "date": 1636107279,
    "high": "145.00000001",
    "last": "144.07000004",
    "low": "143.00000002",
    "open": "143.00000007",
    "pair": "BTC-BRL",
    "sell": "145.00000006",
    "vol": "84.00100003"
    }
    ]*/

}
