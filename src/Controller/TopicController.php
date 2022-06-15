<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\QuestionRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/topic", name="topic")
 */
class TopicController extends AbstractController
{
    public function __construct(private QuestionRepository $repository)
    {
    }

    /**
     * @Route("/", name="_index")
     */
    public function topic(): Response
    {
        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => -1,
                'partial' => 'task_home',
            ]
        );
    }

    /**
     * @Route("/1", name="_1")
     */
    public function topic1(): Response
    {
        $question = $this->repository->findOneRandom(1);

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => 1,
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }

    /**
     * @Route("/2", name="_2")
     */
    public function topic2(): Response
    {
        $question = $this->repository->findOneRandom(2);

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => 2,
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }

    /**
     * @Route("/3", name="_3")
     */
    public function topic3(): Response
    {
        $question = $this->repository->findOneRandom(3);

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => 3,
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }

    /**
     * @Route("/4", name="_4")
     */
    public function topic4(): Response
    {
        $question = $this->repository->findOneRandom(4);

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => 4,
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }

    /**
     * @Route("/5", name="_5")
     */
    public function topic5(): Response
    {
        $question = $this->repository->findOneRandom(5);

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => 5,
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }

    /**
     * @Route("/6", name="_POL")
     */
    public function topic6(): Response
    {
        $question = $this->repository->findOneRandom(6);

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'lf' => 'POL',
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }
}
