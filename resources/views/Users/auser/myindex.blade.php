@extends('Users.useradmin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Your Apointment time and date</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($apointment as $key => $row)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td>{{ $row->s_time }}</td>
                                        <th>{{ $row->e_time }}</th>
                                        <th>{{ $row->date }}</th>
                                        <th>
                                            <a href="{{ route('customer.apointmentdelete', $row->schedul_id) }}"
                                                class="btn btn-info">Cancel</a>
                                            <a href="{{ route('customer.apointmentupdatepage',[$row->schedul_id, $row->b_id]) }}"
                                                class="btn btn-info">update</a>
                                        </th>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
