@extends('layouts.nav')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User List</h3>

                        <div class="card-tools">
                            <form action="{{ url('/usersearch') }}" method="GET" class="col-md-10 row mt-1">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-tools">
                            <form action="{{ route('users.create') }}" class="col-md-10 row mr-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birth Date</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['phone'] }}</td>
                                    <td>{{ $user['dob'] }}</td>
                                    <td>{{ $user['address'] }}</td>
                                    <td>
                                        <form method="post" action="{{ route('users.edit', $user->id) }}" > 	
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('users.destroy' , $user->id ) }}" onsubmit="return confirm('Are you sure?')"> 	
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    
                                    {{-- <td>
                                        <a href="#" class="btn btn-danger delete btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $user->id }}"><i class="fas fa-trash"></i>
                                            &nbsp; &nbsp;Delete</a>
                                        <!-- Delete Modal -->
                                        <div class="modal modal-danger fade" id="deleteModal{{ $user->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title text-danger font-weight-bold"
                                                            id="exampleModalLabel">Delete User</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('users.destroy', $user->id ) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <h5 class="text-center text-primary">Are you sure you want
                                                                to delete this user?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                    </div>
                    <!-- End Delete Modal -->
                    </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection