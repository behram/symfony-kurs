<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KartRepository")
 */
class Kart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numara;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="kart", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumara(): ?string
    {
        return $this->numara;
    }

    public function setNumara(string $numara): self
    {
        $this->numara = $numara;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newKart = $user === null ? null : $this;
        if ($newKart !== $user->getKart()) {
            $user->setKart($newKart);
        }

        return $this;
    }
}
