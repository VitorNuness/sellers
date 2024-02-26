<?php

namespace App\Services\Reports\Contracts;

use Illuminate\Support\Collection;
use stdClass;

interface SalesReportServiceInterface
{
    /**
     * Generate sales report.
     * 
     * @param string $sellerId
     * 
     * @return stdClass
     */
    public function generate(string $sellerId): stdClass;
}