@extends('layouts.app')
@section('title', 'notes Only')
@section('css')
    <link rel="stylesheet" href="/css/s.css">
    <link rel="stylesheet" href="/css/tasks.css">

@endsection
@section('content')

    <div class="container mt-5">
        {{-- -------------------Start Alert------------------------ --}}
        <div class="col-lg-12 col">
            @include('tasks.alert')
        </div>
        {{-- ---------------------End Alert-------------------------- --}}
        <div class="app">

            <button type="button" title="{{ __('Add New Task') }}" class="add btn btn-primary mb-4 border-0"
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


            @include('tasks.model_create')
            {{-- ------------------------------------ --}}
            <div class="row">
                @foreach ($tasks as $task)
                    <div class="pages col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="card-page">
                            <div class="card-haeder d-flex flex-column justify-content-center">
                                <span class="badge badge-primery">{{ $task->id }}</span>
                                @if ($task->taskComplete == 1)
                                <div class="d-flex flex-wrap justify-content-between pl-3 pr-3">
                                    <div class="h4 text-info">
                                        {{ __('Task Title') }} :
                                    </div>
                                    <br>
                                    <div class="h4" style="color: rgb(9, 255, 9);">
                                        {{ $task->title }}
                                    </div>
                                </div>
                                @else
                                <div class="d-flex flex-wrap justify-content-between pl-3 pr-3">
                                    <div class="h4 text-info">
                                        {{ __('Task Title') }} :
                                    </div>
                                    <br>
                                    <div class="h4" style="color: rgb(255, 0, 0);">
                                        {{ $task->title }}
                                    </div>
                                </div>
                                @endif
                                <hr>
                                <div class="d-flex flex-wrap justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Create Task Data') }} :
                                    </div>
                                    <div class="h5">
                                        {{ $task->created_at->toDayDateTimeString() }}
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Edit last Task') }} :
                                    </div>
                                    <div class="h5">
                                        {{ $task->updated_at->toDayDateTimeString() }}
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Task Data Expiere') }} :
                                    </div>
                                    <div class="h5">
                                        {{ $task->exp }}
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">
                                        {{ __('Task Type') }} :
                                    </div>
                                    <div class="h5">
                                        {{ $task->type }}
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between pl-2 pr-2">
                                    <div class="h5 text-primary">{{ __('Task Completed') }} : </div>
                                    @if ($task->taskComplete == 1)
                                        <div class="h5 text-primary">
                                            <i class="fas fa-check-circle" style="color: rgb(0, 255, 0)">
                                                {{ __('Complete') }}
                                            </i>
                                        </div>
                                    @else
                                        <div class="h5 text-primary">
                                            <i class="fas fa-times-circle" style="color: rgb(255, 0, 0)">
                                                {{ __('not Complete') }} </i>
                                        </div>
                                    @endif
                                </div>
                                <hr>
                                <p class="text-center text-primary">{{ __('Task Discription :') }}</p>
                                <p class=""style="font-size: 20px;min-height:125px;height:auto">{{ $task->note }}</p>
                            </div>
                            <div class="card-body">
                                {{-- ------Botton delete pages ------ --}}
                                <a type="button" class="btn " data-toggle="modal"
                                    data-target="#DeleteModal{{ $task->id }}"> <i class="fas fa-trash-alt"></i></a>
                                {{-- ------Botton update pages ------ --}}
                                <a type="button" class="btn" data-toggle="modal"
                                    data-target="#modelEdit{{ $task->id }}"> <i class="fas fa-edit"></i></a>

                                @include('tasks.model_delete')
                                @include('tasks.model_edit')
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
