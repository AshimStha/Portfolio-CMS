@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row right-0">
        <a href="{{route('admin.skills.add')}}">
            <button class="btn btn-primary">Add Skill</button>
        </a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">Percentage</th>
            <th scope="col">Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($skills as $key=>$skill)
            
          <tr>
            <th scope="row">{{$key+1}}.</th>
            <td>{{$skill->title}}</td>
            <td>{{$skill->percentage}}%</td>
            <td>@if($skill->display==1) <span class="badge bg-primary">Display</span> @else <span class="badge bg-danger">Not Display</span> @endif</td>
            <td>
                <a href="{{ route('admin.skills.edit', base64_encode($skill->id)) }}"
                    class="btn btn-sm btn-outline-primary" title="Edit"><i
                        class="ri-edit-line"></i></a>

                <a href="#delete" data-toggle="modal" data-id="1" id="delete1"
                    class="btn btn-sm btn-outline-danger delete"
                    onclick="COnfirmDelete('{{ $skill->id }}')"
                    data-id="{{ $skill->id }}"> <i class="ri-delete-bin-line"></i>
                </a>
            </td>
          </tr>
             
          @endforeach
        </tbody>
      </table>
</div>

  
  @endsection
  @section('script')
  <script>
        function COnfirmDelete(elem) {
            var id = elem;
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        method: "POST",
                        url: '{{ route('admin.skills.destroy') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function(res) {
                            swal({
                                title: "Deleted",
                                text: "Skill has been deleted!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#28a745",
                                confirmButtonText: "Okay",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            }, function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                        },
                        error: function(data) {
                            // toastr.error("Sorry Something Went Wrong!!");
                        }

                    })
                } else {
                    swal("Cancelled", "Your Skill is safe :)", "error");
                }
            });
        }
  
  </script>
  @endsection