@extends ('backend.layouts.app')

@section ('title', __('labels.backend.quotes.management') . ' | ' . __('labels.backend.quotes.create'))

@section('content')
    {{ html()->form('POST', route('admin.quotes.store'))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.quotes.management') }}
                        <small class="text-muted">{{ __('labels.backend.quotes.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quotes.content'))->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.quotes.content'))
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quotes.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.quotes.name'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quotes.position'))->class('col-md-2 form-control-label')->for('position') }}

                        <div class="col-md-10">
                            {{ html()->text('position')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.quotes.position'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.quotes.image'))->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('image')
                                ->id('readimage')
                                ->class('form-control')
                                ->required() }}
                            <img id="imagedisplay" style="display: none;" />
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection

@push('after-scripts')
    <script>

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagedisplay').attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#readimage").change(function() {
            readURL(this);
        });
    </script>
@endpush