@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">

@endsection
@section('title', 'Page Home')
@section('content')
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center text-center mt-5">
                <h1> في تطبيق ادارة الملاحظات <span class="text-primary"> {{ Auth::user()->name }}</span> مرحباً بكم</h1>

            </div>
            <div class="row w-100 mt-4 d-flex justify-content-center">
                <div class="col-lg-4 d-flex justify-content-center">
                    <h3>
                        <a href="{{ route('pages.index') }}" class="btn btn-primary btn-md  text-center"> لانشاء صفحة
                            تحتوي
                            عدة ملاحظات جديدة اضغط هنا </a>
                    </h3>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <h3>
                        <a href="{{ route('notes_only.index') }}" class="btn btn-danger btn-md text-center"> لانشاء ملاحظة
                            مفردة
                            جديدة اضغط هنا </a>
                    </h3>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <h3>
                        <a href="{{ route('tasks.index') }}" class="btn btn-success btn-md  text-center"> لانشاء مهمة
                            مجدولة
                            جديدة اضغط هنا </a>
                    </h3>
                </div>

            </div>

            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="wrapper">
                        <div class="display">
                            <div id="time">
                            </div>
                        </div>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="col-lg-12 mt-5 d-flex justify-content-center">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your Title Page OR Title Note OR Title Task OR any Discription OR ID number">
                          <span class="input-group-btn">
                            <button class="btn btn-search" type="button"><i class="fa fa-search fa-fw"></i> Search</button>
                          </span>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

<script>
    setInterval(() => {
        const time = document.querySelector(".display #time");
        let date = new Date();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        let day_night = "AM";
        if (hours > 12) {
            day_night = "PM";
            hours = hours - 12;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (hours < 10) {
            hours = "0" + hours;
        }
        time.textContent = hours + ":" + minutes + ":" + seconds + " " + day_night;
    });
</script>
