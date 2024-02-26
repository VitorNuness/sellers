<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SaleRepository implements SaleRepositoryInterface
{

    public function __construct(
        protected Sale $saleModel,
    )
    {
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
        return $this->saleModel->all()
                               ->where('seller_id', $sellerId);
    }

    /**
     * Get all sales by seller and sale date.
     * 
     * @param  string $sellerId
     * 
     * @return Collection
     */
    public function findSalesBySellerAndDate(string $sellerId, string $date): Collection
    {
        return $this->saleModel->whereDate('created_at', $date)
                               ->where('seller_id', $sellerId)
                               ->get();
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
        return $this->saleModel->create(
            [
                'seller_id' => $saleData['seller'],
                'value' => $saleData['value'],
            ],
        );
    }

    /**
     * Get sellerts with have sales on daly.
     * 
     * @return Collection
     */
    public function getSellersWithSales(): Collection
    {
        $date = date('Y-m-d');
        return $this->saleModel->select('seller_id')
                               ->with('seller')
                               ->whereDate('created_at', $date)
                               ->groupBy('seller_id')
                               ->get();
    }
}