@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create product</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create product
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('succ'))
                                    <div class="alert alert-success alertBox">
                                        {{ session('succ') }}
                                    </div>
                                @endif

                                 {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
                                    <div class="form-group">
                                        {{ Form::label('Proname', 'Name') }}
                                        {{ Form::text('pro_name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Code', 'Code') }}
                                        {{ Form::text('pro_code', null, array('class'=>'form-control', 'placeholder' => 'Enter code')) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Price', 'Price') }}
                                        {{ Form::text('pro_price', null, array('class'=>'form-control', 'placeholder' => 'Enter price')) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Description', 'Description') }}
                                        {{ Form::text('pro_info', null, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Text area</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('image', 'Image') }}
                                        {{ Form::file('image',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Sale Price', 'Sale Price') }}
                                        {{ Form::text('spl_price', null, array('class' => 'form-control')) }}

                                    </div>
                                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                                {!! Form::close() !!}
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>  <!-- End panel-body -->
                </div> <!-- End panel-default -->
            </div> <!-- End col 12 -->
        </div> <!-- End row -->

    </div>
                    <!-- /#page-wrapper -->
@endsection