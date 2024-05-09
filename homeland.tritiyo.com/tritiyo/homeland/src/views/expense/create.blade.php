@extends('layouts.app')
@section('title')
    Create Expense
@endsection

<section class="hero is-white borderBtmLight">
    <?php 
        if (!empty($expense) && $expense->id) {
            $expenseText = 'Edit Expense';
        } else {
            $expenseText = 'Add Expense';
        }
    ?>
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => $expenseText,
            'spSubTitle' => 'Enter an expense information',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('expenses.create'),
            'spAllData' => route('expenses.index'),
            'spSearchData' => route('expenses.search'),
            'spTitle' => 'All Expenses',
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
    <div class="columns">
        <div class="column is-8">
            <article class="panel is-primary">
                    <?php
                        if (!empty($expense) && $expense->id) {
                            $routeUrl = route('expenses.update', $expense->id);
                            $method = 'PUT';
                        } else {
                            $routeUrl = route('expenses.store');
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
                                           value="{{!empty($expense) ? $expense->date : date('Y-m-d')}}" readonly/>
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
                                        <option value="" disabled selected>Select</option>
                                        @php $ledger = \Tritiyo\Homeland\Models\Ledger::orderBy('id', 'DESC')->where('type', 'pay')->get(); @endphp
                                        @foreach($ledger as $data)
                                            <option value="{{$data->id}}" {{ !empty($expense) && $expense->ledger_id == $data->id ? 'selected' : '' }} >{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-3">
                            <div class="field width100">
                                {{ Form::label('transaction_with_type', 'Transaction With Type', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">
                                    <select class="" name="transaction_with_type"  id="transaction_with_type">
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="bolgate" {{ !empty($expense) && $expense->transaction_with_type == 'bolgate' ? 'selected' : ''}}>Bolgate</option>
                                        <option value="staff" {{ !empty($expense) && $expense->transaction_with_type == 'staff' ? 'selected' : ''}}>Staff</option>
                                        <option value="other" {{ !empty($expense) && $expense->transaction_with_type == 'other' ? 'selected' : ''}}>Other</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <!--- Bolgate -->

                        <div class="column is-3" id="transaction_with">
                            @if(!empty($expense) && $expense->transaction_with_type == 'bolgate')
                                <div class="field width100">
                                    {{ Form::label('bolgate', 'Bolgate', array('class' => 'label')) }}
                                    <div class="select is-small is-fullwidth">
                                        <select class="" name="transaction_with">
                                            @php $bolgate = \Tritiyo\Homeland\Models\Bolgate::orderBy('id', 'DESC')->get(); @endphp
                                            @foreach($bolgate as $data)
                                                <option value="{{$data->id}}"  {{ !empty($expense) && $expense->transaction_with == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @elseif(!empty($expense) && $expense->transaction_with_type == 'staff')
                            <div class="field width100">
                                {{ Form::label('staff', 'Staff', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">
                                    <select class="" name="transaction_with">
                                        @php $staff = \Tritiyo\Homeland\Models\Customer::orderBy('id', 'DESC')->get(); @endphp
                                        @foreach($staff as $data)
                                            <option value="{{$data->id}}" {{ !empty($expense) && $expense->transaction_with == $data->id ? 'selected' : ''}}>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif(!empty($expense) && $expense->transaction_with_type == 'other')
                                <div class="field width100">
                                    {{ Form::label('', 'Select', array('class' => 'label')) }}
                                    <div class="select is-small is-fullwidth">
                                        <select class="" name="transaction_with">
                                            <option value="mobile" {{ !empty($expense) && $expense->transaction_with == 'mobile' ? 'selected' : ''}}>Mobile</option>
                                            <option value="invoice" {{ !empty($expense) && $expense->transaction_with == 'invoice' ? 'selected' : ''}}>Invoice</option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <div class="column is-3" id="reference">
                            @if(!empty($expense) && $expense->transaction_with_type == 'other')
                                <div class="field width100">
                                   <br>
                                    <div class="control">
                                        <input type="text" class="input is-small" name="reference" placeholder="Enter reference" value="{{$expense->reference}}" />
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('payment_type', 'Payment Type', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">
                                    <select class="" name="payment_type">
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="bkash" {{ !empty($expense) && $expense->payment_type == 'bkash' ? 'selected' : ''}}>Bkash</option>
                                        <option value="bank" {{ !empty($expense) && $expense->payment_type == 'bank' ? 'selected' : ''}}>Bank</option>
                                        <option value="cash" {{ !empty($expense) && $expense->payment_type == 'cash' ? 'selected' : ''}}>Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('amount', 'Amount', array('class' => 'label')) }}
                                <div class="control">
                                {{ Form::number('amount', $expense->amount ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter Amount...']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-6">
                            <div class="field width100">
                                {{ Form::label('note', 'Note', array('class' => 'label')) }}
                                <div class="control">
                                {{ Form::textarea('note', $expense->note ?? NULL, ['class' => 'textarea is-small', 'rows' => '4', 'placeholder' => 'Enter Note...']) }}
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


<script id="bolgate" type="text/template">
    <div class="field width100">
        {{ Form::label('bolgate', 'Bolgate', array('class' => 'label')) }}
        <div class="select is-small is-fullwidth">
            <select class="" name="transaction_with">
                @php $bolgate = \Tritiyo\Homeland\Models\Bolgate::orderBy('id', 'DESC')->get(); @endphp
                @foreach($bolgate as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</script>



<script id="staff" type="text/template">
    <div class="field width100">
        {{ Form::label('staff', 'Staff', array('class' => 'label')) }}
        <div class="select is-small is-fullwidth">
            <select class="" name="transaction_with">
                @php $staff = \Tritiyo\Homeland\Models\Customer::orderBy('id', 'DESC')->get(); @endphp
                @foreach($staff as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</script>

<script id="other" type="text/template">
    <div class="field width100">
        {{ Form::label('', 'Select', array('class' => 'label')) }}
        <div class="select is-small is-fullwidth">
            <select name="transaction_with" id="transaction_with_type_ui">
                <option value="" selected disabled>Select</option>
                <option value="mobile">Mobile</option>
                <option value="invoice">Invoice</option>
            </select>
        </div>
    </div>
</script>


<script id="other_reference" type="text/template">
    <div class="field width100">
        <br/>
        <div class="control">
            <input type="text" class="input is-small referenceinput" name="reference" placeholder="Enter reference" />
        </div>
    </div>
</script>


<script>
$.noConflict();
jQuery(document).ready(function($){

    //$('#expense_wrap').html($('#expense_breakdown').html());
    function tr(){
        $('select#transaction_with_type').change(function(e){
            // alert();
            let getVal = $(this).find(':selected').val();
            if(getVal == 'bolgate'){
                $('#transaction_with').empty().append($('#bolgate').html())
                $('#reference').empty()
            }

            if(getVal == 'staff'){
                $('#transaction_with').empty().append($('#staff').html())
                $('#reference').empty()
            }

            if(getVal == 'other'){
                $('#transaction_with').empty().append($('#other').html());
                $('#reference').empty().append($('#other_reference').html());
            }

        });
    }

    tr();

    $('#other select').change(function(e){
        //let selectedval = $(this).find(':selected').val();
        alert('ok');
        //$('input.referenceinput').attr('placeholder', 'Enter'+selectedval+'no');

    });
});


</script>

@endsection
