<div class="form-group">
    <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
        {{ Form::submit(String::capitalize($msg), ['class' => 'btn btn-primary']) }}
        {{ Form::reset(String::capitalize(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
    </div>
</div>