<?php

class User
{

    /**
     * @var array
     */
    private array $articles = [];

    /**
     * @return array
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param array $articles
     */
    public function setArticles(array $articles): void
    {
        $this->articles = $articles;
    }

    public function addArticle(Article $article)
    {
        $article->setUser($this);
        $this->articles[] = $article;
    }

}