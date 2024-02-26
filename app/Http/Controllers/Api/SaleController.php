<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStoreRequest;
use App\Http\Resources\SaleResource;
use App\Services\Contracts\SaleServiceInterface;
use App\Services\Reports\Contracts\SalesReportServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use stdClass;

class SaleController extends Controller
{
    public function __construct(
        protected SaleServiceInterface $saleService,
        protected SalesReportServiceInterface $salesReport
    ) {
        //
    }

    /**
     * Display a listing of the sales by seller id.
     * 
     * @param  string $sellerId
     * 
     * @return stdClass
     */
    public function show(string $sellerId): stdClass
    {
        $sales = $this->saleService->listWithComissionAndSeller($sellerId);
        return $sales;
    }

    /**
     * Store a newly created sale in storage.
     * 
     * @param  SaleStoreRequest $request
     * 
     * @return SaleResource
     */
    public function store(SaleStoreRequest $request): SaleResource
    {
        $data = $request->validated();
        $sale = $this->saleService->storeSaleToSeller($data);
        return new SaleResource($sale);
    }

    public function report(string $sellerId): View
    {
        $report = $this->salesReport->generate($sellerId);
        return view('mails.report', compact('report'));
    }
}
