<?php

namespace App\Service\Client\Http;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class BffClient
{
    const BFF_ENDPOINT_ARTICLE = "/api/article/";

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @var string
     */
    private $baseUrl;

    public function __construct(string $baseUrl, HttpClientInterface $client)
    {
        $this->httpClient = $client;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    private function getArticleEndpoint(): string
    {
        return $this->baseUrl . self::BFF_ENDPOINT_ARTICLE;
    }

    /**
     * @param int $articleId
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function fetchArticleData(int $articleId): array
    {
        $url = $this->getArticleEndpoint() . (string) $articleId;
        $response = $this->httpClient->request('GET', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        if ($response->getStatusCode() === Response::HTTP_OK) {
            return json_decode($response->getContent(), true);
        }

        return [];
    }
}
