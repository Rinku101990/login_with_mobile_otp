@extends('layouts.app-admin')
@section('content')
<style>
    s {
    font-size: 12px;
}
</style>

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Users</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">Users List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Users List
        <a href="{{url('admin/user/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add User</a>
        </h6>
             
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getuser as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>
                            <img src="{{url('admin/assets/products.png')}}" height="21px" width="100px">
                        </td>
                        <td>{{$row->name}}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->registerAs }}</td>
                        <td>  
                            @if($row->status=='active')
                                <span class="badge badge-success">Active</span> 
                            @else
                                <span class="badge badge-danger">In-Active</span> 
                            @endif
                        </td>
                        <td>
                            <a href="javaScript:void(0)" class="btn btn-danger btn-xs delete" id="{{$row->id}}"><i class="feather icon-trash"></i> </a> 
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- [ content ] End -->
@endsection


@section('script')

<script>

 $(document).on("click", ".delete", function () {
    var record_id = this.id;
    deletePopupMessageAjax(
        "Deleting User",
        "Are you sure want to delete this User?",
        record_id,
        "{{url('admin/user')}}/"+record_id
    );
});


</script>
@endsection