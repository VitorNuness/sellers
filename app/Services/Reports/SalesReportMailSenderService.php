<?php

namespace App\Services\Reports;

use App\Mail\ReportMail;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Services\Reports\Contracts\SalesReportMailSenderServiceInterface;
use App\Services\Reports\Contracts\SalesReportServiceInterface;
use Illuminate\Support\Facades\Mail;

class SalesReportMailSenderService implements SalesReportMailSenderServiceInterface
{
    public function __construct(
        protected SaleRepositoryInterface $saleRepository,
        protected SalesReportServiceInterface $salesReport,
    ) {
        //
    }

    /**
     * Send mails to sellers with sales daily.
     * 
     * @return void
     */
    public function sendMail(): void
    {
        $sellers = $this->saleRepository->getSellersWithSales();
        foreach ($sellers as $seller) {
            $report = $this->salesReport->generate($seller->seller->id);
            $mail = $seller->seller->mail;
            Mail::to($mail)->send(new ReportMail($report));
        }
    }
}
