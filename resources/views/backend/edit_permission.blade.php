@extends('backend.master')
@section('content')
<div class="sl-pagebody">
    <div class="row row-sm mg-t-20">
      <div class="col-xl-6">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Assigning Specific Permission TO User</h6>
          <form action="{{ route('PermissionChangeToUser') }}" method="POST"  class="form-control">
            @csrf
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">User: <span class="tx-danger"></span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <h6 class="card-body-title">{{ $user->name }}</h6>
            </div>
          </div>

          <div class="row mg-t-20">
              <input type="hidden" name="user_id" value="{{ $user->id }}" >
            <label class="col-sm-4 form-control-label">Permissions: <span class="tx-danger"></span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          
                @foreach ($permissions as $key=>$data)
                <li style="list-style: none;">
                    <input value="{{ $data->name }}" type="checkbox" name="permission[]" id="p{{ $key }}" {{ $user->hasPermissionTo($data->name) ? "checked" : '' }}> <label for="p{{ $key }}">{{ $data->name }}</label>
                </li>
                @endforeach
              
            </div>
          </div>
          
          <div class="form-layout-footer mg-t-30">
            <input class="btn btn-primary mt-2" type="submit" value="Assign">
          </form> 
            <a href="{{ route('RoleManager') }}" class="btn btn-dark mt-2">Back</a>
          </div><!-- form-layout-footer -->
        
        </div><!-- card -->
      </div><!-- col-6 -->

     
    </div><!-- row -->
</div><!-- sl-pagebody -->
@endsection