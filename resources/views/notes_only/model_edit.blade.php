<form action="{{ route('notes_only.update', $note->id) }}" method="post" autocomplete="off">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade" id="modelEdit{{ $note->id }}" tabindex="-1" role="dialog" aria-labelledby="modelEdit"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="form-group">

                        <label for="exampleInputEmail1">{{ __('Note Title') }} </label>
                        <input type="text" class="" id="title" name="title" value="{{ $note->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('note') }}</label>
                        <textarea class=" rounded-0" id="note" name="note" rows="10" max="30"
                            value=''>{{ $note->note }}</textarea>
                    </div>
                    <div class="modal-footer justify-content-center border-0">
                        <button type="submit" class="btn btn-lg ml-2  border-0 btn-outline-primary">
                            {{ __('Save Change') }} </button>
                        <button type="button" class="btn btn-lg ml-2  border-0 btn-outline-danger"
                            data-dismiss="modal">{{ __('Close') }}</button>
                        {{-- <button type="reset"
                            class="btn btn-lg ml-2  border-0 btn-outline-success">{{ __('Clear') }}</button> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
