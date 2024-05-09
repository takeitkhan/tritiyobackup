@extends('layouts.app')

@section('title')
    Single Purchase
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Single Purchase',
            'spSubTitle' => 'view a Purchase',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('purchases.create'),
            'spAllData' => route('purchases.index'),
            'spSearchData' => route('purchases.search'),
            'spTitle' => 'All Purchase',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search purchases...',
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
                Main Purchase Data
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
                                    <td colspan="3">{{$purchase->date}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Sand Type</strong></td>
                                    <td colspan="3">{{$purchase->sand_type}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Bolgate</strong></td>
                                    <td colspan="3"><?php echo \Tritiyo\Homeland\Models\Bolgate::where('id', $purchase->bolgate_id)->first()->name;?></td>
                                </tr>
                                <tr>
                                    <td><strong>Target Sale Rate:</strong></td>
                                    <td  colspan="3">{{$purchase->target_sale_amount}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Note:</strong></td>
                                    <td  colspan="3">{{$purchase->note}}</td>
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
                                    <td>Per Feet Sand Amount</td>
                                    <td>{{$purchase->per_unit_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Loading Cost</td>
                                    <td>{{$purchase->loading_cost}}</td>
                                </tr>
                                <tr>
                                    <td>Bolgate Cost</td>
                                    <td>{{$purchase->bolgate_cost}}</td>
                                </tr>
                                <tr>
                                    <td>Unloading Cost</td>
                                    <td>{{$purchase->unloading_cost}}</td>
                                </tr>
                                <tr>
                                    <td>Sub total</td>
                                    <td>{{$purchase->actual_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Feet</td>
                                    <td>{{$purchase->qty}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Amount</strong></td>
                                    <td>{{$purchase->amount}}</td>
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
