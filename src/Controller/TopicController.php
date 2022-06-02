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
    /* todo: remove this const and update the index method, after the db for display_type is updated */
    private const MAP_PARTIAL_TITLE = [
        'Freitext' => 'free_text',
        'Eine Einzelne Antwortmoeglichkeit' => 'radio',
        'Eine Einzelnes Wort' => 'string_comparison',
        'Rechenaufgabe' => 'string_comparison',
        'Stringvergleich' => 'string_comparison',
        'Mehrfachauswahl' => 'checkbox',

    ];

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
                'partial' => self::MAP_PARTIAL_TITLE[$title],
            ]
        );
    }
}
