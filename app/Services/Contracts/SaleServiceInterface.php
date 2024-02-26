<?php

namespace App\Services\Contracts;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface SaleServiceInterface
{
    /**
     * Get all sales by seller.
     * 
     * @param  string $sellerId
     * 
     * @return Collection
     */
    public function findSalesBySeller(string $sellerId): Collection;

    /**
     * Get all sale by seller and date sale date.
     * 
     * @param  string $sellerId
     * @param  string $date
     * 
     * @return Collection
     */
    public function findSalesBySellerAndDate(string $sellerId, string $date): Collection;

    /**
     * Store a new sale to seller.
     * 
     * @param  array $saleData
     * 
     * @return Sale
     */
    public function storeSaleToSeller(array $saleData): Sale;

    /**
     * Get the total of sales.
     * 
     * @param  array $values
     * 
     * @return float
     */
    public function getTotalInValues(array $values): float;

    /**
     * Get the commission of sale.
     * 
     * @param  float $saleValue
     * 
     * @return float
     */
    public function getCommission(float $saleValue): float;

    /**
     * A list with sales with commission and seller data.
     * 
     * @param  string $sellerId
     * 
     * @return stdClass
     */
    public function listWithComissionAndSeller(string $sellerId): stdClass;
}