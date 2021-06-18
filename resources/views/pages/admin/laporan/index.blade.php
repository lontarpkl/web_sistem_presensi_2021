@extends('layouts.master')
@section('title', 'Laporan')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Laporan Presensi</h1>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="text-center mt-4">
                    <h6>Silahkan inputkan tanggal dan kelas:</h6>
                </div>
                <div class="card-body table-responsive-sm">
        
                    <div class="row d-flex justify-content-center">
                        <div class="col-8">
                            <form action="{{ url('admin/laporan')}} " method="GET" id="date">
                                @csrf  
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control" name="from_date" id="from_date" readonly required placeholder="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text mx-4">s.d.</span>
                                </div>
                                <input type="text" class="form-control" name="to_date" id="to_date" readonly required placeholder="{{ \Carbon\Carbon::now()->addMonth()->format('Y-m-d') }}">
                                
                            </div>
                            <div class="row d-flex justify-content-center">
            
                                <div class="col-4 my-4">    
                                    <select class="form-control filter-select"  name="class" required>
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($kelas as $kls)
                                            <option value="{{ $kls->class }}">{{ $kls->class }}</option>
                                        @endforeach
                                    </select>
                                </div>               
                            </div>
                            <div class="row d-flex justify-content-center">
            
                                <div class="mb-4">
                                    <button type="submit" name="filter" id="filter" class="btn btn-primary submit" >Filter</button>
                                </div>
                            </div>
            
                                </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="text-center mt-4">
                    <h5>DATA HASIL REKAP PRESENSI</h5>
                    <h6 class="text-muted"> (Tanggal :  {{ $from }} - {{ $to }})</h6>
                </div>
                <div class="card-body table-responsive-sm">
                    <table id="report-table" class="table table-bordered report-table" width="100%" collspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Masuk</th>
                                <th>Pulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @forelse ($student as $st)
                            <tr>
                                <td>{{ ++$no . "." }} </td>
                                <td>{{ $st->name}} </td>
                                <td>{{ $st->nis}} </td>
                                <td>{{ $st->kelas->class}} </td>
                                <td>{{ $st->masuk_presents_count}} </td>
                                <td>{{ $st->pulang_presents_count}} </td>

                                
                                </tr>
                                
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Silahkan masukan tanggal dan kelas
                                    </td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </section>
</div>

@endsection
@push('addon-script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
  {{-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    $('.input-daterange').datepicker({
    todayBtn:'linked',
    format:'yyyy-mm-dd',
    
    }).on('change', function(e) {
        // Revalidate the date field
        $('#from_date').bootstrapValidator('revalidateField', 'from_date');
    });

    $(document).ready(function() {
    $('#report-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                messageTop: 'DATA HASIL REKAP PRESENSI',
                text: '<i class="far fa-file-pdf"></i> PDF',
                titleAttr: 'PDF',
                className: "btn btn-outline-primary"
            },
            {
                extend: 'excelHtml5',
                text: '<i class="far fa-file-excel"></i> Excel',
                titleAttr: 'Excel',
                className: "btn btn-outline-primary"
            },
        ],
    });
    });

    // load_data();

    // function load_data(from_date = '', to_date = '')
    // {
    // $('#report-table').DataTable({
    // processing: true,
    // serverSide: true,
    // ajax: {
    //     url:'laporan/json',
    //     data:{from_date:from_date, to_date:to_date}
    // },
    // columns: [
    //     {
    //     data:'id',
    //     name:'id'
    //     },
    //     {
    //     data:'name',
    //     name:'name'
    //     },
    //     {
    //     data:'nis',
    //     name:'nis'
    //     },
    //     {
    //     data:'masuk_presents_count',
    //     name:'masuk_presents_count'
    //     },
    //     {
    //     data:'pulang_presents_count',
    //     name:'pulang_presents_count'
    //     },
    // ]
    // });
    // }

    // $(function() {
    // $('#report-table').DataTable({
    //     pageLength : 5,
    //     dom: 'Bfrtip',
    //     buttons: [
    //         {
    //             extend: 'excelHtml5',
    //             exportOptions: {
    //             columns: [ 0, 1, 2, 3]
    //             }
    //         },
    //         {
    //             extend: 'pdfHtml5',
    //             exportOptions: {
    //                 columns: [ 0, 1, 2, 3]
    //             }
    //         },
    //     ],
    //     bFilter: true,
    //     processing: true,
    //     serverSide: true,
        
    //     ajax: 'laporan/json',
    //     columns: [
    //         { data: 'id', name: 'id' },
    //         { data: 'nis', name: 'nis' },
    //         { data: 'name', name: 'name' },
    //         {data:'masuk_presents_count', name:'masuk_presents_count'},
    //         {data:'pulang_presents_count', name:'pulang_presents_count'}
    //     ],
    // });
    //     var oTable;
    //     oTable = $('#report-table').dataTable();

    //     $('.filter-select').change( function() { 
    //             oTable.fnFilter( $(this).val()
    // );
    //     });
        
    // });

    // $('#filter').click(function(){
    // var from_date = $('#from_date').val();
    // var to_date = $('#to_date').val();
    // if(from_date != '' &&  to_date != '')
    // {
    // $('#report-table').DataTable().destroy();
    // load_data(from_date, to_date);
    // }
    // else
    // {
    // alert('Both Date is required');
    // }
    // });

    // $('#refresh').click(function(){
    // $('#from_date').val('');
    // $('#to_date').val('');
    // $('#report-table').DataTable().destroy();
    // load_data();
    // });

    // });
</script>
@endpush
