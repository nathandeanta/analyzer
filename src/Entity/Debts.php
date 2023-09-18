<?php

namespace App\Entity;

use App\Repository\DebtsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DebtsRepository::class)]
class Debts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_debts = null;
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_user", referencedColumnName: "id_user")]
    private ?User $user;
    #[ORM\ManyToOne(targetEntity: TypeFlow::class)]
    #[ORM\JoinColumn(name: "id_type_flow", referencedColumnName: "id_type_flow"),]
    private ?TypeFlow $typeFlow;
    #[ORM\Column(nullable: true)]
    private ?string $describe;

    #[ORM\Column(nullable: true)]
    private ?string $ui_generate;

    #[ORM\Column(nullable: true)]
    private ?string $service;
    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private $amount;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2,nullable: true)]
    private $total;
    #[ORM\Column(nullable: true)]
    private ?int $portion;

    #[ORM\Column (nullable: true)]
    private ?int $number_of_installments;

    #[ORM\Column(type: "date")]
    private $date;

    #[ORM\Column(type: "datetime")]
    private $createdAt;

    /**
     * @return TypeFlow|null
     */
    public function getTypeFlow(): ?TypeFlow
    {
        return $this->typeFlow;
    }

    /**
     * @param TypeFlow|null $typeFlow
     */
    public function setTypeFlow(?TypeFlow $typeFlow): void
    {
        $this->typeFlow = $typeFlow;
    }

    public function getIdDebts(): ?int
    {
        return $this->id_debts;
    }

    /**
     * @return string|null
     */
    public function getUiGenerate(): ?string
    {
        return $this->ui_generate;
    }

    /**
     * @param string|null $ui_generate
     */
    public function setUiGenerate(?string $ui_generate): void
    {
        $this->ui_generate = $ui_generate;
    }


    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->total = $total;
    }


    /**
     * @return string|null
     */
    public function getDescribe(): ?string
    {
        return $this->describe;
    }

    /**
     * @param string|null $describe
     */
    public function setDescribe(?string $describe): void
    {
        $this->describe = $describe;
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
     * @return int|null
     */
    public function getPortion(): ?int
    {
        return $this->portion;
    }

    /**
     * @param int|null $portion
     */
    public function setPortion(?int $portion): void
    {
        $this->portion = $portion;
    }

    /**
     * @return int|null
     */
    public function getNumberOfInstallments(): ?int
    {
        return $this->number_of_installments;
    }

    /**
     * @param int|null $number_of_installments
     */
    public function setNumberOfInstallments(?int $number_of_installments): void
    {
        $this->number_of_installments = $number_of_installments;
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
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
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
