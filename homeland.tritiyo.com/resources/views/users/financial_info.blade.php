@extends('layouts.app')
@section('title')
    Financial Information
@endsection

<section class="hero is-white borderBtmLight">
    <nav class="level">
        @include('component.title_set', [
            'spTitle' => 'Financial Information',
            'spSubTitle' => 'Edit user financial information',
            'spShowTitleSet' => true
        ])

        @include('component.button_set', [
            'spShowButtonSet' => true,
            'spAddUrl' => null,
            'spAddUrl' => route('users.create'),
            'spAllData' => route('users.index'),
            'spSearchData' => route('users.search'),
            'spTitle' => 'Users',
        ])

        @include('component.filter_set', [
            'spShowFilterSet' => true,
            'spPlaceholder' => 'Search user...',
            'spMessage' => $message = $message ?? NULl,
            'spStatus' => $status = $status ?? NULL
        ])
    </nav>
</section>
@section('column_left')
    <article class="panel is-primary">
        <p class="panel-tabs">
            <a href="{{ route('users.basic_info', $id) }}">Basic Information</a>
            <a href="{{ route('users.contact_info', $id) }}">Other Information</a>
            <a href="{{ route('users.user_photos', $id) }}">Images</a>
            <a href="{{ route('users.user_permissions', $id) }}">Permissions</a>
            <a href="{{ route('users.financial_info', $id) }}" class="is-active">Financial Information</a>
        </p>

        <div class="customContainer">
            {{ Form::open(array('url' => route('users.financial_info', $id), 'method' => 'post', 'value' => 'PATCH', 'id' => 'add_user', 'files' => true, 'autocomplete' => 'off')) }}
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        {{ Form::label('bank_information', 'Bank Information', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::textarea('bank_information', $user->bank_information, ['required', 'class' => 'textarea', 'placeholder' => 'Enter bank information...']) }}
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        {{ Form::label('mbanking_information', 'Mobile Banking Information', array('class' => 'label')) }}
                        <div class="control">
                            {{ Form::textarea('mbanking_information', $user->mbanking_information, ['required', 'class' => 'textarea', 'placeholder' => 'Enter bank information...']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field is-grouped">
                        <div class="control">
                            <input type="submit"
                                   name="financial_info"
                                   class="button is-success is-small"
                                   value="Save Changes"/>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </article>
@endsection

@section('column_right')
@endsection
