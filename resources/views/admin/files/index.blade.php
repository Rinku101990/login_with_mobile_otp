@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Files</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Files</li>
            <li class="breadcrumb-item active">Files List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Files List</h6>
             
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Banner</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getfile as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td> @if($row->immg)
                                <img src="{{url('admin/assets/category.png')}}" height="21px" width="100px">
                            @else
                                <img src="{{url('admin/assets/category.png')}}" height="21px" width="100px">
                            @endif
                        </td>
                        <td><a href="{{ Storage::url($row->path)}}" download>{{ $row->name; }}</a></td>
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
        "Deleting File",
        "Are you sure want to delete this File?",
        record_id,
        "{{url('admin/document')}}/"+record_id
    );
});


</script>
@endsection