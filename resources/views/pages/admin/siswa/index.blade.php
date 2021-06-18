@extends('layouts.master')
@section('title', 'Data Siswa')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Siswa</h1>
    </div>
    <a href="{{ route('siswa.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Siswa</a>
    <div class="col-2 float-right ">    
      <select class="form-control filter-select"  name="id_class">
        <option value="">Pilih Kelas</option>
        @foreach ($kelas as $kls)
          <option value="{{ $kls->class }}">{{ $kls->class }}</option>
        @endforeach
      </select>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
       
          <div class="card-body table-responsive-sm">
            <table id="students-table" class="table table-bordered" width="100%" collspacing="0">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>NIS</th>
                      <th>RFID</th>
                      <th>Nama Siswa</th>
                      {{-- <th>Jenis Kelamin</th> --}}
                      <th>Kelas</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Confirmation</h2>
          </div>
          <div class="modal-body">
              <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
          </div>
          <div class="modal-footer">
           <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
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
    $('#students-table').DataTable({
      "order": [[ 3, "asc" ]],
      pageLength : 5,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                text: '<i class="far fa-file-pdf"></i> PDF',
                titleAttr: 'PDF',
                className: "btn btn-outline-primary",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4]
                },
            },
            {
                extend: 'excelHtml5',
                text: '<i class="far fa-file-excel"></i> Excel',
                titleAttr: 'Excel',
                className: "btn btn-outline-primary",
                exportOptions: {
                  columns: [ 0, 1, 2, 3]
                }
            },
        ],
        bFilter: true,
        processing: true,
        serverSide: true,
        
        ajax: 'student/json',
        columns: [
            {
                "data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1 +".";
                }
            },
            { data: 'nis', name: 'nis' },
            { data: 'rfid', name: 'rfid' },
            { data: 'name', name: 'name' },
            { data: 'kelas.class', name: 'kelas.class' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
      var oTable;
      oTable = $('#students-table').dataTable();

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
  text: "Data siswa ini akan dihapus",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, hapus',
  cancelButtonText: 'Tidak',
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url:"/admin/siswa/destroy/"+user_id,
    beforeSend:function(){
      $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
      setTimeout(function(){
      $('#confirmModal').modal('hide');
      $('#students-table').DataTable().ajax.reload();
      }, 2000);
    }
    })
    Swal.fire({
      title: 'Berhasil',
      text: "Siswa Berhasil dihapus.",
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