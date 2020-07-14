<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={}
 * )
 */
class Article
{
    /**
     * @var int
     * @ApiProperty(identifier=true)
     */
    private $id = 0;

    /**
     * @var string
     */
    public $url = "";

    /**
     * @var string
     */
    public $headline;

    /**
     * @var string
     */
    public $seoHeadline;

    /**
     * @var string
     */
    public $kicker;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }

    /**
     * @return string
     */
    public function getKicker(): string
    {
        return $this->kicker;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getSeoHeadline(): string
    {
        return $this->seoHeadline;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $headline
     */
    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    /**
     * @param string $kicker
     */
    public function setKicker(string $kicker): void
    {
        $this->kicker = $kicker;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param string $seoHeadline
     */
    public function setSeoHeadline(string $seoHeadline): void
    {
        $this->seoHeadline = $seoHeadline;
    }
}
