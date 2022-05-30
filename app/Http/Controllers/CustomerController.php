<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCustomersRequest;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    const NUM_CUSTOMERS_ON_PAGE = 10;

    public function allCustomers(Request $request)
    {
        $validatedRequest = $request->validate([
            'blocked' => ['nullable', 'boolean'],
            'name' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email'],
        ]);

        $customers = Customer::query();

        if (isset($validatedRequest['name']) && $validatedRequest['name']) {
            $customers->byFullName($validatedRequest['name']);
        }
        if (isset($validatedRequest['blocked'])) {
            $customers->byBlocked($validatedRequest['blocked']);
        }
        if (isset($validatedRequest['email']) && $validatedRequest['email']) {
            $customers->byEmail($validatedRequest['email']);
        }
        if (isset($validatedRequest['phone']) && $validatedRequest['phone']) {
            $customers->byPhone($validatedRequest['phone']);
        }

        return view('customers', ['customers' => $customers->paginate(self::NUM_CUSTOMERS_ON_PAGE)->withQueryString()]);
    }

    public function detailCustomer(int $id)
    {
        $customer = Customer::with(['adresses' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->find($id);

        return view('customer', ['customer' => $customer]);
    }
}
