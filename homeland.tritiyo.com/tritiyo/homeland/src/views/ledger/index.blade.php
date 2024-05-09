@extends('layouts.app')

@section('title')
    Ledgers
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Ledger',
            'spSubTitle' => 'all ledgers here',
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
    <div class="columns is-multiline">
        @if(!empty($ledgers))
            @foreach($ledgers as $ledger)
                <div class="column is-2">
                    <div class="borderedCol">
                        <article class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong>
                                            <a href="{{ route('ledgers.show', $ledger->id) }}"
                                               title="View route">
                                               <strong> {{ $ledger->name }} </strong>
                                            </a>
                                        </strong>
                                        <br/>
                                        <small>
                                            <strong>Type: </strong> {{ $ledger->type }}
                                        </small>
                                        <br/>
                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a href="{{ route('ledgers.show', $ledger->id) }}"
                                           class="level-item"
                                           title="View user data">
                                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ route('ledgers.edit', $ledger->id) }}"
                                           class="level-item"
                                           title="View all transaction">
                                            <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                        </a>

                                        <!-- {!! delete_data('ledgers.destroy',  $ledger->id) !!} -->
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach
            <div class="pagination_wrap pagination">
                {{$ledgers->links('pagination::bootstrap-4')}}    
            </div>
        @endif
    </div>
@endsection
