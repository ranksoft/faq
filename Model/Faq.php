<?php
declare(strict_types=1);

namespace RANK\Faq\Model;

use Magento\Framework\Model\AbstractModel;
use RANK\Faq\Api\Data\FaqInterface;
use RANK\Faq\Model\ResourceModel\Faq as FaqResource;

class Faq extends AbstractModel implements FaqInterface
{
    public const CACHE_TAG = 'rank_faq';

    protected $_cacheTag = self::CACHE_TAG;

    protected $_eventPrefix = self::CACHE_TAG;

    protected $_idFieldName = FaqInterface::IDENTIFIER;

    public function _construct()
    {
        $this->_init(FaqResource::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->getData(self::IDENTIFIER) ? (int) $this->getData(self::IDENTIFIER) : null;
    }

    /**
     * @param ?int $id
     * @return $this
     */
    public function setId($id): self
    {
        return $this->setData(self::IDENTIFIER, $id);
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->getData(self::QUESTION);
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
        return $this->getData(self::ANSWER);
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
    public function getSortOrder(): int
    {
        return (int) $this->getData(self::SORT_ORDER);
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
        return (int) $this->getData(self::STATUS);
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
