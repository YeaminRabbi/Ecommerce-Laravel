@extends('backend.master')
@section('content')
<div class="sl-pagebody">

    <div class="sl-page-title">
        <h5>Total Users ({{ $user_count ?? 'N/A'}})</h5>
    </div><!-- sl-page-title -->
  
      <div class="card pd-20 pd-sm-40">
        
          <div class="table-responsive">
              <table class="table table-hover mg-b-0">
                <thead>
                  <tr>
                      <th>Sl</th>
                      <th>User Name</th>
                      <th>User Role</th>
                      <th>User Permission</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $key => $user)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $user->name ?? 'N/A' }}</td>
                          <td>
                              @foreach ($user->getRoleNames() as $user_role)
                                 <li>{{ $user_role }}</li> 
                              @endforeach
                          </td>
                          <td>
                            @foreach ($user->getAllpermissions() as $user_permission)
                                <li>{{ $user_permission->name }}</li>
                            @endforeach
                         </td>
                          <td>
                              <a href="{{ route('PermissionChange', $user->id) }}" class="btn btn-primary">Edit Permission</a>
                              <a href="" class="btn btn-danger">Delete</a>
                          </td>
                      </tr>
                  @endforeach
              
                </tbody>
              </table>
            </div>
  
      </div>
  
  
    <div class="sl-page-title mt-5">
      <h5>Total Role ({{ $role_count ?? 'N/A'}})</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      
        <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->name ?? 'N/A' }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                          <a href="" class="btn btn-primary">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            
              </tbody>
            </table>
          </div><!-- table-responsive -->

    </div><!-- card -->


    <div class="sl-page-title mt-5 mb-0">
        <h5>Total Permissions ({{ $permissions_count ?? 'N/A'}})</h5>
      </div><!-- sl-page-title -->
  
    <div class="card pd-20 pd-sm-40">
        
        <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Permission</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->name ?? 'N/A' }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                          <a href="" class="btn btn-primary">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            
              </tbody>
            </table>
          </div><!-- table-responsive -->

    </div><!-- card -->


    <div class="sl-page-title mt-5 mb-0">
        <h5>Roles & Permissions</h5>
      </div><!-- sl-page-title -->
  
    <div class="card pd-20 pd-sm-40">
        
        <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->name ?? 'N/A' }}</td>
                        <td>
                            @foreach ($data->getPermissionNames() as $per)
                                <li>{{ $per }}</li>
                            @endforeach
                        </td>
                       
                        <td>
                          <a href="" class="btn btn-primary">Edit</a>
                          <a href="" class="btn btn-danger">Delete</a>
                        </td>
                        
                    </tr>
                @endforeach
            
              </tbody>
            </table>
          </div><!-- table-responsive -->

    </div><!-- card -->


    <div class="row row-sm mg-t-20">
      <div class="col-xl-6">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Assigning Permissions to Roles</h6>
          <form action="{{ route('RoleAddToPermission') }}" method="POST"  class="form-control">
            @csrf
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Roles: <span class="tx-danger"></span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select name="role_name" class="form-control">
                @foreach ($roles as $data)
                   <option value="{{ $data->name }}">{{ $data->name }}</option>
                @endforeach
                
              </select>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Permissions: <span class="tx-danger"></span></label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select name="permission_name" class="form-control">
                @foreach ($permissions as $data)
                   <option value="{{ $data->name }}">{{ $data->name }}</option>
                @endforeach
                
              </select>
            </div>
          </div>
          
          <div class="form-layout-footer mg-t-30">
            <input class="btn btn-primary mt-2" type="submit" value="Assign">
          </form> 
          </div><!-- form-layout-footer -->
        
        </div><!-- card -->
      </div><!-- col-6 -->

      <div class="col-xl-6">
        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
          <h6 class="card-body-title">Assigning Roles to Users (Single Role Assigned)</h6>
          <form action="{{ route('RoleAddToUser') }}" method="POST"  class="form-control">
            @csrf
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">User: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select name="user_id" class="form-control">
                @foreach ($users as $data)
                   <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
                
              </select>
            </div>
          </div>

          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label">Roles: </label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select name="role_name" class="form-control">
                @foreach ($roles as $data)
                   <option value="{{ $data->name }}">{{ $data->name }}</option>
                @endforeach
                
              </select>
            </div>
          </div>
          
          <div class="form-layout-footer mg-t-30">
            <input class="btn btn-primary mt-2" type="submit" value="Assign">
          </form> 
          </div><!-- form-layout-footer -->
        
        </div><!-- card -->
      </div><!-- col-6 -->
     
    </div><!-- row -->

</div><!-- sl-pagebody -->
@endsection