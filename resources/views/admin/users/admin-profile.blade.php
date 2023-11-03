@extends('admin.adminlayout')

@section('content')
<div class="card">
 

    <div class="card-header">
        <h4>Admin Profile <i class="material-icons opacity-10 ms-1 ">contacts</i>     
    </h4>
    </div>
 
    <div class="card-body">
        <div class="row">
            <div class="col-6">
               <div>
               
                <form action="{{url('admin-profile-set/'.$admin->id)}}" method="post">
                    @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Admin Name </label>
                    <input type="text" value="{{$admin->name}}" class="form-control" name="name">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email </label>
                    <input type="text" value="{{$admin->email}}" class="form-control" name="email">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
                <div class="mb-4">
                    <label for="" class="form-label">Mobile </label>
                    <input type="text" value="{{$admin->mobile}}" class="form-control" name="mobile">
                    @error('mobile')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
                <div class="mb-4">
                    <label for="" class="form-label">role</label>
                    <select class="form-select" name="roles" required>
                        <option selected value="">Choose one</option>
                        <option value="admin" {{$admin->role == 1 ? 'selected' : ''}}  >Admin</option>
                        <option value="user" {{$admin->role == 0 ? 'selected' : ''}}  >User</option>
                      
                      </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
               </div>
            </div>

            <div class="col-6">
               <div>
                <form action="{{url('admin-profile-password/'.$admin->id)}}" method="post">
                    @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Current Password </label>
                    <input type="password" value="" class="form-control" name="current_password">
                      @error('current_password')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
                <div class="mb-3">
                    <label for="" class="form-label">New Password </label>
                    <input type="password" value="" class="form-control" name="password">
                      @error('password')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
            </div>
                <div class="mb-4">
                    <label for="" class="form-label">Confirm Password </label>
                    <input type="password" value="" class="form-control" name="password_confirmation">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Set Password</button>
            </div>
        </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection