    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.publications.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.publications.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('slug', trans('validation.attributes.backend.publications.slug'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.publications.slug'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('content', trans('validation.attributes.backend.publications.content'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('content', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.publications.content'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('excerpt', trans('validation.attributes.backend.publications.excerpt'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('excerpt', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.publications.excerpt'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta', trans('validation.attributes.backend.publications.meta'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.publications.meta')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('image', trans('validation.attributes.backend.publications.meta'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.publications.meta')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

