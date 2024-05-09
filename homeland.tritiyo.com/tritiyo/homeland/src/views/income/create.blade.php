@extends('layouts.app')
@section('title')
    Create income
@endsection

<section class="hero is-white borderBtmLight">
    <?php 
    if (!empty($income) && $income->id) {
        $spTitleText  = 'Edit Income';
    } else {
        $spTitleText  = 'Add Income';
    }
        
    ?>  
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => $spTitleText,
            'spSubTitle' => 'Enter an income information',
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
    <div class="columns">
        <div class="column is-8">
            <article class="panel is-primary">
                <?php
                if (!empty($income) && $income->id) {
                    $routeUrl = route('incomes.update', $income->id);
                    $method = 'PUT';
                } else {
                    $routeUrl = route('incomes.store');
                    $method = 'post';
                }
                ?>

                <div class="p-5">
                    {{ Form::open(array('url' => $routeUrl, 'method' => $method, 'value' => 'PATCH', 'id' => 'add_route', 'files' => true, 'autocomplete' => 'off')) }}
                    <div class="columns">
                        <div class="column is-4">
                            <div class="field width100">
                                {{ Form::label('date', 'Date', array('class' => 'label')) }}
                                <div class="control">
                                    <input style="background: #ddd" type="text" class="input is-small" name="date"
                                           value="{{!empty($income) ? $income->date : date('Y-m-d')}}" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('Ledger_id', 'Ledger Name', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">

                                    <select name="ledger_id" class="">
                                        <option value="" disabled selected>Select a ledger</option>
                                        @php
                                            $ledger = \Tritiyo\Homeland\Models\Ledger::orderBy('id', 'DESC')
                                                        ->where('type', 'receive')->get();
                                        @endphp

                                        @foreach($ledger as $data)
                                            <option
                                                value="{{$data->id}}" {{ !empty($income) && $income->ledger_id == $data->id ? 'selected' : '' }} >
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-3">
                            <div class="field width100">
                                {{ Form::label('customer', 'Customer', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">
                                    @if(!empty($income))
                                        <select class="" name="transaction_with" readonly>
                                            @php $customer = \Tritiyo\Homeland\Models\Customer::where('id', $income->transaction_with)->first(); @endphp
                                            <option value="{{$customer->id}}" selected>{{$customer->name}}</option>
                                        </select>
                                    @else
                                        <select class="" name="customer_type" id="customer_type">
                                            <option value="" selected disabled>Select Type</option>
                                            <option value="new">New</option>
                                            <option value="existing">Existing</option>
                                        </select>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <!--- Bolgate -->

                        <div class="column is-9" style="margin-top: 7px;">
                            <div class="columns" id="customer_field">

                            </div>
                        </div>


                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('payment_type', 'Payment Type', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">
                                    <select class="" name="payment_type">
                                        <option value="" selected disabled>Select Type</option>
                                        <option
                                            value="bkash" {{ !empty($income) && $income->payment_type == 'bkash' ? 'selected' : ''}}>
                                            Bkash
                                        </option>
                                        <option
                                            value="bank" {{ !empty($income) && $income->payment_type == 'bank' ? 'selected' : ''}}>
                                            Bank
                                        </option>
                                        <option
                                            value="cash" {{ !empty($income) && $income->payment_type == 'cash' ? 'selected' : ''}}>
                                            Cash
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('truck_number', 'Truck Number', array('class' => 'label')) }}
                                <div class="control">
                                    <input type="text" class="input is-small" name="truck_number"
                                           value="{{!empty($income) ? $income->truck_number : ''}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('token_number', 'Token Number', array('class' => 'label')) }}
                                <div class="control">
                                    <input type="text" class="input is-small" name="token_number"
                                           value="{{!empty($income) ? $income->token_number : ''}}"/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('per_unit_amount', 'Per Unit Amount', array('class' => 'label')) }}
                                <div class="control">
                                    {{ Form::number('per_unit_amount', $income->per_unit_amount ?? 0, ['class' => 'input is-small', 'placeholder' => 'Enter per unit amount...']) }}
                                </div>
                            </div>
                        </div>

                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('qty', 'Quantity/ Feet', array('class' => 'label')) }}
                                <div class="control">
                                    {{ Form::number('qty', $income->qty ?? 1, ['class' => 'input is-small', 'placeholder' => 'Enter quantity or feet...']) }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('actual_amount', 'Actual Amount', array('class' => 'label')) }}
                                <div class="control">
                                    {{ Form::number('actual_amount', $income->actual_amount ?? NULL, ['class' => 'input is-small has-background-disabled', 'readonly' => true, 'placeholder' => 'Enter actual amount...']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('discount', 'Discount', array('class' => 'label')) }}
                                <div class="control">
                                    {{ Form::number('discount', $income->discount ?? 0, ['class' => 'input is-small', 'placeholder' => 'Enter discount...']) }}
                                    <strong>[Discount in amount]</strong>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('amount', 'Amount', array('class' => 'label')) }}
                                <div class="control">
                                    {{ Form::number('amount', $income->amount ?? NULL, ['class' => 'input is-small has-background-disabled', 'readonly' => true, 'placeholder' => 'Enter Amount...']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('note', 'Note', array('class' => 'label')) }}
                                <div class="control">
                                {{ Form::textarea('note', $income->note ?? NULL, ['class' => 'textarea is-small', 'rows' => '4', 'placeholder' => 'Enter Note...']) }}
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
        </div>
    </div>
@endsection

@section('column_right')




@endsection


@section('cusjs')

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <script id="existing_customer" type="text/template">
        <div class="column is-4">
            <div class="field width100">
                {{ Form::label('', 'Select Customer', array('class' => 'label')) }}
                <div class="select is-small is-fullwidth">
                    <select class="" name="transaction_with">
                        @php $customer = \Tritiyo\Homeland\Models\Customer::orderBy('id', 'DESC')->get(); @endphp
                        @foreach($customer as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </script>



    <script id="new_customer" type="text/template">
        <div class="column is-4">
            <div class="field width100">
                {{ Form::label('customer_name', 'Customer Name', array('class' => 'label')) }}
                <div class="control">
                    <input type="text" class="input is-small" name="customer_name" placeholder="Enter Customer name"/>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="field width100">
                {{ Form::label('customer_phone', 'Customer Phone', array('class' => 'label')) }}
                <div class="control">
                    <input type="text" class="input is-small" name="customer_phone" placeholder="Enter Customer Phone"/>
                </div>
            </div>
        </div>

        <div class="column is-4">
            <div class="field width100">
                {{ Form::label('customer_company', 'Customer Company', array('class' => 'label')) }}
                <div class="control">
                    <input type="text" class="input is-small" name="customer_company"
                           placeholder="Enter Customer Company"/>
                </div>
            </div>
        </div>

    </script>



    <script>
        $.noConflict();
        jQuery(document).ready(function ($) {
            $.noConflict();

            //$('#income_wrap').html($('#income_breakdown').html());
            function tr() {
                $('select#customer_type').change(function (e) {
                    // alert();
                    let getVal = $(this).find(':selected').val();
                    if (getVal == 'new') {
                        $('#customer_field').empty().append($('#new_customer').html())
                    }

                    if (getVal == 'existing') {
                        $('#customer_field').empty().append($('#existing_customer').html())
                    }


                });
            }

            tr();

            $('#other select').change(function (e) {
                //let selectedval = $(this).find(':selected').val();
                alert('ok');
                //$('input.referenceinput').attr('placeholder', 'Enter'+selectedval+'no');

            });
        });


        // Amount Disocunt Calculation
        let perUnitAmount = 0;
        $('input#per_unit_amount').keyup(function () {
            perUnitAmount = $(this).val();
            $('input#actual_amount').val(perUnitAmount * qty);
            $('input#amount').val((perUnitAmount * qty) - discount);


        })

        let qty = $('input#qty').val();
        $('input#qty').keyup(function () {
            qty = $(this).val();
            $('input#actual_amount').val(perUnitAmount * qty);
            $('input#amount').val((perUnitAmount * qty) - discount);
        })


        let discount = $('input#discount').val();
        $('input#discount').keyup(function () {
            discount = $('input#discount').val();
            //console.log(actualAmount)
            $('input#amount').val((perUnitAmount * qty) - discount);
        })


        /*
        let actualAmount = 0;
        $('input#actual_amount').keyup(function(){
            actualAmount = $(this).val();
            //let discount = $('input#discount').val();
            $('input#amount').val(actualAmount - discount);
        })
        */


        //$('input#amount').val()

    </script>

@endsection
