<?php

namespace App\Factory;

use App\Entity\Article;

class ArticleFactory
{
    public static function buildArticle(array $data): Article
    {
        $id = $data['id'] ?? 0;
        $url = $data['canonicalUrl'] ?? "";
        $headline = $data['headline'] ?? "";
        $seoHeadline = $data['teaserSEO']['headline'] ?? "";
        $kicker = $data['kicker'] ?? "";

        $article = new Article();
        $article->setId($id);
        $article->setUrl($url);
        $article->setHeadline($headline);
        $article->setSeoHeadline($seoHeadline);
        $article->setKicker($kicker);

        return $article;
    }
}
