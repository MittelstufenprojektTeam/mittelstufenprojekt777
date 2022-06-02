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
    /**
     * @Route("/", name="_index")
     */
    public function topic(QuestionRepository $repository): Response
    {
        $question = $repository->findOneRandom();

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception(sprintf('displaytype for question with id %s could not be found', $question?->getId()));
        }

        return $this->render(
            'topic/index.html.twig',
            [
                'question' => $question,
                'partial' => str_replace('-', '_', $title),
            ]
        );
    }
}
