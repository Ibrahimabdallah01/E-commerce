@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $getRecord->name }}" required name="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{ $getRecord->email }}" required name="email" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" required name="password" placeholder="Password">
                    <p>Do you want to change passowrd so please add</p>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" value required name="status">
                        <option {{ ($getRecord->status == 0 ? 'selected' : '') }} value="0">Active</option>
                        <option {{ (!$getRecord->status == 1 ? 'selected' : '') }} value="1">Inactive</option>
                    </select>
                </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('dist/js/pages/dashboard3.js') }}"></script>
@endsection
