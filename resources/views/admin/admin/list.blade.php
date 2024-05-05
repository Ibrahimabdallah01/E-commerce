@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Admin List</h1>
                </div>
                <div class="col-sm-6" style="text-align: right">
                    <a href="{{ url("admin/admin/add") }}" class="btn btn-primary">Add New List</a>
                </div>
              </div>
            </div>
          </section>

          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    @include('message')

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Admin List</h3>
                    </div>
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-primary">edit</a>
                                        <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            {{-- @foreach ($getRecord as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $value->action }}</td>
                                </tr>
                            @endforeach --}}

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </section>
    </div>
@endsection

@section('script')
    <script src="{{ url('dist/js/pages/dashboard3.js') }}"></script>
@endsection
