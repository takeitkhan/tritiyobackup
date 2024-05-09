<?php

namespace Tritiyo\Homeland\Controllers;

use Tritiyo\Homeland\Models\Ledger;
use Tritiyo\Homeland\Repositories\Ledger\LedgerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class LedgerController extends Controller
{
    /**
     * @var LedgerInterface
     */
    private $ledger;

    /**
     * RoutelistController constructor.
     * @param ledgerInterface $ledger
     */
    public function __construct(LedgerInterface $ledger)
    {
        $this->ledger = $ledger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgers = $this->ledger->getAll();
        return view('homeland::ledger.index', ['ledgers' => $ledgers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeland::ledger.create');
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
            return redirect('homeland::ledger.index')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $attributes = [
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
            ];
            // dd($attributes);
            try {
                $ledger = $this->ledger->create($attributes);
                return redirect(route('ledgers.index'))->with(['status' => 1, 'message' => 'Successfully created']);
            } catch (\Exception $e) {
                return view('homeland::ledger.create')->with(['status' => 0, 'message' => 'Error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $ledger
     * @return \Illuminate\Http\Response
     */
    public function show(Ledger $ledger)
    {
        return view('homeland::ledger.show', ['ledger' => $ledger]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $ledger
     * @return \Illuminate\Http\Response
     */
    public function edit(Ledger $ledger)
    {
        return view('homeland::ledger.create', ['ledger' => $ledger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Tritiyo\Vehicle\Models\Vehicle $ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ledger $ledger)
    {
        // store
        $attributes = [
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
        ];

        try {
            $ledger = $this->ledger->update($ledger->id, $attributes);

            return redirect()->back()
                ->with('message', 'Successfully saved')
                ->with('status', 1)
                ->with('ledger', $ledger);
        } catch (\Exception $e) {
            return view('homeland::ledger.edit', $ledger->id)->with(['status' => 0, 'message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $ledger
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ledger->delete($id);
        return redirect()->back()->with(['status' => 1, 'message' => 'Successfully deleted']);
    }
}
