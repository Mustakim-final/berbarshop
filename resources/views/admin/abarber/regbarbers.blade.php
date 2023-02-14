@extends('admin.useradmin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Barber Set</h3>
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
                <th>Email</th>
                <th>Action</th>


              </tr>
              </thead>
              <tbody>



              @foreach ($barber as $key=>$row)
                  <tr>
                    <th>{{ ++$key }}</th>
                    <td>{{ $row->name }}</td>
                    <th>{{ $row->email }}</th>

                    <td>
                        @if ($row->isBarber==2)
                        <a href="{{ route('admin.barberunconfirm',$row->id) }}" class="btn btn-info">Barber</a>
                        @else
                        <a href="{{ route('admin.barberconfirm',$row->id) }}" class="btn btn-info">Confirm</a>
                        @endif

                    </td>
                  </tr>
              @endforeach


              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
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
