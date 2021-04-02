<?php
declare(strict_types=1);

namespace RANK\Faq\Api;

/**
 * Interface FaqManagementInterface
 * @package RANK\Api
 * @api
 */
interface FaqManagementInterface
{
    /**
     * Provide the number of faq count
     *
     * @return int
     */
    public function getCount(): int;
}
