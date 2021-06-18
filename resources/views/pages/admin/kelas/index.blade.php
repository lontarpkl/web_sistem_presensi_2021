@extends('layouts.master')
@section('title', 'Data Kelas')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data Kelas</h1>
        </div>
        <a href="{{ route('kelas.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah Kelas</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive-sm">
                        <table id="class-table" class="table table-bordered" width="100%" collspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @forelse ($kelas as $kls)
                                <tr>
                                    <td>{{ $kls->id}} </td>
                                    <td>{{ $kls->class}} </td>
                                </tr>
                                    
                                @empty
                                    
                                @endforelse
                            </tbody> --}}
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        $(function() {
        $('#class-table').DataTable({
            pageLength : 10,
            bFilter: true,
            processing: true,
            serverSide: true,
            
            ajax: 'class/json',
            columns: [
                {
                    "data": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1 +".";
                    }
                },
                { data: 'class', name: 'class' },
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
        var oTable;
        oTable = $('#class-table').dataTable();

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

    var id;

    $(document).on('click', '.delete', function(){
    id = $(this).attr('id');
    Swal.fire({
    title: 'Apakah kamu yakin?',
    text: "Kelas ini akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus',
    cancelButtonText: 'Tidak',
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
        url:"/admin/kelas/destroy/"+id,
        beforeSend:function(){
        $('#ok_button').text('Deleting...');
        },
        success:function(data)
        {
        setTimeout(function(){
        $('#confirmModal').modal('hide');
        $('#class-table').DataTable().ajax.reload();
        }, 2000);
        }
        })
        Swal.fire({
        title: 'Berhasil',
        text: "Kelas Berhasil dihapus.",
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