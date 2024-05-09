@extends('layouts.app')

@section('title')
    Single Bolgate
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Single Bolgate',
            'spSubTitle' => 'view a Bolgate',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('bolgates.create'),
            'spAllData' => route('bolgates.index'),
            'spSearchData' => route('bolgates.search'),
            'spTitle' => 'All Bolgate',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search bolgates...',
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
                Main Bolgate Data
            </p>
        </header>
        <div class="card-content">
            <div class="card-data">
                <div class="columns">
                    <div class="column is-2">Name</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $bolgate->name }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">Bolgate size</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $bolgate->size }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">Owner</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $bolgate->owner }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">Phone</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $bolgate->phone }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">Fuel Capacity</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $bolgate->fuel_capacity }}</div>
                </div>
                <div class="columns">
                    <div class="column is-2">Description</div>
                    <div class="column is-1">:</div>
                    <div class="column">{{ $bolgate->description }}</div>
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
