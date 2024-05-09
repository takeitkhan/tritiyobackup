<?php

namespace Tritiyo\Homeland\Controllers;

use Tritiyo\Homeland\Models\Expense;
use Tritiyo\Homeland\Repositories\Expense\ExpenseInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ExpenseController extends Controller
{
    /**
     * @var ExpenseInterface
     */
    private $expense;

    /**
     * RoutelistController constructor.
     * @param ExpenseInterface $expense
     */
    public function __construct(ExpenseInterface $expense)
    {
        $this->expense = $expense;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = $this->expense->getAll();
        return view('homeland::expense.index', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeland::expense.create');
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
            return redirect('homeland::expense.index')
                ->withErrors($validator)
                ->withInput();
        } else {

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
                'transaction_with_type' => $request->transaction_with_type,
                'reference' => $reference,
                'note' => $request->note,
                'date' => $request->date,
                'payment_type' => $request->payment_type,
                'amount' => $request->amount,
            ];
            // dd($attributes);
            try {
                $expense = $this->expense->create($attributes);
                return redirect(route('expenses.index'))->with(['status' => 1, 'message' => 'Successfully created']);
            } catch (\Exception $e) {
                return view('homeland::expense.create')->with(['status' => 0, 'message' => 'Error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('homeland::expense.show', ['expense' => $expense]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('homeland::expense.create', ['expense' => $expense]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Tritiyo\Vehicle\Models\Vehicle $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
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
            'transaction_with_type' => $request->transaction_with_type,
            'reference' => $reference,
            'note' => $request->note,
            'date' => $request->date,
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
        ];

        try {
            $expense = $this->expense->update($expense->id, $attributes);

            return redirect()->back()
                ->with('message', 'Successfully saved')
                ->with('status', 1)
                ->with('expense', $expense);
        } catch (\Exception $e) {
            return view('homeland::expense.edit', $expense->id)->with(['status' => 0, 'message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->expense->delete($id);
        return redirect()->back()->with(['status' => 1, 'message' => 'Successfully deleted']);
    }
}
