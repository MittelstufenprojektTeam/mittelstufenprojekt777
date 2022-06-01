<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Question;
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

        // todo: get random question
        // todo: pass question to template
        // todo: at click next render another random question

        $title = $question?->getDisplayType()?->getTitle();
        $question->getOptions()->getValues();
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

    /**
     * @Route("/1", name="1")
     */
    public function topic1(): Response
    {
        return $this->render('topic/topic1.html.twig', []);
    }

    /**
     * @Route("/2", name="2")
     */
    public function topic2(): Response
    {
        return $this->render('topic/topic2.html.twig', []);
    }

    /**
     * @Route("/3", name="3")
     */
    public function topic3(): Response
    {
        return $this->render('topic/topic3.html.twig', []);
    }

    /**
     * @Route("/4", name="4")
     */
    public function topic4(): Response
    {
        return $this->render('topic/topic4.html.twig', []);
    }

    /**
     * @Route("/5", name="5")
     */
    public function topic5(): Response
    {
        return $this->render('topic/topic5.html.twig', []);
    }

    /**
     * @Route("/6", name="6")
     */
    public function topic6(): Response
    {
        return $this->render('topic/topic6.html.twig', []);
    }
}
