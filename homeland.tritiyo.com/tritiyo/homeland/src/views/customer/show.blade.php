@extends('layouts.app')

@section('title')
    Single Customer
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Single Customer',
            'spSubTitle' => 'view a Customer',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('customers.create'),
            'spAllData' => route('customers.index'),
            'spSearchData' => route('customers.search'),
            'spTitle' => 'All Customer',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search customers...',
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
                Main Customer Data
            </p>
        </header>
        <div class="card-content">
            <div class="card-data">
                <div class="columns">

                    <div class="column is-12">
                        <table class="table is-bordered is-striped is-narrow is-hoverable" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td colspan="3">{{$customer->name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone</strong></td>
                                    <td colspan="3">{{$customer->phone}}</td>
                                </tr>

                                <tr>
                                    <td><strong>Company</strong></td>
                                    <td colspan="3">{{$customer->company}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Address</strong></td>
                                    <td colspan="3">{{$customer->address}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Mobile Bank Account</strong></td>
                                    <td colspan="3">{{$customer->mobile_bank_account}}</td>
                                </tr>
                                <tr>
                                    <td><strong> Bank Account</strong></td>
                                    <td colspan="3">{{$customer->bank_account}}</td>
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
