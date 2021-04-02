<?php
declare(strict_types=1);

namespace RANK\Faq\Model;

use Magento\Framework\Api\SearchResults;
use RANK\Faq\Api\Data\FaqSearchResultInterface;

class FaqSearchResult extends SearchResults implements FaqSearchResultInterface
{
}

