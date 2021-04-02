<?php
declare(strict_types=1);

namespace RANK\Faq\Model;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

abstract class AbstractRepository
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    abstract public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param AbstractCollection $collection
     */
    protected function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, AbstractCollection $collection): void
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param AbstractCollection $collection
     */
    protected function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, AbstractCollection $collection): void
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param AbstractCollection $collection
     */
    protected function addPagingToCollection(SearchCriteriaInterface $searchCriteria, AbstractCollection $collection): void
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }
}
