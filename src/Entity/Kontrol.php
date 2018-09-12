<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KontrolRepository")
 */
class Kontrol
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
     * @Assert\Length(min="5", max="20", minMessage="min 5 karakter olmalı", maxMessage="max 20 karakter olmalı")
     */
    private $isim;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\DateTime()
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getIsim(): ?string
    {
        return $this->isim;
    }

    /**
     * @param $isim
     * @Assert\IsFalse(message="Alana sadece Behram yazılamaz")
     * @return bool
     */
    public function isimCheck()
    {
        return $this->isim === 'Behram';
    }

    public function setIsim(string $isim): self
    {
        $this->isim = $isim;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}
