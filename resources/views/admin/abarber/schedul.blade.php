@extends('admin.useradmin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Set Schedul for <span style="color: yellow">{{ $barber->name }}</span></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ route('admin.barbarschedulpost',$barber->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputEmail1">Set Start Time</label>
                <input type="time" class="form-control" name="time" id="exampleInputEmail1" placeholder="set time">
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Set End Time</label>
                <input type="time" class="form-control" name="end_time" id="exampleInputEmail1" placeholder="set time">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Set date</label>
                <input type="date" class="form-control" name="date" id="exampleInputEmail1" placeholder="set date">
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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
