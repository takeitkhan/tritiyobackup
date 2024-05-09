<?php

namespace Tritiyo\Homeland\Controllers;

use Tritiyo\Homeland\Models\Income;
use Tritiyo\Homeland\Models\Customer;
use Tritiyo\Homeland\Repositories\Income\IncomeInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class IncomeController extends Controller
{
    /**
     * @var IncomeInterface
     */
    private $income;

    /**
     * RoutelistController constructor.
     * @param IncomeInterface $income
     */
    public function __construct(IncomeInterface $income)
    {
        $this->income = $income;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = $this->income->getAll();
        return view('homeland::income.index', ['incomes' => $incomes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeland::income.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),
            [
                'ledger_id' => 'required',
            ]
        );

        // process the login
        if ($validator->fails()) {
            return redirect('homeland::income.index')
                ->withErrors($validator)
                ->withInput();
        } else {

            if($request->customer_type == 'new'){
                $customerAttr = [
                    'name' => $request->customer_name,
                    'phone' => $request->customer_phone,
                    'company' => $request->customer_company,
                ];
                $customerStore = Customer::create($customerAttr);
                $customerId = $customerStore->id;
            }elseif($request->customer_type == 'existing'){
                $customerId = $request->transaction_with;
            }

            // store
            $attributes = [
                'ledger_id' => $request->ledger_id,
                'transaction_with' => $customerId,
                'transaction_with_type' => 'customer',
                'note' => $request->note,
                'date' => $request->date,
                'payment_type' => $request->payment_type,
                'truck_number' => $request->truck_number,
                'token_number' => $request->token_number,
                "per_unit_amount" => $request->per_unit_amount,
                "qty" => $request->qty,
                "actual_amount" => $request->actual_amount,
                "discount" => $request->discount,
                'amount' => $request->amount,
            ];
            // dd($attributes);
            try {
                $income = $this->income->create($attributes);
                return redirect(route('incomes.index'))->with(['status' => 1, 'message' => 'Successfully created']);
            } catch (\Exception $e) {
                return view('homeland::income.create')->with(['status' => 0, 'message' => 'Error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('homeland::income.show', ['income' => $income]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('homeland::income.create', ['income' => $income]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Tritiyo\Vehicle\Models\Vehicle $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        if($request->transaction_with_type == 'bolgate'){
            $reference = \Tritiyo\Homeland\Models\Bolgate::where('id', $request->transaction_with)->first()->phone;
        }elseif($request->transaction_with_type == 'staff'){
            $reference = \App\Models\User::where('id', $request->transaction_with)->first()->phone;
        }elseif($request->transaction_with_type == 'other'){
            $reference = $request->reference;
        }
        // store
        $attributes = [
            'ledger_id' => $request->ledger_id,
            'transaction_with' => $request->transaction_with,
            'transaction_with_type' => 'customer',
            'note' => $request->note,
            'date' => $request->date,
            'payment_type' => $request->payment_type,
            'truck_number' => $request->truck_number,
            'token_number' => $request->token_number,
            "per_unit_amount" => $request->per_unit_amount,
            "qty" => $request->qty,
            "actual_amount" => $request->actual_amount,
            "discount" => $request->discount,
            'amount' => $request->amount,
        ];

        try {
            $income = $this->income->update($income->id, $attributes);

            return redirect()->back()
                ->with('message', 'Successfully saved')
                ->with('status', 1)
                ->with('income', $income);
        } catch (\Exception $e) {
            return view('homeland::income.edit', $income->id)->with(['status' => 0, 'message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $income
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->income->delete($id);
        return redirect()->back()->with(['status' => 1, 'message' => 'Successfully deleted']);
    }
}
