@extends('layouts.app')

@section('title')
    Single Income
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Single Income',
            'spSubTitle' => 'view a Income',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('incomes.create'),
            'spAllData' => route('incomes.index'),
            'spSearchData' => route('incomes.search'),
            'spTitle' => 'All Income',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search incomes...',
            'spMessage' => $message = $message ?? NULl,
            'spStatus' => $status = $status ?? NULL
        ])
    </nav>
</section>
@section('column_left')
    {{--    <article class="panel is-primary">--}}
    {{--        <div class="customContainer">--}}
    <div class="card tile is-child">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account default"></i></span>
                Main Income Data
            </p>
        </header>
        <div class="card-content">
            <div class="card-data">
                <div class="columns">

                    <div class="column is-9">
                        <table class="table is-bordered is-striped is-narrow is-hoverable" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td><strong>Date</strong></td>
                                    <td colspan="3">{{$income->date}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Ledger Name</strong></td>
                                    <td colspan="3"><?php echo \Tritiyo\Homeland\Models\Ledger::where('id', $income->ledger_id)->first()->name;?></td>
                                </tr>
                                <tr>
                                    <td><strong>Transaction With Type:</strong></td>
                                    <td>{{$income->transaction_with_type}}</td>
                                    <td><strong>Payment Type:</strong></td>
                                    <td>{{$income->payment_type}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Transaction With</strong></td>
                                    <?php
                                        $customer = \Tritiyo\Homeland\Models\Customer::where('id', $income->transaction_with)->first();
                                    ?>
                                    <td>{{ $customer->name }}</td>
                                    <td><strong>Phone</strong></td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Truck No</strong></td>
                                    <td>{{$income->truck_number}}</td>
                                    <td><strong>Token No</strong></td>
                                    <td>{{$income->token_number}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Note:</strong></td>
                                    <td  colspan="3">{{$income->note}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="column is-3">
                        <table class="table is-bordered is-striped is-narrow is-hoverable" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td><strong>Details</strong></th>
                                    <td style="width: 15%;"><strong>Amount</strong></th>
                                </tr>
                                <tr>
                                    <td>Per Feet Amount</td>
                                    <td>{{$income->per_unit_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Qty</td>
                                    <td>{{$income->qty}}</td>
                                </tr>
                                <tr>
                                    <td>Sub total</td>
                                    <td>{{$income->actual_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>{{$income->discount}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Amount</strong></td>
                                    <td>{{$income->amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('column_right')


@endsection


@section('cusjs')
    <style type="text/css">
        .table.is-fullwidth {
            width: 100%;
            font-size: 15px;
            text-align: center;
        }
    </style>
@endsection
