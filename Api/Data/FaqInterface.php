<?php
declare(strict_types=1);

namespace RANK\Faq\Api\Data;

/**
 * Interface FaqInterface
 * @package RANK\Api\Data
 * @api
 */
interface FaqInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**#@+
     * Constants
     * @var string
     */
    public const TABLE_NAME = 'rank_faq';
    public const IDENTIFIER = 'entity_id';
    public const QUESTION = 'question';
    public const ANSWER = 'answer';
    public const SORT_ORDER = 'sort_order';
    public const STATUS = 'status';

    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @param ?int $id
     * @return $this
     */
    public function setId(?int $id): self;

    /**
     * @return string
     */
    public function getQuestion(): string;

    /**
     * @param string $question
     * @return $this
     */
    public function setQuestion(string $question): self;

    /**
     * @return string
     */
    public function getAnswer(): string;

    /**
     * @param string $answer
     * @return $this
     */
    public function setAnswer(string $answer): self;

    /**
     * @return int
     */
    public function getSortOrder(): int;

    /**
     * @param int $sortOrder
     * @return $this
     */
    public function setSortOrder(int $sortOrder): self;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self;
}
