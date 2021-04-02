<?php
declare(strict_types=1);

namespace RANK\Faq\Model;

use RANK\Faq\Api\FaqManagementInterface;
use RANK\Faq\Model\ResourceModel\Faq\CollectionFactory;

class FaqManagement implements FaqManagementInterface
{
    protected CollectionFactory $customersFactory;

    /**
     * @param CollectionFactory $customersFactory
     */
    public function __construct(CollectionFactory $customersFactory)
    {
        $this->customersFactory = $customersFactory;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        $faqs = $this->customersFactory->create();
        return $faqs->getSize();
    }
}
