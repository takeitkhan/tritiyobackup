@extends('layouts.app')
@section('title')
    Create Ledger
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Ledger',
            'spSubTitle' => 'Enter a ledger information',
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
    <article class="panel is-primary">
            <?php
                if (!empty($ledger) && $ledger->id) {
                    $routeUrl = route('ledgers.update', $ledger->id);
                    $method = 'PUT';
                } else {
                    $routeUrl = route('ledgers.store');
                    $method = 'post';
                }
            ?>

        <div class="customContainer">
            {{ Form::open(array('url' => $routeUrl, 'method' => $method, 'value' => 'PATCH', 'id' => 'add_route', 'files' => true, 'autocomplete' => 'off')) }}
            <div class="columns">
                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('name', 'Name', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('name', $ledger->name ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter name...']) }}
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('type', 'Type', array('class' => 'label')) }}
                        <div class="control">
                            <select class="input is-small" name="type">
                                <option value="" selected disabled>Select Type</option>
                                <option value="receive" {{ !empty($ledger) && $ledger->type == 'receive' ? 'selected' : ''}}>receive</option>
                                <option value="pay" {{ !empty($ledger) && $ledger->type == 'pay' ? 'selected' : ''}}>Pay</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                 <div class="column is-12">
                    <div class="field">
                        {{ Form::label('description', 'Description', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::textarea('description', $ledger->description ?? NULL, ['class' => 'textarea is-small', 'placeholder' => 'Enter description...']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">

            </div>

            <div class="columns">
                <div class="column">
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-success is-small">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </article>
@endsection

@section('column_right')

@endsection
