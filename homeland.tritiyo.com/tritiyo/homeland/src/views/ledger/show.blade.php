@extends('layouts.app')

@section('title')
    Single Ledger
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Single Ledger',
            'spSubTitle' => 'view a ledger',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('ledgers.create'),
            'spAllData' => route('ledgers.index'),
            'spSearchData' => route('ledgers.search'),
            'spTitle' => 'All Ledger',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search ledgers...',
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
                Main Ledger Data
            </p>
        </header>
        <div class="card-content">
            <div class="card-data">
                <div class="columns">
                    <div class="column is-2">Name</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $ledger->name }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">type</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $ledger->type }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">Description</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $ledger->description }}</div>
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
