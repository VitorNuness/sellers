<?php

namespace App\Services;

use App\Models\Seller;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Services\Contracts\SellerServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class SellerService implements SellerServiceInterface
{
    public function __construct(
        protected SellerRepositoryInterface $sellerRepository,
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
        return $this->sellerRepository->getAllSellers();
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
        return $this->sellerRepository->findOneSeller($sellerId);
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
        return $this->sellerRepository->storeSeller($sellerData);
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
        return $this->sellerRepository->updateSeller($sellerId, $sellerData);
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
        $this->sellerRepository->deleteSeller($sellerId);
    }
}