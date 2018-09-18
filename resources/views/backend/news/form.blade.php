    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.news.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.news.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('slug', trans('validation.attributes.backend.news.slug'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('slug', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.news.slug'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('content', trans('validation.attributes.backend.news.content'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('content', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.news.content'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('excerpt', trans('validation.attributes.backend.news.excerpt'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('excerpt', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.news.excerpt'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('meta', trans('validation.attributes.backend.news.meta'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.news.meta')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('image', trans('validation.attributes.backend.news.meta'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('meta', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.news.meta')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

