@extends('layouts.app')

@section('title')
    income
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Income',
            'spSubTitle' => 'all income here',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('incomes.create'),
            'spAllData' => route('incomes.index'),
            'spSearchData' => route('incomes.search'),
            'spTitle' => 'All incomes',
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
    <div class="columns is-multiline">
        @if(!empty($incomes))
            @foreach($incomes as $income)
                <div class="column is-2">
                    <div class="borderedCol">
                        <article class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        Ledger Name:
                                        <strong>
                                            <a href="{{ route('incomes.show', $income->id) }}"
                                               title="View route">
                                                <strong>
                                                    <?php echo \Tritiyo\Homeland\Models\Ledger::where('id', $income->ledger_id)->first()->name;?>
                                                </strong>
                                            </a>
                                        </strong>
                                        <br/>
                                        <small>
                                            Date: <strong>{{$income->date}}</strong>
                                        </small>
                                        <br/>
                                        <small>
                                            Transaction With Type: <strong>{{$income->transaction_with_type}}</strong>
                                        </small>
                                        <br/>
                                        <small>
                                            Transaction With :
                                            <strong>
                                                <?php
                                                    $customer = \Tritiyo\Homeland\Models\Customer::where('id', $income->transaction_with)->first();
                                                ?>
                                                {{ $customer->name }}
                                            </strong>
                                        </small>
                                        <br/>
                                        <small>
                                            Phone : <strong>{{$customer->phone }}</strong>
                                        
                                        </small>
                                        <br/>
                                        <small>
                                            Payment Type: <strong>{{$income->payment_type}}</strong>
                                        </small>

                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a href="{{ route('incomes.show', $income->id) }}"
                                           class="level-item"
                                           title="View user data">
                                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ route('incomes.edit', $income->id) }}"
                                           class="level-item"
                                           title="View all transaction">
                                            <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                        </a>

                                        <!-- {!! delete_data('incomes.destroy',  $income->id) !!} -->
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach

            <div class="pagination_wrap pagination">
                {{$incomes->links('pagination::bootstrap-4')}}    
            </div>

        @endif
    </div>
@endsection
