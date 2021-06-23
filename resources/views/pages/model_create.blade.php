       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('pages.store') }}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1"> {{ __('Page Title') }} </label>
                                <input type="text" class="" id="title" name="title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group select">
                                <select name="type" id="" value="{{ old('type') }}">
                                    <option value="Business"> {{ __('Business') }} </option>
                                    <option value="Tasks">{{ __('Tasks') }} </option>
                                    <option value="sport">{{ __('sport') }} </option>
                                    <option value="education">{{ __('education') }} </option>
                                    <option value="cooking">{{ __('cooking') }} </option>
                                    <option value="other">{{ __('other') }} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ __('discraption') }}</label>
                                <textarea class=" rounded-0" id="discraption" name="discraption" rows="5" max="30"
                                    value="{{ old('discraption') }}"></textarea>
                            </div>
                            <div class="modal-footer justify-content-center border-0">
                                <button type="submit"
                                    class="btn btn-lg ml-2  border-0 btn-outline-primary">{{ __('Save') }}</button>
                                <button type="button" class="btn btn-lg ml-2  border-0 btn-outline-danger"
                                    data-dismiss="modal">{{ __('Close') }}</button>
                                <button type="reset"
                                    class="btn btn-lg ml-2  border-0 btn-outline-success">{{ __('Clear') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
