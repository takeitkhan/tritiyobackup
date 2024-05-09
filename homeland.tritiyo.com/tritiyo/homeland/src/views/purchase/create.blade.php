@extends('layouts.app')
@section('title')
    Create purchase
@endsection

<section class="hero is-white borderBtmLight">
    <?php 
        if (!empty($purchase) && $purchase->id) {
            $purchaseText = 'Edit Purchase';
        } else {
            $purchaseText = 'Add Purchase';
        }
    
    ?>
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => $purchaseText,
            'spSubTitle' => 'Enter a purchase information',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('purchases.create'),
            'spAllData' => route('purchases.index'),
            'spSearchData' => route('purchases.search'),
            'spTitle' => 'All Purchases',
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
    <div class="columns">
        <div class="column is-8">
            <article class="panel is-primary">
                    <?php
                        if (!empty($purchase) && $purchase->id) {
                            $routeUrl = route('purchases.update', $purchase->id);
                            $method = 'PUT';
                        } else {
                            $routeUrl = route('purchases.store');
                            $method = 'post';
                        }
                    ?>

                <div class="p-5">
                    {{ Form::open(array('url' => $routeUrl, 'method' => $method, 'value' => 'PATCH', 'id' => 'add_route', 'files' => true, 'autocomplete' => 'off')) }}

                    <div class="columns">
                        <div class="column is-7"></div>
                        <div class="column is-5">
                            <div class="field is-horizontal">
                                <div class="field-label is-small">
                                    {{ Form::label('date', 'Date', array('class' => 'label')) }}
                                </div>
                                <div class="field-label mr-0">
                                    <div class="field">
                                        <div class="control">
                                            <input type="text" class="input is-small has-background-disabled" name="date" value="{{!empty($purchase) ? $purchase->date : date('Y-m-d')}}" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column is-6">
                             <div class="field width100">
                                {{ Form::label('sand_type', 'Sand Type', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">

                                    <select name="sand_type" class="" required>
                                        <option value="" disabled selected>Select sand</option>
                                        <option value="red" {{ !empty($purchase) && $purchase->sand_type == 'red' ? 'selected' : '' }} >
                                           Red
                                        </option>
                                        <option value="black" {{ !empty($purchase) && $purchase->sand_type == 'black' ? 'selected' : '' }} >
                                           Black
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="field width100">
                                {{ Form::label('bolgate_id', 'Bolgate', array('class' => 'label')) }}
                                <div class="select is-small is-fullwidth">

                                    <select name="bolgate_id" class="" required>
                                        <option value="" disabled selected>Select a Bolgate</option>
                                        @php
                                            $bolgate = \Tritiyo\Homeland\Models\Bolgate::orderBy('id', 'DESC')->get();
                                        @endphp

                                        @foreach($bolgate as $data)
                                            <option value="{{$data->id}}" {{ !empty($purchase) && $purchase->bolgate_id == $data->id ? 'selected' : '' }} >
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="field sis-grouped width100">
                                {{ Form::label('note', 'Note', array('class' => 'label')) }}
                                <div class="control"> 
                                    {{ Form::textarea('note', $purchase->note ?? NULL, ['class' => 'textarea is-small', 'rows' => '4', 'placeholder' => 'Enter note...']) }}
                                </div>
                            </div>
                        </div>

                        <div class="column is-6">
                            <!--  test-->
                            <table class="table is-bordered is-striped is-narrow is-hoverable" style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td><strong>Details</strong></th>
                                        <td style="width: 35%;"><strong>Amount</strong></th>
                                    </tr>
                                    <tr>
                                        <td>Per Feet Sand Cost</td>
                                        <td>
                                        {{ Form::number('per_unit_amount', $purchase->per_unit_amount ?? 0, ['class' => 'input is-small', 'required' => true, 'id' => 'per_unit_amount', 'placeholder' => 'Enter per unit amount...']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Loading Cost</td>
                                        <td>
                                        {{ Form::number('loading_cost', $purchase->loading_cost ?? 0, ['id' => 'loading_cost', 'class' => 'input is-small', 'placeholder' => 'Enter Loading Cost...']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bolgate Cost</td>
                                        <td>
                                        {{ Form::number('bolgate_cost', $purchase->bolgate_cost ?? 0, ['id' => 'bolgate_cost', 'class' => 'input is-small', 'placeholder' => 'Enter Loading Cost...']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unloading Cost</td>
                                        <td>{{ Form::number('unloading_cost', $purchase->unloading_cost ?? 0, ['id' => 'unloading_cost', 'class' => 'input is-small', 'placeholder' => 'Enter Loading Cost...']) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sub total</td>
                                        <td>
                                        {{ Form::number('actual_amount', $purchase->actual_amount ?? NULL, ['id' => 'actual_amount', 'class' => 'input is-small has-background-disabled', 'readonly' => true, 'placeholder' => '']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Feet</td>
                                        <td>
                                        {{ Form::number('qty', $purchase->qty ?? 1, ['id' => 'qty', 'class' => 'input is-small', 'placeholder' => 'Enter feet...']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Amount</strong></td>
                                        <td>
                                        {{ Form::number('amount', $purchase->amount ?? NULL, ['id' => 'amount', 'class' => 'input is-small has-background-disabled', 'readonly' => true, 'placeholder' => 'Enter Amount...']) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Target Sale Rate</strong></td>
                                        <td>
                                        {{ Form::number('target_sale_amount', $purchase->target_sale_amount ?? NULL, ['class' => 'input is-small', 'placeholder' => 'Enter Rate...']) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--  test-->
                        </div>
                    </div>

                
                    <div class="columns">
                        <div class="column">
                            <div class="field is-grouped" style="float: right">
                                <br/>
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




<script>


// Amount Disocunt Calculation
let perUnitAmount = $('input#per_unit_amount').val();
let loadingCost = $('input#loading_cost').val();
let bolgateCost = $('input#bolgate_cost').val();
let unloadingCost = $('input#unloading_cost').val()

let actualAmount = parseFloat(perUnitAmount) + parseFloat(loadingCost) + parseFloat(bolgateCost) + parseFloat(unloadingCost);
let qty = $('input#qty').val();


$('input#per_unit_amount').keyup(function(){
    perUnitAmount = $(this).val();
    actualAmount = parseFloat(perUnitAmount) + parseFloat(loadingCost) + parseFloat(bolgateCost) + parseFloat(unloadingCost);
    $('input#actual_amount').val(actualAmount);
    $('input#amount').val(actualAmount*qty);
})


$('input#loading_cost').keyup(function(){
    loadingCost = $(this).val();
    actualAmount = parseFloat(perUnitAmount) + parseFloat(loadingCost) + parseFloat(bolgateCost) + parseFloat(unloadingCost);
    $('input#actual_amount').val(actualAmount);
    $('input#amount').val(actualAmount*qty);
})


$('input#bolgate_cost').keyup(function(){
    bolgateCost = $(this).val();
    actualAmount = parseFloat(perUnitAmount) + parseFloat(loadingCost) + parseFloat(bolgateCost) + parseFloat(unloadingCost);
    $('input#actual_amount').val(actualAmount);
    $('input#amount').val(actualAmount*qty);
})


$('input#unloading_cost').keyup(function(){
    unloadingCost = $(this).val();
    actualAmount = parseFloat(perUnitAmount) + parseFloat(loadingCost) + parseFloat(bolgateCost) + parseFloat(unloadingCost);
    $('input#actual_amount').val(actualAmount);

    $('input#amount').val(actualAmount*qty);
})

$('input#qty').keyup(function(){
    qty = $(this).val();
    $('input#amount').val(actualAmount*qty);
})

//console.log(actualAmount);

// $('input#amount').val($('input#actual_amount').val()*2);

/*
let qty = $('input#qty').val();
$('input#qty').keyup(function(){
    qty = $(this).val();
    $('input#actual_amount').val(perUnitAmount*qty);
    $('input#amount').val((perUnitAmount*qty)-discount);
})


let discount = $('input#discount').val();
$('input#discount').keyup(function(){
    discount = $('input#discount').val();
    //console.log(actualAmount)
    $('input#amount').val((perUnitAmount*qty)-discount);
})
*/

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
