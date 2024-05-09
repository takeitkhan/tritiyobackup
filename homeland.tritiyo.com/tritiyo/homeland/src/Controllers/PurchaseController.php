<?php

namespace Tritiyo\Homeland\Controllers;

use Tritiyo\Homeland\Models\Purchase;
use Tritiyo\Homeland\Models\Customer;
use Tritiyo\Homeland\Repositories\Purchase\PurchaseInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class PurchaseController extends Controller
{
    /**
     * @var PurchaseInterface
     */
    private $purchase;

    /**
     * RoutelistController constructor.
     * @param PurchaseInterface $purchase
     */
    public function __construct(PurchaseInterface $purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = $this->purchase->getAll();
        return view('homeland::purchase.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeland::purchase.create');
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
                'bolgate_id' => 'required'
            ]
        );

        // process the login
        if ($validator->fails()) {
            return redirect('homeland::purchase.index')
                ->withErrors($validator)
                ->withInput();
        } else {

            // store
            $attributes = [
                'sand_type' => $request->sand_type,
                'bolgate_id' => $request->bolgate_id,
                'date' => $request->date,
                'per_unit_amount' => $request->per_unit_amount,
                'loading_cost' => $request->loading_cost,
                'bolgate_cost' => $request->bolgate_cost,
                'unloading_cost' => $request->unloading_cost,
                "actual_amount" => $request->actual_amount,
                "qty" => $request->qty,
                'amount' => $request->amount,
                'note' => $request->note,
                'target_sale_amount' => $request->target_sale_amount,

            ];
            //dd($attributes);
            try {
                $purchase = $this->purchase->create($attributes);
                return redirect(route('purchases.index'))->with(['status' => 1, 'message' => 'Successfully created']);
            } catch (\Exception $e) {
                return view('homeland::purchase.create')->with(['status' => 0, 'message' => 'Error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('homeland::purchase.show', ['purchase' => $purchase]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('homeland::purchase.create', ['purchase' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Tritiyo\Vehicle\Models\Vehicle $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        // store
        $attributes = [
            'sand_type' => $request->sand_type,
            'bolgate_id' => $request->bolgate_id,
            'date' => $request->date,
            'per_unit_amount' => $request->per_unit_amount,
            'loading_cost' => $request->loading_cost,
            'bolgate_cost' => $request->bolgate_cost,
            'unloading_cost' => $request->unloading_cost,
            "actual_amount" => $request->actual_amount,
            "qty" => $request->qty,
            'amount' => $request->amount,
            'note' => $request->note,
            'target_sale_amount' => $request->target_sale_amount,
        ];

        try {
            $purchase = $this->purchase->update($purchase->id, $attributes);

            return redirect()->back()
                ->with('message', 'Successfully saved')
                ->with('status', 1)
                ->with('purchase', $purchase);
        } catch (\Exception $e) {
            return view('homeland::purchase.edit', $purchase->id)->with(['status' => 0, 'message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->purchase->delete($id);
        return redirect()->back()->with(['status' => 1, 'message' => 'Successfully deleted']);
    }
}
