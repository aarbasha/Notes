<form action="{{ route('pages.destroy', $page->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}

    <div class="modal fade" id="DeleteModal{{ $page->id }}" tabindex="-1" role="dialog"
        aria-labelledby="DeleteModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <h2 class="text-center text-warning">
                        {{ __('Do you want to delete the page ?') }}
                        <p class="mt-5 text-danger">{{ $page->title }}</p>
                    </h2>

                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-lg ml-2  border-0 btn-outline-primary"
                        data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-lg ml-2  border-0 btn-outline-danger">
                        {{ __('Yes Delete') }}</button>
                </div>

            </div>
        </div>
    </div>
</form>
