<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Exercices::class, inversedBy="tests")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exercice;

    /**
     * @ORM\Column(type="json")
     */
    private $inputs = [];

    /**
     * @ORM\Column(type="json")
     */
    private $outputs = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExercice(): ?Exercices
    {
        return $this->exercice;
    }

    public function setExercice(?Exercices $exercice): self
    {
        $this->exercice = $exercice;

        return $this;
    }

    public function getInputs(): ?array
    {
        return $this->inputs;
    }

    public function setInputs(array $inputs): self
    {
        $this->inputs = $inputs;

        return $this;
    }

    public function getOutputs(): ?array
    {
        return $this->outputs;
    }

    public function setOutputs(array $outputs): self
    {
        $this->outputs = $outputs;

        return $this;
    }
}
