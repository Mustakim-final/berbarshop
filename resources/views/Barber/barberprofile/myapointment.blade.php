@extends('Barber.useradmin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Current Booking Request</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->


          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Date</th>
                <th>Action</th>


              </tr>
              </thead>
              <tbody>



              @foreach ($schedul as $key=>$row)
                  <tr>
                    <th>{{ ++$key }}</th>
                    <td>{{ $row->customer_name }}</td>
                    <th>{{ $row->time }}</th>

                    <th>{{ $row->end_time }}</th>
                    <th>{{ $row->date }}</th>

                    <td>
                        @if ($row->duration==60)
                        <a href="{{ route('barber.customerbookingconfirm',$row->id) }}" class="btn btn-info">Confirm</a>
                        @else
                        <a href="{{ route('barber.customerbookingcancel',$row->id) }}" class="btn btn-info">Cancel</a>
                        @endif

                    </td>
                  </tr>
              @endforeach


              </tbody>
              <tfoot>
              <tr>
                <th>#</th>

                <th>Customer Name</th>
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
