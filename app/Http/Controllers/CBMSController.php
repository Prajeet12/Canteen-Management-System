<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CBMSController extends Controller
{
    public function index()
    {
        // Send the bill data to CBMS API
        $billResponse = $this->postBill();

        // Check the response and handle accordingly
        if (is_string($billResponse) && is_numeric($billResponse)) {
            // It seems $billResponse is an error code, handle it accordingly
            Log::error('CBMS API error: ' . $billResponse); // Log the error
            return "CBMS API error code " . $billResponse; // Return the error code
        } else {
            // Success case, you can handle the response here
            Log::info('Bill posted successfully');
            // You can return the success response or perform further actions
            return $billResponse;
        }
    }

    // Method to send bill data to CBMS API
    public function postBill()
    {
        $baseUrl = 'https://cbapi.ird.gov.np/api/bill'; // CBMS API endpoint

        // Define your bill data here...
        $requestData = [
            "username" => "Test_CBMS",
            "password" => "test@321",
            "seller_pan" => "999999999",
            "buyer_pan" => "PRAJEET SHRESTHA1",
            "buyer_name" => "123456789",
            "fiscal_year" => "2080.81",
            "invoice_number" => "TI80/81PAA/93",
            "invoice_date" => "2080.09.05",
            "total_sales" => 1289.9967,
            "taxable_sales_vat" => 1141.59,
            "vat" => 148.4067,
            "excisable_amount" => 0,
            "excise" => 0,
            "taxable_sales_hst" => 0,
            "hst" => 0,
            "amount_for_esf" => 0,
            "esf" => 0,
            "export_sales" => 0,
            "tax_exempted_sales" => 0,
            "isrealtime" => true,
            "datetimeclient" => "2023-12-21T17:49:14"

        ];

        try {
            // Send HTTP POST request to CBMS API
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->post($baseUrl, $requestData);

            $statusCode = $response->status();

            if ($statusCode === 200) {
                return $response->json(); // Return the response data
            } else {
                return $statusCode; // Return the HTTP status code as error
            }
        } catch (\Exception $e) {
            return $e->getMessage(); // Return the exception message as error
        }
    }



    public function postCreditNote()
    {
        $client = new Client(['base_uri' => 'https://cbapi.ird.gov.np']);

        $data = [
            "username" => "Test_CBMS",
            "password" => "test@321",
            "seller_pan" => "999999999",
            "buyer_pan" => "PRAJEET SHRESTHA1",
            "buyer_name" => "123456789",
            "fiscal_year" => "2080.81",
            "invoice_number" => "TI80/81PAA/93",
            "invoice_date" => "2080.09.05",
            "total_sales" => 1289.9967,
            "taxable_sales_vat" => 1141.59,
            "vat" => 148.4067,
            "excisable_amount" => 0,
            "excise" => 0,
            "taxable_sales_hst" => 0,
            "hst" => 0,
            "amount_for_esf" => 0,
            "esf" => 0,
            "export_sales" => 0,
            "tax_exempted_sales" => 0,
            "isrealtime" => true,
            "datetimeclient" => "2023-12-21T17:49:14"

        ];

        try {
            $response = $client->post('api/billreturn', [
                'json' => $data,
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                return $response->getBody()->getContents();
            } else {
                return "Error code " . $statusCode;
            }
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

