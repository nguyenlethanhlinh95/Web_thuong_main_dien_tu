@extends('admin.layout.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List product</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List products
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th>Info</th>
                                    <th>Image</th>
                                    <th>Sales price</th>
                                    <th>Created at</th>
                                    <th>Update at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($products as $pro)
                                    <tr class="odd gradeX">
                                        <td class="center">{{ $i }}</td>
                                        <td class="center">{{ $pro->pro_name }}</td>
                                        <td class="center">{{ $pro->pro_code }}</td>
                                        <td class="center">{{ $pro->pro_price }}</td>
                                        <td class="center">{{ $pro->pro_info }}</td>
                                        <td class="center"><img data-src="uploads/images/products/{{ $pro->image }}" src="uploads/images/products/{{ $pro->image }}" alt="{{ $pro->pro_name }}" style="width: 50px; height: 50px;"></td>
                                        <td class="center">{{ $pro->spl_price }}</td>
                                        <td class="center">{{ $pro->created_at }}</td>
                                        <td class="center">{{ $pro->updated_at }}</td>
                                        <td>
                                            <a href="#">Delete</a> |
                                            <a href="#">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                                {{--<tr class="odd gradeX">--}}
                                    {{--<td>Trident</td>--}}
                                    {{--<td>Internet Explorer 4.0</td>--}}
                                    {{--<td>Win 95+</td>--}}
                                    {{--<td class="center">4</td>--}}
                                    {{--<td class="center">X</td>--}}
                                {{--</tr>--}}
                                {{--<tr class="even gradeC">--}}
                                    {{--<td>Trident</td>--}}
                                    {{--<td>Internet Explorer 5.0</td>--}}
                                    {{--<td>Win 95+</td>--}}
                                    {{--<td class="center">5</td>--}}
                                    {{--<td class="center">C</td>--}}
                                {{--</tr>--}}
                                </tbody>
                            </table>
                        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection