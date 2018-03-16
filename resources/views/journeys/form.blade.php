
@inject('stations', 'App\Http\Utilities\Stations' )
<div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-6">
                    One of two columns
                </div>
                <div class="col-6">
                    <div class="form-group form-group-lg">
                        {!! Form::label('start', 'Start:', ['class' => 'control-label']) !!}
                        {!! Form::text('start', 'Mill Hill Broadway', ['class' => 'form-control']) !!}
                    </div><!-- /.form-group -->


                    <div class="form-group form-group-lg">
                    {!! Form::label('destination', 'Destination:', ['class' => 'control-label']) !!}
                        <select name="destination">
                            <option value="Mill Hill">Mill Hill Broadway</option>
                            <option value="Sudbury">Sudbury Hill</option>
                            <option value="Wealdstone">Harrow & Wealdstone</option>
                        </select>

                       <!-- /#stations -->
                        <!-- /#destination -->
                    </div><!-- /.form-group -->



                    <div class="form-group form-group-lg">
                        {!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}
                        {!! Form::text('cost', , ['class' => 'form-control']) !!}
                    </div><!-- /.form-group -->

                    <div class="button-centre">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-secondary', 'data-confirm' => 'Are you sure about that?']) !!}
                    </div><!-- /.form-group -->
                </div>
            </div>


             </div>








</div>
<!-- /.container -->

