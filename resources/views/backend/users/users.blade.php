@extends('backend.master')
@section('content')

@role('Admin')
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Total Users ({{ $user_count }})</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      
        <div class="table-responsive">
            <table class="table table-hover mg-b-0">
              <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered Date</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->name ?? 'N/A' }}</td>
                        <td>{{ $data->email ?? 'N/A' }}</td>
                        <td>{{ $data->created_at->format('d M, Y') }}</td>
                        <td>
                            
                            
                            <a href="{{ url('users') }}/{{ $data->id }}" class="btn btn-danger">Delete</a>
                            
                        </td>
                    </tr>
                @endforeach
            
              </tbody>
            </table>
          </div><!-- table-responsive -->

    </div><!-- card -->



</div><!-- sl-pagebody -->
@endrole 
@endsection