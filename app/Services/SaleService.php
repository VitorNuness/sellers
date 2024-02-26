<?php

namespace App\Services;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Services\Contracts\SaleServiceInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class SaleService implements SaleServiceInterface
{

    public function __construct(
        protected SaleRepositoryInterface $saleRepository,
        protected float $commision = 8.5,
    ) {
        //
    }

    /**
     * Get all sales by seller.
     * 
     * @param  string $sellerId
     * 
     * @return Collection
     */
    public function findSalesBySeller(string $sellerId): Collection
    {
        return $this->saleRepository->findSalesBySeller($sellerId);
    }

    /**
     * Get all sale by seller and date sale date.
     * 
     * @param  string $sellerId
     * @param  string $date
     * 
     * @return Collection
     */
    public function findSalesBySellerAndDate(string $sellerId, string $date): Collection
    {
        return $this->saleRepository->findSalesBySellerAndDate($sellerId, $date);
    }

    /**
     * Store a new sale to seller.
     * 
     * @param  array $saleData
     * 
     * @return Sale
     */
    public function storeSaleToSeller(array $saleData): Sale
    {
        return $this->saleRepository->storeSaleToSeller($saleData);
    }

    /**
     * A list with sales with commission and seller data.
     * 
     * @param  string $sellerId
     * 
     * @return stdClass
     */
    public function listWithComissionAndSeller(string $sellerId): stdClass
    {
        $sales = $this->findSalesBySeller($sellerId);
        $newSalesData = [];

        foreach ($sales as $sale) {
            $comission = $this->getCommission($sale->value);
            $data = [
                'sellerId' => $sale->seller->id,
                'sellerName' => $sale->seller->name,
                'sellerMail' => $sale->seller->mail,
                'commission' => number_format($comission, 2, ',', '.'),
                'saleValue' => number_format($sale->value, 2, ',', '.'),
                'saleDate' => Carbon::make($sale->created_at)->format('d/m/Y'),
            ];
            $newSalesData[] = (object) $data;
        }
        return (object) $newSalesData;
    }

    /**
     * Get the total of sales.
     * 
     * @param  array $values
     * 
     * @return float
     */
    public function getTotalInValues(array $values): float
    {
        $total = 0;
        foreach ($values as $key => $value) {
            $total += $value;
        }
        return round($total, 2);
    }

    /**
     * Get the commission of sale.
     * 
     * @param  float $saleValue
     * 
     * @return float
     */
    public function getCommission(float $saleValue): float
    {
        return round(($this->commision * $saleValue) / 100, 2);
    }
}
