<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAddress;
use DB;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function showCustomers()
    {
        return response()->json(Customer::all());
    }

    public function showCustomer($id)
    {
        $customer = Customer::find($id);
        if ($customer == null) {
            $code = 404;
            $response = ['message' => 'Customer not found'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customer);
            return $result;
        }
    }

    public function showCustomerAddress($customer_id)
    {
        $customerAddress = CustomerAddress::find($customer_id);
        if ($customerAddress == null) {
            $code = 404;
            $response = ['message' => 'Address not found'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customerAddress);
            return $result;
        }
    }

    public function showCustomersByCompanyId($company_id)
    {
        $customers = DB::table('customers')->where('company_id', '=', $company_id)->get();
        if (count($customers) !== null) {
            $code = 404;
            $response = ['message' => 'No customers with this company ID'];
            header("content-type: application/json", true, $code);
            echo json_encode($response);
        } else {
            $result = response()->json($customers);
            return $result;
        }
    }
}
