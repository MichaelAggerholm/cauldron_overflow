<?php

namespace App\service;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Contracts\Cache\CacheInterface;

class MarkdownHelper
{
	// Dependency Injection start
	private $markdownParser;
	private $cache;

	public function __construct(MarkdownParserInterface $markdownParser, CacheInterface $cache)
	{
		$this->markdownParser = $markdownParser;
		$this->cache = $cache;
	}
	// Dependency Injection end

	public function parse(string $source): string
	{
		return $this->cache->get('markdown_'.md5($source), function() use($source)
		{
			return $this->markdownParser->transformMarkdown($source);
		});
	}
}