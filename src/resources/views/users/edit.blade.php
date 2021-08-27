@extends('layouts.nav')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title font-weight-bold">User Update</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('users.update',  $user->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" placeholder="Name" value="{{ $user -> name }}">
                @error('name')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control @error('email') border-danger @enderror" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{ $user -> email }}">
                @error('email')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              {{-- <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control @error('password') border-danger @enderror" id="exampleInputPassword1" name="password"
                  placeholder="Password" value="{{ $user -> password }}" >
                  @error('password')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="c-password">Confirm Password</label>
                <input type="password" class="form-control @error('c-password') border-danger @enderror" id="c-password" name="c-password"
                  placeholder="Confirm Password" value="{{ $user -> c-password }}">
                  @error('c-password')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                  @enderror
              </div> --}}
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" class="form-control @error('phone') border-danger @enderror" id="phone" name="phone" placeholder="Phone" value="{{ $user -> phone }}">
                @error('phone')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control @error('dob') border-danger @enderror" id="dob" name="dob" placeholder="Date of Birth" value="{{ $user -> dob }}">
                @error('dob')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control @error('address') border-danger @enderror" id="address" name="address" placeholder="Address" value="{{ $user -> address }}">
                @error('address')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer float-right">
              <a href="{{ route('users.index') }}" class="btn btn-primary">Cancel</a>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection