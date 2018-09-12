<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KonferansRepository")
 */
class Konferans
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $isim;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Lütfen geçerli bir pdf afiş dosyası yükleyin")
     * @Assert\File(mimeTypes={"application/pdf"})
     */
    private $afis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsim(): ?string
    {
        return $this->isim;
    }

    public function setIsim(string $isim): self
    {
        $this->isim = $isim;

        return $this;
    }

    public function getAfis(): ?string
    {
        return $this->afis;
    }

    public function setAfis(string $afis): self
    {
        $this->afis = $afis;

        return $this;
    }
}
