<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
	/**
	 * @Route("/")
	 */
	public function homepage()
	{
		return new Response('First page.');
	}

	/**
	 * @Route("/questions/{slug}")
	 */
	public function show($slug)
	{
		$answers = [
			'This is my fake answer numbre 1',
			'This is my fake answer numbre 2',
			'This is my fake answer numbre 3',
		];

//		dump($slug, $this);

		return $this->render('question/show.html.twig', [
			'question' => ucwords(str_replace('-', ' ', $slug)),
			'answers' => $answers,
		]);
	}
}