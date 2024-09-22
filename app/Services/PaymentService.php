<?php

namespace App\Services;

use App\models\TicketTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Exception;

class PaymentService
{
    public function getPaymentData($ticketTransactionId)
    {
        try {
            $response = Http::get('http://127.0.0.1:5001/api/get-payments?transactionID=' . $ticketTransactionId);
            if ($response->successful()) {
                XMLExtensionsService::convertJsonToXMLFile($response, 'get-payments', 'xml/paymentDetails.xml');
                $maintenance = XMLExtensionsService::XMLFileToHTML('xml/paymentDetails.xml', 'xsl/paymentRecord.xsl');
            }
        } catch (Exception $e) {
            // Handle the exception or log it
            return redirect()->route('home');
        }
    }
}
