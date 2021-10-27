<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
	/**
	 * @Route("/", name="app_homepage")
	 */
	public function homepage()
	{
		return $this->render('question/homepage.html.twig');
	}

	/**
	 * @Route("/questions/{slug}", name="app_question_show")
	 */
	public function show($slug)
	{
		$answers = [
			'This is my fake answer numbre 1',
			'This is my fake answer numbre 2',
			'This is my fake answer numbre 3',
		];

		// dump($slug, $this);

		return $this->render('question/show.html.twig', [
			'question' => ucwords(str_replace('-', ' ', $slug)),
			'answers' => $answers,
		]);
	}
}