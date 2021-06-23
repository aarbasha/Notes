<form action="{{ route('notes_only.store') }}" method="post" autocomplete="off">
    {{-- <form action="/{{$page->id}}/note" method="post" autocomplete="off"> --}}
    {{ csrf_field() }}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> {{ __('Note Title') }} </label>
                        <input type="text" class="" id="title" name="title" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('note') }}</label>
                        <textarea class=" rounded-0" id="note" name="note" rows="8">{{old('note')}}</textarea>
                    </div>

                    <div class="modal-footer justify-content-center border-0">
                        <button type="submit"
                            class="btn btn-lg ml-2  border-0 btn-outline-primary">{{ __('Save') }}</button>
                        <button type="button" class="btn btn-lg ml-2  border-0 btn-outline-danger"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="reset"
                            class="btn btn-lg ml-2  border-0 btn-outline-success">{{ __('Clear') }}</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
