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

        // if we want to add addresses as well, we can add the below:
        // MARCUS' CODE:
        // return response()->json(Customer::with(['address'])->get());
        // in the case that we want to add several relations, to include several tables,
        // we would have written
        // return response()->json(Customer::with(['address.something2.something3'])->get());
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

        // MARCUS' CODE:
        //
        // $response = Customer::find($id) ?? ['message => 'Customer not found'];
        // $statusCode = (is_object($response)) ? 200 : 400;
        // return response()->json($response, $statusCode);
        //
        // Note: the double question mark is new from PHP7 and means if the statement is false
        // then do the following. So if Customer ID does not exist, then return the json message stated.
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

        // MARCUS' code, simply:
        // $customers = Customer::whereCompanyId($id)->get();
        // return response()->json($customers);

    }
}
