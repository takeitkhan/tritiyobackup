@extends('layouts.app')

@section('title')
    Users
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Users',
            'spSubTitle' => 'all users here',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spTitle' => 'Users',
            'spAddUrl' => route('users.create'),
            'spAllData' => route('users.index'),
            'spSearchData' => route('users.search'),
            'spTitle' => 'Users',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spAddUrl' => route('users.create'),
            'spAllData' => route('users.index'),
            'spSearchData' => route('users.search'),
            'spPlaceholder' => 'Search user...',
            'spMessage' => $message = $message ?? NULl,
            'spStatus' => $status = $status ?? NULL
        ])
    </nav>
</section>
@php
    function enrollStatus($status) {
        switch ($status) {
          case 'Enroll':
            $colorClass = '';
            break;
          case 'Terminated':
            $colorClass = 'is-danger has-text-danger';
            break;
          case 'Long Leave':
            $colorClass = 'is-link has-text-link';
            break;
            case 'Left Job':
                $colorClass = 'is-warning has-text-warning';
            break;
          default:
            $colorClass = '';
        }
        return $colorClass;
    }
@endphp
@section('column_left')
    <div class="columns is-multiline">
        @foreach($users as $user)
            <div class="column is-3">
                <article class="borderedCol media message {{ enrollStatus($user->employee_status) }}">
                    <div class="media-content">
                        <div class="content">
                            <div>
                                <strong>
                                    <a href="{{ route('users.show', $user->id) }}"
                                    title="View user">
                                        {{ $user->name }}
                                    </a>
                                </strong>
                            </div>
                            <div style="color: #000 !important;">
                                <small>
                                    <strong>Designation: </strong> {{ \App\Models\Designation::where('id', $user->designation)->first()->name }}
                                </small>
                                <br/>
                                <small>
                                    <strong>Role: </strong> {{ \App\Models\Role::where('id', $user->role)->first()->name }}
                                </small>
                                <br/>
                                <small>
                                    <strong>Email: </strong> {{ $user->email }}
                                </small>
                                <br/>
                                <small>
                                    <strong>Employee No:</strong> {{ $user->employee_no }} &
                                    <strong>Phone: </strong> {{ $user->phone }}
                                </small>
                            </div>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a href="{{ route('users.show', $user->id) }}"
                                class="level-item"
                                title="View user data">
                                    <span class="icon is-small"><i class="fas fa-eye"></i></span>
                                </a>
                                <a href="{{ route('users.basic_info', $user->id) }}"
                                class="level-item"
                                title="View all transaction">
                                    <span class="icon is-info is-small"><i class="fas fa-edit"></i></span>
                                </a>
                                <!--
                                <a class="level-item" title="Delete user" href="javascript:void(0)" onclick="confirm('Are you sure?')">
                                    <span class="icon is-small is-red"><i class="fas fa-times"></i></span>
                                </a>
                                -->
                            </div>
                        </nav>
                    </div>
                    <figure class="media-right">
                        <p class="image is-64x64">
                            @if(!empty($user->avatar))
                                <img class="is-rounded avatar"
                                    src="{{ url($user->avatar) }}" alt="{{ $user->name }}">
                            @else
                                <img class="is-rounded avatar"
                                    src="https://bulma.io/images/placeholders/128x128.png">
                            @endif
                        </p>
                    </figure>
                </article>
            </div>
        @endforeach
    </div>

    <div class="pagination_wrap pagination is-centered">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection

<style>
    article.media {
        border: 1px solid #eeeeee;
    }

    article.media.message {
        padding: 10px;
        font-size: 13px;
        overflow-wrap: break-word;
    }

    img.avatar {
        width: 70px !important;
        height: 70px !important;
        min-width: 70px !important;
        min-height: 70px !important;
    }

    .message a:not(.button):not(.tag):not(.dropdown-item) {
        text-decoration: none !important;
    }

</style>
