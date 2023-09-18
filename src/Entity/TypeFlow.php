<?php

namespace App\Entity;

use App\Repository\TypeFlowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeFlowRepository::class)]
class TypeFlow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_type_flow = null;
    #[ORM\Column]
    private ?string $title;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_user", referencedColumnName: "id_user")]
    private ?User $user;

    public function getIdTypeFlow(): ?int
    {
        return $this->id_type_flow;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
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

}
