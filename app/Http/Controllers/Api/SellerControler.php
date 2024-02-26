<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Http\Resources\SellerResource;
use App\Services\Contracts\SellerServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SellerControler extends Controller
{
    public function __construct(
        protected SellerServiceInterface $sellerService,
    )
    {
        //
    }

    /**
     * Display a listing of the sellers.
     * 
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $sellers = $this->sellerService->getAllSellers();
        return SellerResource::collection($sellers);
    }

    /**
     * Store a newly created seller in storage.
     * 
     * @param  SellerStoreRequest
     * 
     * @return SellerResource
     */
    public function store(SellerStoreRequest $request): SellerResource
    {
        $data = $request->validated();
        $seller = $this->sellerService->storeSeller($data);
        return new SellerResource($seller);
    }

    /**
     * Display the specified seller.
     * 
     * @param  string $id
     * 
     * @return SellerResource
     */
    public function show(string $id): SellerResource
    {
        $seller = $this->sellerService->findOneSeller($id);
        return new SellerResource($seller);
    }

    /**
     * Update the specified seller in storage.
     * 
     * @param  SellerUpdateRequest
     * @param  string $id
     * 
     * @return SellerResource
     */
    public function update(SellerUpdateRequest $request, string $id): SellerResource
    {
        $data = $request->validated();
        $seller = $this->sellerService->updateSeller($id, $data);
        return new SellerResource($seller);
    }

    /**
     * Remove the specified seller from storage.
     * 
     * @param  string $id
     * 
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $this->sellerService->deleteSeller($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
