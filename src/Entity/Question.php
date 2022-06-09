<?php

declare(strict_types = 1);

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $phrase = null;

    #[ORM\ManyToOne(targetEntity: Topic::class)]
    private Topic $topic;

    #[ORM\ManyToOne(targetEntity: DisplayType::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?DisplayType $displayType = null;

    private ?ArrayCollection $options = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhrase(): ?string
    {
        return $this->phrase;
    }

    public function setPhrase(string $phrase): self
    {
        $this->phrase = $phrase;

        return $this;
    }

    public function getTopic(): Topic
    {
        return $this->topic;
    }

    public function setTopic(Topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getDisplayType(): ?DisplayType
    {
        return $this->displayType;
    }

    public function setDisplayType(?DisplayType $displayType): self
    {
        $this->displayType = $displayType;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        if ($this->options === null) {
            $this->options = new ArrayCollection();
        }

        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if ($this->options === null) {
            $this->options = new ArrayCollection();
        }

        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setQuestion($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        // set the owning side to null (unless already changed)
        if ($this->options->removeElement($option) && $option->getQuestion() === $this) {
            $option->setQuestion(null);
        }

        return $this;
    }
}
