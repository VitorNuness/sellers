<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleStoreRequest;
use App\Services\Contracts\SaleServiceInterface;
use App\Services\Reports\Contracts\SalesReportServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
     * @return View
     */
    public function show(string $sellerId): View
    {
        $sales = $this->saleService->listWithComissionAndSeller($sellerId);
        return view('sales.sales', compact('sales', 'sellerId'));
    }

    /**
     * Show the form for creating a new sale.
     * 
     * @return  View
     */
    public function create(): View
    {
        return view('sales.create');
    }

    /**
     * Store a newly created sale in storage.
     * 
     * @param  SaleStoreRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(SaleStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->saleService->storeSaleToSeller($data);
        return redirect()->back();
    }

    public function report(string $sellerId): View
    {
        $report = $this->salesReport->generate($sellerId);
        return view('mails.report', compact('report'));
    }
}
