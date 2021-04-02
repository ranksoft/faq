<?php
declare(strict_types = 1);

namespace RANK\Faq\Api\Data;

interface FaqSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \RANK\Faq\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * @param \RANK\Faq\Api\Data\FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
