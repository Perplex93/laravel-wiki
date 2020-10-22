@extends('layouts.app')

@section('content')
    
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
  Kategorie anlegen
</button>

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kategorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('addCategory')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="categorySelect">Wähle eine Kategorie</label>
                <input class="form-control" name="category" type="text" placeholder="Default input">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="table table-responsive">
        <table>
            <thead>
                <th>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </th>    
            </thead>
            <tbody>
                @if(count(\App\Models\Category::get()) != NULL)
                @foreach(\App\Models\Category::get() as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td><button type="button" class="btn btn-success ajaxModal-edit" data-id="{{$category->id}}"  data-toggle="modal">Edit</button></td>
                    <td><button type="button" class="btn btn-danger ajaxModal-delete" data-id="{{$category->id}}"  data-toggle="modal">Delete</button></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">Jetzt host a Problem</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div id="containerBox"></div>

<script>

$(document).ready(function () {

  $('.ajaxModal-delete').click(function () {

    var catID = $(this).data('id');
    // console.log(schamaneID);
    $.ajax({
      url: '{{route("loadCatDeleteModal")}}',
      type: 'post',
      data: {
        "_token": "{{ csrf_token() }}",
        'catID': catID
      },
      success: function (response) {

        $('#containerBox').html(response);
        console.log(response);

        $('#showDeleteCatModal').modal('show');
      }
    });
  });
}); 


$(document).ready(function () {

$('.ajaxModal-edit').click(function () {

  var catID = $(this).data('id');
  $.ajax({
    url: '{{route("loadCatEditModal")}}',
    type: 'post',
    data: {
      "_token": "{{ csrf_token() }}",
      'catID': catID
    },
    success: function (response) {

      $('#containerBox').html(response);
      console.log(response);

      $('#showEditCatModal').modal('show');
    }
  });
});
});
</script>

@endsection