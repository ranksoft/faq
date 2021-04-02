<?php
declare(strict_types=1);

namespace RANK\Faq\Api;

/**
 * Interface FaqRepositoryInterface
 * @package RANK\Api
 * @api
 */
interface FaqRepositoryInterface
{
    /**
     * @param int $id
     * @return \RANK\Faq\Api\Data\FaqInterface
     */
    public function getById(int $id): \RANK\Faq\Api\Data\FaqInterface;

    /**
     * @param \RANK\Faq\Api\Data\FaqInterface $faq
     * @return \RANK\Faq\Api\Data\FaqInterface
     */
    public function save(\RANK\Faq\Api\Data\FaqInterface $faq): \RANK\Faq\Api\Data\FaqInterface;

    /**
     * @param \RANK\Faq\Api\Data\FaqInterface $faq
     * @return bool
     */
    public function delete(\RANK\Faq\Api\Data\FaqInterface $faq): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;

    /**
     * @param \Magento\Framework\Api\Search\SearchCriteriaInterface $searchCriteria
     * @return \RANK\Faq\Api\Data\FaqSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\Search\SearchCriteriaInterface $searchCriteria): \RANK\Faq\Api\Data\FaqSearchResultInterface;
}
