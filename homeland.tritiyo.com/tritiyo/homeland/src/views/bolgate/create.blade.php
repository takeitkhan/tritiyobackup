@extends('layouts.app')
@section('title')
    Create Bolegate
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Bolgate',
            'spSubTitle' => 'Enter a bolgate information',
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
            'spPlaceholder' => 'Search bolgate...',
            'spMessage' => $message = $message ?? NULl,
            'spStatus' => $status = $status ?? NULL
        ])
    </nav>
</section>
@section('column_left')
    <article class="panel is-primary">
            <?php
                if (!empty($bolgate) && $bolgate->id) {
                    $routeUrl = route('bolgates.update', $bolgate->id);
                    $method = 'PUT';
                } else {
                    $routeUrl = route('bolgates.store');
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
                            {{ Form::text('name', $bolgate->name ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter name...']) }}
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('size', 'Size', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('size', $bolgate->size ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter Size...']) }}
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('owner', 'Owner', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('owner', $bolgate->owner ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter owner...']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('phone', 'Phone', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::number('phone', $bolgate->phone ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter phone...']) }}
                        </div>
                    </div>
                </div>

                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('address', 'Address', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('address', $bolgate->address ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter Address...']) }}
                        </div>
                    </div>
                </div>

                <div class="column is-3">
                    <div class="field">
                        {{ Form::label('fuel_capacity', 'Fuel capacity', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('fuel_capacity', $bolgate->fuel_capacity ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter Fuel capacity...']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                 <div class="column is-12">
                    <div class="field">
                        {{ Form::label('description', 'Description', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::textarea('description', $bolgate->description ?? NULL, ['class' => 'textarea is-small', 'placeholder' => 'Enter description...']) }}
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
