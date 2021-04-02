<?php
declare(strict_types=1);

namespace RANK\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use RANK\Faq\Api\Data\FaqInterface;

class Faq extends AbstractDb
{
    public function _construct()
    {
        $this->_init(FaqInterface::TABLE_NAME, FaqInterface::IDENTIFIER);
    }
}
