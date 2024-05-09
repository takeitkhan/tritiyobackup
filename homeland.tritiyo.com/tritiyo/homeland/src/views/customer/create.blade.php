@extends('layouts.app')
@section('title')
    Create Customer
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Customer',
            'spSubTitle' => 'Enter a customer information',
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
    <article class="panel is-primary">
            <?php
                if (!empty($customer) && $customer->id) {
                    $routeUrl = route('customers.update', $customer->id);
                    $method = 'PUT';
                } else {
                    $routeUrl = route('customers.store');
                    $method = 'post';
                }
            ?>

        <div class="customContainer">
            {{ Form::open(array('url' => $routeUrl, 'method' => $method, 'value' => 'PATCH', 'id' => 'add_route', 'files' => true, 'autocomplete' => 'off')) }}
            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        {{ Form::label('name', 'Name', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('name', $customer->name ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter name...']) }}
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="field">
                        {{ Form::label('phone', 'Phone', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('phone', $customer->phone ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter phone...']) }}
                        </div>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="field">
                        {{ Form::label('company', 'Company', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('company', $customer->company ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter company...']) }}
                        </div>
                    </div>
                </div>


            </div>

            <div class="columns">
                 <div class="column is-6">
                    <div class="field">
                        {{ Form::label('mobile_bank_account', 'Mobile Bank Account', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::textarea('mobile_bank_account', $customer->mobile_bank_account ?? NULL, ['class' => 'textarea is-small', 'placeholder' => 'Enter mobile bank account details...', 'rows' => '4']) }}
                        </div>
                    </div>
                </div>

                <div class="column is-6">
                    <div class="field">
                        {{ Form::label('bank_account', 'Bank Account Details', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::textarea('bank_account', $customer->bank_account ?? NULL, ['class' => 'textarea is-small', 'placeholder' => 'Enter bank account details...', 'rows' => '4']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        {{ Form::label('address', 'Address', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::text('address', $customer->address ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter address...']) }}
                        </div>
                    </div>
                </div>
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
