<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group mb-3">
            {{ Form::label('title') }}
            {{ Form::text('title', $posts->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-3">
            {{ Form::label('body') }}
            {{ Form::text('body', $posts->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'body']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>