<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commune Entity is linked 
 * @ORM\Entity(repositoryClass=CommuneRepository::class)
 */
class Commune
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\OneToMany(targetEntity=Hiking::class, mappedBy="commune")
     */
    private $hikings;



    public function __construct()
    {
        $this->hikings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return Collection|Hiking[]
     */
    public function getHikings(): Collection
    {
        return $this->hikings;
    }

    public function addHiking(Hiking $hiking): self
    {
        if (!$this->hikings->contains($hiking)) {
            $this->hikings[] = $hiking;
            $hiking->setCommune($this);
        }

        return $this;
    }

    public function removeHiking(Hiking $hiking): self
    {
        if ($this->hikings->removeElement($hiking)) {
            // set the owning side to null (unless already changed)
            if ($hiking->getCommune() === $this) {
                $hiking->setCommune(null);
            }
        }

        return $this;
    }

    
}
