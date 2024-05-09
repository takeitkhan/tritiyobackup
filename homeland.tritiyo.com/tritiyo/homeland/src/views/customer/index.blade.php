@extends('layouts.app')

@section('title')
    Customers
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Customer',
            'spSubTitle' => 'all customers here',
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
    <div class="columns is-multiline">
        @if(!empty($customers))
            @foreach($customers as $customer)
                <div class="column is-2">
                    <div class="borderedCol">
                        <article class="media">
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong>
                                            <a href="{{ route('customers.show', $customer->id) }}"
                                               title="View route">
                                               <strong> {{ $customer->name }} </strong>
                                            </a>
                                        </strong>
                                        <br/>
                                        <small>
                                            <strong>Phone: </strong> {{ $customer->phone }}
                                        </small>
                                        <br/>
                                        <small>
                                            <strong>Company: </strong> {{ $customer->company }}
                                        </small>
                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <a href="{{ route('customers.show', $customer->id) }}"
                                           class="level-item"
                                           title="View user data">
                                            <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ route('customers.edit', $customer->id) }}"
                                           class="level-item"
                                           title="View all transaction">
                                            <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                        </a>

                                        <!-- {!! delete_data('customers.destroy',  $customer->id) !!} -->
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach

            <div class="pagination_wrap pagination">
                {{$customers->links('pagination::bootstrap-4')}}    
            </div>

        @endif
    </div>
@endsection
