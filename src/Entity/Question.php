<?php

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
    private $id;

    #[ORM\Column(type: 'text')]
    private $phrase;

    #[ORM\ManyToMany(targetEntity: Topic::class, mappedBy: 'QuestionList')]
    private $topics;

    #[ORM\ManyToOne(targetEntity: DisplayType::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $displayTypeId;

    #[ORM\OneToMany(mappedBy: 'questionId', targetEntity: Option::class, orphanRemoval: true)]
    private $options;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Topic>
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topic $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics[] = $topic;
            $topic->addQuestion($this);
        }

        return $this;
    }

    public function removeTopic(Topic $topic): self
    {
        if ($this->topics->removeElement($topic)) {
            $topic->removeQuestion($this);
        }

        return $this;
    }

    public function getDisplayTypeId(): ?DisplayType
    {
        return $this->displayTypeId;
    }

    public function setDisplayTypeId(?DisplayType $displayTypeId): self
    {
        $this->displayTypeId = $displayTypeId;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setQuestionId($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->removeElement($option)) {
            // set the owning side to null (unless already changed)
            if ($option->getQuestionId() === $this) {
                $option->setQuestionId(null);
            }
        }

        return $this;
    }
}
