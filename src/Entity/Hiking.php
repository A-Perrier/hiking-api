<?php

namespace App\Entity;

use App\Repository\HikingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HikingRepository::class)
 */
class Hiking
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $headers;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $length;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ascElevation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descElevation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $topPoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bottomPoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $difficulty;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLoop;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $way;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coordinates;

    /**
     * @ORM\OneToMany(targetEntity=HikingPicture::class, mappedBy="hiking", orphanRemoval=true)
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="hikings", fetch="EAGER")
     */
    private $commune;



    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getHeaders(): ?string
    {
        return $this->headers;
    }

    public function setHeaders(?string $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(string $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getAscElevation(): ?string
    {
        return $this->ascElevation;
    }

    public function setAscElevation(string $ascElevation): self
    {
        $this->ascElevation = $ascElevation;

        return $this;
    }

    public function getDescElevation(): ?string
    {
        return $this->descElevation;
    }

    public function setDescElevation(string $descElevation): self
    {
        $this->descElevation = $descElevation;

        return $this;
    }

    public function getTopPoint(): ?string
    {
        return $this->topPoint;
    }

    public function setTopPoint(string $topPoint): self
    {
        $this->topPoint = $topPoint;

        return $this;
    }

    public function getBottomPoint(): ?string
    {
        return $this->bottomPoint;
    }

    public function setBottomPoint(string $bottomPoint): self
    {
        $this->bottomPoint = $bottomPoint;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getIsLoop(): ?bool
    {
        return $this->isLoop;
    }

    public function setIsLoop(bool $isLoop): self
    {
        $this->isLoop = $isLoop;

        return $this;
    }

    public function getWay(): ?string
    {
        return $this->way;
    }

    public function setWay(string $way): self
    {
        $this->way = $way;

        return $this;
    }

    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): self
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * @return Collection|HikingPicture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(HikingPicture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setHiking($this);
        }

        return $this;
    }

    public function removePicture(HikingPicture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getHiking() === $this) {
                $picture->setHiking(null);
            }
        }

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): self
    {
        $this->commune = $commune;

        return $this;
    }


}
