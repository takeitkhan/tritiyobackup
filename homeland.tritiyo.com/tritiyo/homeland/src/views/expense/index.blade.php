@extends('layouts.app')

@section('title')
    Expenses
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Expenses',
            'spSubTitle' => 'all expenses here',
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
    <div class="columns is-multiline">
        @if(!empty($expenses))
            @foreach($expenses as $expense)
                <div class="column is-2">
                    <div class="borderedCol">
                        <article class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        Ledger Name:
                                        <strong>
                                            <a href="{{ route('expenses.show', $expense->id) }}"
                                               title="View route">
                                               <strong>
                                                    <?php echo \Tritiyo\Homeland\Models\Ledger::where('id', $expense->ledger_id)->first()->name ?? null ;?>
                                               </strong>
                                            </a>
                                        </strong>
                                        <br/>
                                        <small>
                                            Date: <strong>{{$expense->date}}</strong>
                                        </small>
                                        <br>
                                        <small>
                                           Transaction With Type:  <strong>{{$expense->transaction_with_type}}</strong> 
                                        </small>
                                        <br/>
                                        <small>
                                           Transaction With :  <strong>

                                                @if($expense->transaction_with_type == 'bolgate')
                                                    {{ \Tritiyo\Homeland\Models\Bolgate::where('id', $expense->transaction_with)->first()->name ?? null }}
                                                @elseif($expense->transaction_with_type == 'staff')
                                                    {{ \Tritiyo\Homeland\Models\Customer::where('id', $expense->transaction_with)->first()->name ?? null  }}
                                                @elseif($expense->transaction_with_type == 'other')
                                                    {{ $expense->transaction_with}}
                                                @endif
                                            </strong>
                                        </small>

                                        <br/>
                                        <small> Phone: 
                                        <strong>
                                            @if($expense->transaction_with_type == 'bolgate')

                                                {{$expense->reference }}

                                            @elseif($expense->transaction_with_type == 'staff')

                                                {{$expense->reference }}

                                            @elseif($expense->transaction_with_type == 'other')
                                                {{$expense->reference }}
                                            @endif
                                        </strong>
                                        
                                        </small>

                                        <br/>
                                        <small>
                                           Payment Type:  <strong>{{$expense->payment_type}}</strong>
                                        </small>

                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a href="{{ route('expenses.show', $expense->id) }}"
                                           class="level-item"
                                           title="View user data">
                                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ route('expenses.edit', $expense->id) }}"
                                           class="level-item"
                                           title="View all transaction">
                                            <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                        </a>

                                        <!-- {!! delete_data('expenses.destroy',  $expense->id) !!} -->
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach

            <div class="pagination_wrap pagination">
                {{$expenses->links('pagination::bootstrap-4')}}    
            </div>
        @endif
    </div>
@endsection
