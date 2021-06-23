@extends('layouts.app')
@section('title', 'pages')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/s.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
@endsection
@section('content')
    <div class="container mt-5">
        {{-- -------------------Start Alert------------------------ --}}
        <div class="col-xl-12 col-md-12 col-sm-12 flex justify-content-center">
            @include('pages.alert')
        </div>
        {{-- ---------------------End Alert-------------------------- --}}
        <div class="app flex justify-content-center">
            <button type="button" title="{{ __('Add New Page') }}" class="add btn btn-primary mb-4 border-0"
                data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i>
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

            @include('pages.model_create')


            {{-- --------------------------------------End All Moduls------------------------ --}}
            <div class="row">
                @foreach ($pages as $page)
                    <div class="pages col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="card-page d-flex justify-content-evenly">
                            <div class="card-haeder">

                                <span class="badge badge-danger"> {{ $page->id }}</span>
                                <div class="d-flex flex-column  justify-content-between" style="min-height: 200px">
                                    <div class="d-flex flex-wrap justify-content-between mt-2 pl-2 pr-2">
                                        <div class="h2 text-danger">
                                            {{ __('Title Page') }}
                                        </div>
                                        <div class="h2">
                                            {{ $page->title }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between pl-2 pr-2">
                                        <div class="h5 text-primary">
                                            {{ __('Type') }}
                                        </div>
                                        <div class="h5">
                                            {{ $page->type }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between pl-2 pr-2">
                                        <div class="h5 text-primary">
                                            {{ __('Create Note Data') }} :
                                        </div>
                                        <div class="h5">
                                            {{ $page->created_at->toDayDateTimeString() }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between pl-2 pr-2">
                                        <div class="h5 text-primary">
                                            {{ __('Edit last Note') }} :
                                        </div>
                                        <div class="h5">
                                            {{ $page->updated_at->toDayDateTimeString() }}
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex flex-wrap flex-column justify-content-between mt-4 pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Discraption') }} :
                                    </div>
                                    <div class="h4 pt-3" style="word-break: break-all;">
                                        {{ $page->discraption }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex justify-content-evenly">
                                {{-- ------Botton Show Notes ------ --}}
                                <a href="pages/{{ $page->id }}/notes" type="button" title=""
                                    class="btn"> {{ __('Show') }}
                                    <i class="fas fa-eye"></i>
                                </a>
                                {{-- ------Botton delete pages ------ --}}
                                <a href="#" type="button" title="" class="btn " data-toggle="modal"
                                    data-target="#DeleteModal{{ $page->id }}"> {{ __('Delete') }} <i class="fas fa-trash-alt"></i>
                                </a>
                                {{-- ------Botton update pages ------ --}}
                                <a href="#" type="button" title="" class="btn btn-primary"
                                    data-toggle="modal" data-target="#modelEdit{{ $page->id }}"> {{ __('Edit') }} <i
                                        class="fas fa-edit"></i>
                                </a>

                                @include('pages.model_delete')
                                @include('pages.model_edit')
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                        crossorigin="anonymous"></script>
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
