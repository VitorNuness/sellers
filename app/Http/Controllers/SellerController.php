<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Services\Contracts\SellerServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SellerController extends Controller
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
     * @return View
     */
    public function index(): View
    {
       $sellers = $this->sellerService->getAllSellers();
       return view('sellers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new seller.
     * 
     * @return View
     */
    public function create(): View
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created seller in storage.
     * 
     * @param  SellerStoreRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(SellerStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->sellerService->storeSeller($data);
        return redirect()->route('sellers.index');
    }

    /**
     * Display the specified seller.
     * 
     * @param  string $sellerId
     * 
     * @return View
     */
    public function show(string $sellerId): View
    {
        $seller = $this->sellerService->findOneSeller($sellerId);
        return view('sellers.show', compact('seller'));
    }

    /**
     * Show the form for editing the specified seller.
     * 
     * @param  string $sellerId
     * 
     * @return View
     */
    public function edit(string $sellerId): View
    {
        $seller = $this->sellerService->findOneSeller($sellerId);
        return view('sellers.edit', compact('seller'));
    }

    /**
     * Update the specified seller in storage.
     * 
     * @param  SellerUpdateRequest $request
     * @param  string $sellerId
     * 
     * @return RedirectResponse
     */
    public function update(SellerUpdateRequest $request, string $sellerId): RedirectResponse
    {
        $data = $request->validated();
        $this->sellerService->updateSeller($sellerId, $data);
        return redirect()->back();
    }

    /**
     * Remove the specified seller from storage.
     * 
     * @param  string $sellerId
     * 
     * @return RedirectResponse
     */
    public function destroy(string $sellerId): RedirectResponse
    {
        $this->sellerService->deleteSeller($sellerId);
        return redirect()->route('sellers.index');
    }
}
