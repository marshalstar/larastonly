<div class="form-group">
    <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
        {{ Form::submit(Str::title($msg), ['class' => 'btn btn-primary']) }}
        {{ Form::reset(Str::title(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
    </div>
</div>