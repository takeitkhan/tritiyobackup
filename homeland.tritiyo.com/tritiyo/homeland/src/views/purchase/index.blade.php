@extends('layouts.app')

@section('title')
    Expenses
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Purchases',
            'spSubTitle' => 'all purchases here',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('purchases.create'),
            'spAllData' => route('purchases.index'),
            'spSearchData' => route('purchases.search'),
            'spTitle' => 'All purchases',
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
    <div class="columns is-multiline">
        @if(!empty($purchases))
            @foreach($purchases as $purchase)
                <div class="column is-2">
                    <div class="borderedCol">
                        <article class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        Sand Type:
                                        <strong>
                                            <a href="{{ route('purchases.show', $purchase->id) }}"
                                               title="View route">
                                              
                                                <strong>
                                                    {{ ucfirst($purchase->sand_type) }}
                                               </strong>
                                            </a>
                                        </strong>
                                        <br/>
                                        <small>
                                           Date:  <strong>{{$purchase->date}}</strong>
                                        </small>
                                        <br/>
                                        <small>
                                          Bolgate :  <strong>

                                            <?php echo \Tritiyo\Homeland\Models\Bolgate::where('id', $purchase->bolgate_id)->first()->name;?>
                                            </strong>
                                        </small>
                                        <br/>
                                        <small>
                                           Feet:  <strong>{{$purchase->qty}}</strong>
                                        </small>
                                        <br>
                                        <small>
                                           Purchase Rate :  <strong>{{$purchase->actual_amount}}</strong>
                                        </small>
                                        <br>
                                        <small>
                                           Target Sale Rate :  <strong>{{$purchase->target_sale_amount}}</strong>
                                        </small>

                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a href="{{ route('purchases.show', $purchase->id) }}"
                                           class="level-item"
                                           title="View user data">
                                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ route('purchases.edit', $purchase->id) }}"
                                           class="level-item"
                                           title="View all transaction">
                                            <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                        </a>

                                        <!-- {!! delete_data('purchases.destroy',  $purchase->id) !!} -->
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach
            <div class="pagination_wrap pagination">
                {{$purchases->links('pagination::bootstrap-4')}}    
            </div>
        @endif
    </div>
@endsection
