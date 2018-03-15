<div class="row justify-content-center">
    <div class="col-6">
        One of two columns
    </div>
    <div class="col-6">


<div class="form-group form-group-lg">
    {!! Form::label('balance', 'Balance:', ['class' => 'control-label']) !!}
    {!! Form::text('balance', '0.00', ['class' => 'form-control']) !!}
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
    {!! Form::label('discount', 'Discount:', ['class' => 'control-label']) !!}
    {!! Form::text('discount', null, ['class' => 'form-control']) !!}
</div><!-- /.form-group -->


<div class="button-centre">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-secondary', 'data-confirm' => 'Are you sure about that?']) !!}
</div><!-- /.form-group -->

    </div>
</div>