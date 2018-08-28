@extends ('backend.layouts.app')

@section ('title', __('labels.backend.publications.management') . ' | ' . __('labels.backend.publications.create'))

@section('content')
    {{ html()->modelForm($publication, 'PATCH', route('admin.publications.update', $publication->id))->class('form-horizontal')->acceptsFiles()->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.publications.management') }}
                        <small class="text-muted">{{ __('labels.backend.publications.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.publications.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.publications.name'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.publications.year'))->class('col-md-2 form-control-label')->for('year') }}

                        <div class="col-md-10">
                            {{ html()->text('year')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.publications.year'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.publications.content'))->class('col-md-2 form-control-label')->for('content') }}

                        <div class="col-md-10">
                            {{ html()->textarea('content')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.publications.content'))
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.publications.url'))->class('col-md-2 form-control-label')->for('url') }}

                        <div class="col-md-10">
                            {{ html()->text('url')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.publications.url'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.publications.image'))->class('col-md-2 form-control-label')->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('image')
                                ->id('readimage')
                                ->class('form-control')
                                 }}
                            @if(isset($publication->image) && $publication->image)
                                <img id="imagedisplay" src="{{ url('/').'/img/publications/'.$publication->image }}" />
                            @else
                                <img id="imagedisplay" style="display: none;" />
                            @endif
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
                    {{ form_submit(__('buttons.general.crud.update')) }}
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