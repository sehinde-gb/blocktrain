



<div class="form-group form-group-lg">
{!! Form::label('destination', 'Destination:', ['class' => 'control-label']) !!}
{!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div><!-- /.form-group -->


<div class="button-centre">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-secondary', 'data-confirm' => 'Are you sure about that?']) !!}
</div><!-- /.form-group -->