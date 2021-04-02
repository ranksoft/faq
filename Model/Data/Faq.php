<?php
declare(strict_types=1);

namespace RANK\Faq\Model\Data;

final class Faq extends \Magento\Framework\Api\AbstractSimpleObject implements \RANK\Faq\Api\Data\FaqInterface
{
    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->_get(self::IDENTIFIER) ? (int) $this->_get(self::IDENTIFIER) : null;
    }

    /**
     * @param ?int $id
     * @return $this
     */
    public function setId(?int $id): self
    {
        return $this->setData(self::IDENTIFIER, $id);
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->_get(self::QUESTION);
    }

    /**
     * @param string $question
     * @return $this
     */
    public function setQuestion(string $question): self
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->_get(self::ANSWER);
    }

    /**
     * @param string $answer
     * @return $this
     */
    public function setAnswer(string $answer): self
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * @return int
     */
    public function getSortOrder():int
    {
        return (int) $this->_get(self::SORT_ORDER);
    }

    /**
     * @param int $sortOrder
     * @return $this
     */
    public function setSortOrder(int $sortOrder): self
    {
        return $this->setData(self::SORT_ORDER, $sortOrder);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return (int) $this->_get(self::STATUS);
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self
    {
        return $this->setData(self::STATUS, $status);
    }
}
