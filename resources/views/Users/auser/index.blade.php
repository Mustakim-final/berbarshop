@extends('Users.useradmin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Barber Schedul</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>9AM to 10 AM</th>
                                    <th>10AM to 11 AM</th>
                                    <th>11AM to 12 PM</th>
                                    <th>1PM to 2 PM</th>
                                    <th>2PM to 3 PM</th>
                                    <th>3PM to 4 PM</th>
                                    <th>Action</th>


                                </tr>
                            </thead>

                            @foreach ($schedul as $row)
                                <tbody>
                                    @if ($loop->iteration == 1)
                                        @foreach ($row as $key => $row1)
                                            @if ($loop->iteration == 1)
                                                <th>{{ ++$key }}</th>
                                                <th>{{ $row1->name }}</th>
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 2)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 3)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 4)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 5)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 6)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="{{ route('customer.apointmentpage', $row1->b_id) }}"
                                                class="btn btn-info">Apointment</a>
                                        </td>
                                    @elseif ($loop->iteration == 2)
                                        @foreach ($row as $key => $row1)
                                            @if ($loop->iteration == 1)
                                                <th>{{ ++$key }}</th>
                                                <th>{{ $row1->name }}</th>
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 2)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 3)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 4)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 5)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 6)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="{{ route('customer.apointmentpage', $row1->b_id) }}"
                                                class="btn btn-info">Apointment</a>
                                        </td>
                                    @elseif ($loop->iteration == 3)
                                        @foreach ($row as $key => $row1)
                                            @if ($loop->iteration == 1)
                                                <th>{{ ++$key }}</th>
                                                <th>{{ $row1->name }}</th>
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 2)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 3)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 4)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 5)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @elseif($loop->iteration == 6)
                                                @if ($row1->duration == 60)
                                                    <th>Available</th>
                                                @else
                                                    <th>Unavailable</th>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="{{ route('customer.apointmentpage', $row1->b_id) }}"
                                                class="btn btn-info">Apointment</a>
                                        </td>
                                    @endif
                                </tbody>
                            @endforeach

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>9AM to 10 AM</th>
                                    <th>10AM to 11 AM</th>
                                    <th>11AM to 12 PM</th>
                                    <th>1PM to 2 PM</th>
                                    <th>2PM to 3 PM</th>
                                    <th>3PM to 4 PM</th>
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
