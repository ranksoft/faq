<?php
declare(strict_types=1);

namespace RANK\Faq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use RANK\Faq\Model\Faq;
use RANK\Faq\Model\ResourceModel\Faq as FaqResource;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(Faq::class, FaqResource::class);
    }
}
