<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use RuntimeException;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        private OptionRepository $optionRepository
    ) {
        parent::__construct($registry, Question::class);
    }

    public function add(Question $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Question $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getQuestionsForExam(int $amount): array
    {
        $allQuestions = $this->findAll();
        shuffle($allQuestions);

        return array_slice($allQuestions, 0, $amount);
    }

    public function findOneRandom(int $topicID): ?Question
    {
        $allQuestions = $this->findAll();

        $filteredQuestions = array_filter($allQuestions, static function ($question) use ($topicID): bool {
            return $question->getTopic()->getId() === $topicID;
        });

        if (empty($filteredQuestions)) {
            throw new RuntimeException(sprintf('no Question for topic with id %s', $topicID));
        }

        $question = $filteredQuestions[array_rand($filteredQuestions)];

        $options = $this->optionRepository->findBy(['question' => $question->getId()]);

        foreach ($options as $option) {
            $question->addOption($option);
        }

        return $question;
    }
}
