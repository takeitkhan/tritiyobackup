@extends('layouts.app')

@section('title')
    Single Expense
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Single Expense',
            'spSubTitle' => 'view a Expense',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('expenses.create'),
            'spAllData' => route('expenses.index'),
            'spSearchData' => route('expenses.search'),
            'spTitle' => 'All Expense',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search expenses...',
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
                Main Expense Data
            </p>
        </header>
        <div class="card-content">
            <div class="card-data">
                <div class="columns">

                    <div class="column is-12">
                        <table class="table is-bordered is-striped is-narrow is-hoverable" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td><strong>Date</strong></td>
                                    <td colspan="3">{{$expense->date}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Ledger Name</strong></td>
                                    <td colspan="3"><?php echo \Tritiyo\Homeland\Models\Ledger::where('id', $expense->ledger_id)->first()->name;?></td>
                                </tr>
                                <tr>
                                    @if($expense->transaction_with_type != 'other')
                                        <td><strong>Transaction With Type:</strong></td>
                                        <td  colspan="3">{{$expense->transaction_with_type}}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($expense->transaction_with_type != 'other')
                                        <td><strong>Transaction With</strong></td>
                                        <td>
                                            @if($expense->transaction_with_type == 'staff')
                                            @php $customer = \Tritiyo\Homeland\Models\Customer::where('id', $expense->transaction_with)->first(); @endphp
                                                {{ $customer->name }}
                                            @endif   

                                            @if($expense->transaction_with_type == 'bolgate')
                                            @php $customer = \Tritiyo\Homeland\Models\Bolgate::where('id', $expense->transaction_with)->first(); @endphp
                                                {{ $customer->name }}
                                            @endif    
                                        </td>
                                        <td><strong>Phone</strong></td>
                                        <td>{{ $expense->reference }}</td>
                                    @endif
                                    @if($expense->transaction_with_type == 'other')
                                        <td><strong>{{$expense->transaction_with}}</strong></td>
                                        <td>{{ $expense->reference }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><strong>Amount</strong></td>
                                    <td colspan="3">{{$expense->amount}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Payment Type:</strong></td>
                                    <td colspan="3">{{$expense->payment_type}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Note:</strong></td>
                                    <td colspan="3">{{$expense->note}}</td>
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
