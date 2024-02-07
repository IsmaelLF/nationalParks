<?php

namespace App\Entity;

use App\Repository\ParksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParksRepository::class)]
class Parks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $provincia = null;

    #[ORM\Column(length: 255)]
    private ?string $ecosistema = null;

    #[ORM\Column(length: 255)]
    private ?string $ficheiro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): static
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getEcosistema(): ?string
    {
        return $this->ecosistema;
    }

    public function setEcosistema(string $ecosistema): static
    {
        $this->ecosistema = $ecosistema;

        return $this;
    }

    public function getFicheiro(): ?string
    {
        return $this->ficheiro;
    }

    public function setFicheiro(string $ficheiro): static
    {
        $this->ficheiro = $ficheiro;

        return $this;
    }
}
