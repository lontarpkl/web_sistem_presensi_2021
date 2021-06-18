@extends('layouts.master')
@section('title', 'Pengumuman')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Pengumuman</h1>
        </div>
        <a href="{{ route('posts.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Pengumuman</a>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body table-responsive-sm">
                    <table id="posts-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>
                    {{-- @foreach ($pengumuman as $post)
                        
                    <tr>
                        <td>{{ $post->title }} </td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach --}}
                    </table>
                </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
@push('addon-script')	
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(function() {
    $('#posts-table').DataTable({
        pageLength : 10,
        bFilter: true,
        processing: true,
        serverSide: true,
        
        ajax: 'pengumuman/json',
        columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1 +".";
                }
            },
            { data: 'title', name: 'title' },
            { data: 'author', name: 'author' },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
      var oTable;
      oTable = $('#posts-table').dataTable();

      $('.filter-select').change( function() { 
            oTable.fnFilter( $(this).val()
);
       });
    
});

$(document).ready(function(){

  $('.filter-select').change(function(){
    table.column( $(this).data('column'))
    .search( $(this).val())
    .draw();
  });

  var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  Swal.fire({
  title: 'Apakah kamu yakin?',
  text: "Pengumuman ini akan dihapus",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, hapus',
  cancelButtonText: 'Tidak',
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url:"/admin/posts/destroy/"+user_id,
    beforeSend:function(){
      $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
      setTimeout(function(){
      $('#confirmModal').modal('hide');
      $('#posts-table').DataTable().ajax.reload();
      }, 2000);
    }
    })
    Swal.fire({
      title: 'Berhasil',
      text: "Pengumuman Berhasil dihapus.",
      icon: 'success',
      showCancelButton: false,
      showCloseButton: false,
      showConfirmButton: false,
      timer: 2000,
    })
  }
})
 });

 $('#ok_button').click(function(){

 });
});
</script>
@endpush