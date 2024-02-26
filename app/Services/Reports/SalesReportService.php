<?php

namespace App\Services\Reports;

use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Services\Contracts\SaleServiceInterface;
use App\Services\Reports\Contracts\SalesReportServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class SalesReportService implements SalesReportServiceInterface
{
    public function __construct(
        protected SaleServiceInterface $saleService,
        protected SellerRepositoryInterface $sellerRepository,
    )
    {
        //
    }

    /**
     * Generate sales report.
     * 
     * @param  string $sellerId
     * 
     * @return Collection
     */
    public function generate(string $sellerId): stdClass
    {
        $date = date('Y-m-d');
        $salesData = $this->saleService->findSalesBySellerAndDate($sellerId, $date);
        $sales = [];
        $salesValues = [];
        $salesCommissions = [];

        foreach ($salesData as $sale)
        {
            $commission = $this->saleService->getCommission($sale->value);
            $sales[] = (object) [
                'value' => number_format($sale->value, 2, ',', '.'),
                'comission' => number_format($commission, 2, ',', '.'),
            ];

            array_push($salesValues, $sale->value);
            array_push($salesCommissions, $commission);
        }

        $data = [
            'date' => date('d/m/Y'),
            'seller' => $this->sellerRepository->findOneSeller($sellerId),
            'sales' => $sales,
            'salesTotal' => number_format($this->saleService->getTotalInValues($salesValues), 2, ',', '.'),
            'commissionTotal' => number_format($this->saleService->getTotalInValues($salesCommissions), 2, ',', '.'),
        ];
        return (object) $data;
    }
}