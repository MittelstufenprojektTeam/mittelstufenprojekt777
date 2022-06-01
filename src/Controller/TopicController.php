<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\QuestionRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/topic", name="topic_")
 */
class TopicController extends AbstractController
{
    private const MAP_PARTIAL_TITLE = [
        'Freitext' => 'free-text',
        'Eine Einzelne Antwortmoeglichkeit' => 'radio',
        'Eine Einzelnes Wort' => 'string-comparison',
        'Rechenaufgabe' => 'string-comparison',
        'Stringvergleich' => 'string-comparison',
        'Mehrfachauswahl' => 'checkbox',

    ];

    /**
     * @Route("/", name="index")
     */
    public function topic(QuestionRepository $repository): Response
    {
        $question = $repository->findOneRandom();

        $title = $question?->getDisplayType()?->getTitle();
        if (!$title) {
            throw new Exception('Some cool error msg');
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
