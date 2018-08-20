    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.speeches.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.speeches.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('slug', trans('validation.attributes.backend.speeches.slug'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.speeches.slug'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('content', trans('validation.attributes.backend.speeches.content'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('content', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.speeches.content'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('excerpt', trans('validation.attributes.backend.speeches.excerpt'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('excerpt', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.speeches.excerpt'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta', trans('validation.attributes.backend.speeches.meta'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.speeches.meta')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('image', trans('validation.attributes.backend.speeches.meta'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.speeches.meta')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

