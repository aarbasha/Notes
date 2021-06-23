@extends('layouts.app')
@section('title', 'notes Only')
@section('css')
    <link rel="stylesheet" href="/css/s.css">
    <link rel="stylesheet" href="/css/notes_only.css">

@endsection
@section('content')

    <div class="container mt-5">
        {{-- -------------------Start Alert------------------------ --}}
        <div class="col-lg-12 col">
           @include('notes_only.alert')
        </div>
        {{-- ---------------------End Alert-------------------------- --}}
        <div class="app">

            <button type="button" class="add btn btn-primary mb-4 border-0" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i>
                {{-- {{ __('Add New Page') }} --}}
            </button>

            <div class="search-wrapper">
                <div class="input-holder ">
                    <input type="text " class="search-input" placeholder="Type to search " />
                    <button class="search-icon" onclick="searchToggle(this, event); ">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <span class="close " onclick="searchToggle(this, event); "></span>
            </div>


            @include('notes_only.model_create')
            {{-- ------------------------------------ --}}
            <div class="row  d-flex justify-content-center">
                @foreach ($notesonly as $note)
                    <div class="pages col-xl-6 col-lg-12 col-md-12">
                        <div class="card-page">
                            <div class="card-haeder d-flex flex-column justify-content-center">
                                <h3>{{ $note->title }} <span class="badge badge-danger">{{ $note->id }}</span></h3>
                                <hr>
                                <div class="d-flex justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Create Note Data') }} :
                                    </div>
                                    <div class="h5">
                                        {{ $note->created_at->toDayDateTimeString() }}
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Edit last Note') }} :
                                    </div>
                                    <div class="h5">
                                        {{ $note->updated_at->toDayDateTimeString() }}
                                    </div>
                                </div>
                                <hr>
                                <p style="font-size: 20px;min-height:300px;height:auto">{{ $note->note }}</p>
                            </div>
                            <div class="card-body">
                                {{-- ------Botton delete pages ------ --}}
                                <a type="button" class="btn " data-toggle="modal"
                                    data-target="#DeleteModal{{ $note->id }}"> <i class="fas fa-trash-alt"></i></a>
                                {{-- ------Botton update pages ------ --}}
                                <a type="button" class="btn" data-toggle="modal"
                                    data-target="#modelEdit{{ $note->id }}"> <i class="fas fa-edit"></i></a>

                                @include('notes_only.model_delete')
                                @include('notes_only.model_edit')
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script>
                $(Document).ready(function() {
                    $('.alert').fadeOut(8000);
                });

                function searchToggle(obj, evt) {
                    var container = $(obj).closest('.search-wrapper');
                    if (!container.hasClass('active')) {
                        container.addClass('active');
                        evt.preventDefault();
                    } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
                        container.removeClass('active');
                        // clear input
                        container.find('.search-input').val('');
                    }
                }

            </script>
        @endsection
