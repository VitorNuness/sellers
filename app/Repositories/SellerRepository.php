<?php

namespace App\Repositories;

use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SellerRepository implements SellerRepositoryInterface
{
    public function __construct(
        protected Seller $sellerModel,
    )
    {
        //
    }

    /**
     * Return all sellers.
     * 
     * @return Collection
     */
    public function getAllSellers(): Collection
    {
        return $this->sellerModel->all();
    }

    /**
     * Return one seller.
     * 
     * @param  string $sellerId
     * 
     * @return Seller
     */
    public function findOneSeller(string $sellerId): Seller
    {
        return $this->sellerModel->findOrFail($sellerId);
    }

    /**
     * Store a new seller.
     * 
     * @param  array $sellerData
     * 
     * @return Seller
     */
    public function storeSeller(array $sellerData): Seller
    {
        return $this->sellerModel->create($sellerData);
    }

    /**
     * Update a seller data.
     * 
     * @param  string $sellerId
     * @param  array $sellerData
     * 
     * @return Seller
     */
    public function updateSeller(string $sellerId, array $sellerData): Seller
    {
        $seller = $this->sellerModel->findOrFail($sellerId);
        $seller->update($sellerData);
        return $seller;
    }

    /**
     * Delete a seller.
     * 
     * @param  string $sellerId
     * 
     * @return void
     */
    public function deleteSeller(string $sellerId): void
    {
        $this->sellerModel->findOrFail($sellerId)->delete();
    }
}