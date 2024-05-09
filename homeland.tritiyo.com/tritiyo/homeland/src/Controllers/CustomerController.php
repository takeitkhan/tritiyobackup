<?php

namespace Tritiyo\Homeland\Controllers;

use Tritiyo\Homeland\Models\Customer;
use Tritiyo\Homeland\Repositories\Customer\CustomerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller
{
    /**
     * @var CustomerInterface
     */
    private $customer;

    /**
     * RoutelistController constructor.
     * @param customerInterface $customer
     */
    public function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer->getAll();
        return view('homeland::customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeland::customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
            ]
        );

        // process the login
        if ($validator->fails()) {
            return redirect('homeland::customer.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $attributes = [
                'name' => $request->name,
                'phone' => $request->phone,
                'company' => $request->company,
                'address' => $request->address,
                'mobile_bank_account' => $request->mobile_bank_account,
                'bank_account' => $request->bank_account,
            ];
            // dd($attributes);
            try {
                $customer = $this->customer->create($attributes);
                return redirect(route('customers.index'))->with(['status' => 1, 'message' => 'Successfully created']);
            } catch (\Exception $e) {
                return view('homeland::customer.create')->with(['status' => 0, 'message' => 'Error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('homeland::customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('homeland::customer.create', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Tritiyo\Vehicle\Models\Vehicle $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // store
        $attributes = [
            'name' => $request->name,
            'phone' => $request->phone,
            'company' => $request->company,
            'address' => $request->address,
            'mobile_bank_account' => $request->mobile_bank_account,
            'bank_account' => $request->bank_account,
        ];

        try {
            $customer = $this->customer->update($customer->id, $attributes);

            return redirect()->back()
                ->with('message', 'Successfully saved')
                ->with('status', 1)
                ->with('customer', $customer);
        } catch (\Exception $e) {
            return view('homeland::customer.edit', $customer->id)->with(['status' => 0, 'message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->customer->delete($id);
        return redirect()->back()->with(['status' => 1, 'message' => 'Successfully deleted']);
    }
}
