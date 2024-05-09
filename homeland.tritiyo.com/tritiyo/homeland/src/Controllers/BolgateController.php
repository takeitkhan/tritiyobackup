<?php

namespace Tritiyo\Homeland\Controllers;

use Tritiyo\Homeland\Models\Bolgate;
use Tritiyo\Homeland\Repositories\Bolgate\BolgateInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class BolgateController extends Controller
{
    /**
     * @var BolgateInterface
     */
    private $bolgate;

    /**
     * RoutelistController constructor.
     * @param bolgateInterface $bolgate
     */
    public function __construct(BolgateInterface $bolgate)
    {
        $this->bolgate = $bolgate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bolgates = $this->bolgate->getAll();
        return view('homeland::bolgate.index', ['bolgates' => $bolgates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeland::bolgate.create');
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
            return redirect('homeland::bolgates.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $attributes = [
                'name' => $request->name,
                'size' => $request->size,
                'owner' => $request->owner,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'fuel_capacity' => $request->fuel_capacity,
            ];
            // dd($attributes);
            try {
                $bolgate = $this->bolgate->create($attributes);
                return redirect(route('bolgates.index'))->with(['status' => 1, 'message' => 'Successfully created']);
            } catch (\Exception $e) {
                return view('homeland::bolgate.create')->with(['status' => 0, 'message' => 'Error']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $bolgate
     * @return \Illuminate\Http\Response
     */
    public function show(Bolgate $bolgate)
    {
        return view('homeland::bolgate.show', ['bolgate' => $bolgate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $bolgate
     * @return \Illuminate\Http\Response
     */
    public function edit(Bolgate $bolgate)
    {
        return view('homeland::bolgate.create', ['bolgate' => $bolgate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Tritiyo\Vehicle\Models\Vehicle $bolgate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bolgate $bolgate)
    {
        // store
        $attributes = [
            'name' => $request->name,
            'size' => $request->size,
            'owner' => $request->owner,
            'phone' => $request->phone,
            'address' => $request->address,
            'description ' => $request->description,
            'fuel_capacity' => $request->fuel_capacity,
        ];

        try {
            $bolgate = $this->bolgate->update($bolgate->id, $attributes);

            return redirect()->back()
                ->with('message', 'Successfully saved')
                ->with('status', 1)
                ->with('bolgate', $bolgate);
        } catch (\Exception $e) {
            return view('homeland::bolgate.edit', $bolgate->id)->with(['status' => 0, 'message' => 'Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Tritiyo\Vehicle\Models\Vehicle $bolgate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bolgate->delete($id);
        return redirect()->back()->with(['status' => 1, 'message' => 'Successfully deleted']);
    }
}
