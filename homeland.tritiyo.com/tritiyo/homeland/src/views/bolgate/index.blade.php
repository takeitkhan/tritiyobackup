@extends('layouts.app')

@section('title')
    Bolegates
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'All Bolgate',
            'spSubTitle' => 'all bolgate here',
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
            'spPlaceholder' => 'Search bolgates...',
            'spMessage' => $message = $message ?? NULl,
            'spStatus' => $status = $status ?? NULL
        ])
    </nav>
</section>

@section('column_left')
    <div class="columns is-multiline">
        @if(!empty($bolgates))
            @foreach($bolgates as $bolegate)
                <div class="column is-4">
                    <div class="borderedCol">
                        <article class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong>
                                            <a href="{{ route('bolgates.show', $bolegate->id) }}"
                                               title="View route">
                                               <strong> {{ $bolegate->name }} </strong>
                                            </a>
                                        </strong>
                                        <br/>
                                        <small>
                                            <strong>Size: </strong> {{ $bolegate->size }},
                                        </small>
                                        <br/>
                                        <small>
                                            <strong>Owner:</strong> {{ $bolegate->owner }}
                                        </small>
                                        <br/>
                                        <small>
                                            <strong>Phone:</strong> {{ $bolegate->phone }}
                                        </small>
                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a href="{{ route('bolgates.show', $bolegate->id) }}"
                                           class="level-item"
                                           title="View user data">
                                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ route('bolgates.edit', $bolegate->id) }}"
                                           class="level-item"
                                           title="View all transaction">
                                            <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                        </a>

                                        <!-- {!! delete_data('bolgates.destroy',  $bolegate->id) !!} -->
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach

            <div class="pagination_wrap pagination">
                {{$bolgates->links('pagination::bootstrap-4')}}    
            </div>

        @endif
    </div>
@endsection
