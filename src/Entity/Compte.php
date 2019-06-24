<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
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
    private $nomCompte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlCompte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $loginCompte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passwordCompte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionCompte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gestionnaire", inversedBy="comptes")
     */
    private $gestionnaire;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="comptes")
     */
    private $category;

//    public function __construct()
//    {
//        $this->nomCategorie = new ArrayCollection();
//    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompte(): ?string
    {
        return $this->nomCompte;
    }

    public function setNomCompte(string $nomCompte): self
    {
        $this->nomCompte = $nomCompte;

        return $this;
    }

    public function getUrlCompte(): ?string
    {
        return $this->urlCompte;
    }

    public function setUrlCompte(?string $urlCompte): self
    {
        $this->urlCompte = $urlCompte;

        return $this;
    }

    public function getLoginCompte(): ?string
    {
        return $this->loginCompte;
    }

    public function setLoginCompte(?string $loginCompte): self
    {
        $this->loginCompte = $loginCompte;

        return $this;
    }

    public function getPasswordCompte(): ?string
    {
        return $this->passwordCompte;
    }

    public function setPasswordCompte(?string $passwordCompte): self
    {
//        $this->passwordCompte = $passwordCompte;
        $this->passwordCompte = password_hash($passwordCompte, PASSWORD_DEFAULT);
        return $this;
    }

    public function getDescriptionCompte(): ?string
    {
        return $this->descriptionCompte;
    }

    public function setDescriptionCompte(?string $descriptionCompte): self
    {
        $this->descriptionCompte = $descriptionCompte;

        return $this;
    }

    public function getGestionnaire(): ?Gestionnaire
    {
        return $this->gestionnaire;
    }

    public function setGestionnaire(?Gestionnaire $gestionnaire): self
    {
        $this->gestionnaire = $gestionnaire;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->getPasswordCompte();
    }
}
