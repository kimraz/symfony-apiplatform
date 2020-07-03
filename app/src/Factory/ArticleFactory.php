<?php

namespace App\Factory;

use App\Entity\Article;

class ArticleFactory
{
    public static function buildArticle(array $data): Article
    {
        $id = $data['id'] ?? 0;
        $headline = $data['headline'] ?? "";
        $kicker = $data['kicker'] ?? "";

        $article = new Article();
        $article->setId($id);
        $article->setHeadline($headline);
        $article->setKicker($kicker);

        return $article;
    }
}
