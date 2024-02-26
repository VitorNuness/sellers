<?php

namespace App\Services\Contracts;

use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface SellerServiceInterface
{
    /**
     * Return all sellers.
     * 
     * @return Collection
     */
    public function getAllSellers(): Collection;

    /**
     * Return one seller.
     * 
     * @param  string $sellerId
     * 
     * @return Seller
     */
    public function findOneSeller(string $id): Seller;

    /**
     * Store a new seller.
     * 
     * @param  array $sellerData
     * 
     * @return Seller
     */
    public function storeSeller(array $sellerData): Seller;

    /**
     * Update a seller data.
     * 
     * @param  string $sellerId
     * @param  array $sellerData
     * 
     * @return Seller
     */
    public function updateSeller(string $sellerId, array $sellerData): Seller;

    /**
     * Delete a seller.
     * 
     * @param  string $sellerId
     * 
     * @return void
     */
    public function deleteSeller(string $sellerId): void;
}