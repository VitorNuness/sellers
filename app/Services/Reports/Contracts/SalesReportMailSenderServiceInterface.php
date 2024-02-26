<?php

namespace App\Services\Reports\Contracts;

interface SalesReportMailSenderServiceInterface
{
    /**
     * Send mails to sellers with sales daily.
     * 
     * @return void
     */
    public function sendMail(): void;
}