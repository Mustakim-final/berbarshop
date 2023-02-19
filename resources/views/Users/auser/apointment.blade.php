@extends('Users.useradmin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        @foreach ($barber as $row)
                            @if ($loop->iteration == 1)
                                <h3 class="card-title">Set Apointment for <span
                                        style="color: yellow">{{ $row->name }}</span></h3>
                            @endif
                        @endforeach

                    </div>


                    <!-- /.card-header -->
                    <!-- form start -->
                    @foreach ($barber as $row)
                        @if ($loop->iteration == 1)
                            <form method="POST" action="{{ route('customer.apointmentpost',$row->b_id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Set Time</label>
                                        <select name="schedul_id" class="form-control" required>
                                            <option disabled selected>Select One</option>
                                            @foreach ($schedul as $row)
                                                <option value="{{ $row->id }}" class="text-info">
                                                    {{ $row->time }}-{{ $row->end_time }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        @endif
                    @endforeach


                </div>
                <!-- /.card -->

                <!-- general form elements -->

                <!-- /.card -->


                <!-- /.card -->
                <!-- Horizontal Form -->

                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
