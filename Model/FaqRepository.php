<?php
declare(strict_types=1);

namespace RANK\Faq\Model;

use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use RANK\Faq\Api\Data\FaqInterface;
use RANK\Faq\Api\Data\FaqSearchResultInterface;
use RANK\Faq\Api\FaqRepositoryInterface;
use RANK\Faq\Api\Data\FaqSearchResultInterfaceFactory;
use RANK\Faq\Model\ResourceModel\Faq as ResourceModel;
use RANK\Faq\Model\ResourceModel\Faq\CollectionFactory;

class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{
    protected FaqSearchResultInterfaceFactory $searchResultFactory;

    protected CollectionFactory $collectionFactory;

    protected ResourceModel $resource;

    protected FaqFactory $factory;

    protected ExtensibleDataObjectConverter $extensibleDataObjectConverter;

    protected EntityManager $entityManager;

    /**
     * @param CollectionFactory $collectionFactory
     * @param FaqSearchResultInterfaceFactory $searchResultFactory
     * @param ResourceModel $resource
     * @param FaqFactory $factory
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     * @param EntityManager $entityManager
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        FaqSearchResultInterfaceFactory $searchResultFactory,
        ResourceModel $resource,
        FaqFactory $factory,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        EntityManager $entityManager
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->resource = $resource;
        $this->factory = $factory;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->entityManager = $entityManager;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return FaqSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): FaqSearchResultInterface
    {
        $collection = $this->collectionFactory->create();
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        $collection->load();

        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @param int $id
     * @return FaqInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): FaqInterface
    {
        $faq = $this->factory->create();
        $this->resource->load($faq, $id);
        if (!$faq->getId()) {
            throw new NoSuchEntityException(__('Faq with id "%1" does not exist.', $id));
        }
        return $faq;
    }

    /**
     * @param FaqInterface $faq
     * @return FaqInterface
     * @throws CouldNotSaveException
     */
    public function save(FaqInterface $faq): FaqInterface
    {
        try {
            //todo: this code for example.
            /** Variant First For this variant, the implementation of the service contract must be a model. */
//            $this->resource->save($faq);
            /**  Variant Second For this option, the implementation of the contract service must extends from ExtensibleDataInterface and the DTO class must extends AbstractExtensibleModel or AbstractSimpleObject. */
            $faqData = $this->extensibleDataObjectConverter->toNestedArray($faq, [], FaqInterface::class);
            $faqModel = $this->factory->create(['data' => $faqData]);
            $faqModel->setId($faq->getId());
            $this->resource->save($faqModel);
            /**  Variant Third For this option, the implementation of the service contract must be the DTO class and the DTO class must extends AbstractExtensibleModel or AbstractSimpleObject.  */
//            $this->entityManager->save($faq);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the faq: %1',
                $exception->getMessage()
            ));
        }

        return $faq;
    }

    /**
     * @param FaqInterface $faq
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(FaqInterface $faq): bool
    {
        try {
            $this->resource->delete($faq);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Faq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->getById($id));
    }
}
