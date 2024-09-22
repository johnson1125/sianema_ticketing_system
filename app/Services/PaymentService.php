<?php
//  Author: Lim Yu Her
namespace App\Services;

use App\models\TicketTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Exception;

class PaymentService
{
    public static function getPaymentData($ticketTransactionId)
    {
        try {
            $response = Http::get('http://127.0.0.1:5002/api/get-payments?transactionID=' . $ticketTransactionId);
            if ($response->successful()) {
                XMLExtensionsService::convertJsonToXMLFile($response, 'payments', 'xml/paymentRecord.xml');
                $paymentDetails = XMLExtensionsService::XMLFileToHTML('xml/paymentRecord.xml', 'xsl/paymentRecord.xsl');
                return $paymentDetails;
            }
        } catch (Exception $e) {
            // Handle the exception or log it
            return redirect()->route('home');
        }
    }
}
