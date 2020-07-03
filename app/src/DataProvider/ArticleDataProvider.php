<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Article;
use App\Factory\ArticleFactory;
use App\Service\Client\Http\BffClient;

final class ArticleDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var BffClient
     */
    private $bffClient;

    public function __construct(BffClient $bffClient)
    {
        $this->bffClient = $bffClient;
    }

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Article::class === $resourceClass;
    }

    /**
     * @param string $resourceClass
     * @param array|int|string $id
     * @param string|null $operationName
     * @param array $context
     * @return Article|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Article
    {
        $id = (int) $id;
        $articleData = $this->bffClient->fetchArticleData($id);
        $article = ArticleFactory::buildArticle($articleData);

        return $article;
    }
}
