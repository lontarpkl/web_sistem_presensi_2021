@extends('layouts.master')
@section('title', 'Pengaturan')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" integrity="sha512-/Ae8qSd9X8ajHk6Zty0m8yfnKJPlelk42HTJjOHDWs1Tjr41RfsSkceZ/8yyJGLkxALGMIYd5L2oGemy/x1PLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Pengaturan</h1>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body table-responsive-sm">
                    <div class="row">
                        <div class="col-sm-3 d-flex justify-content-center align-items-center">
                            <h6 class="mb-0">Jam Masuk</h6>
                        </div>
                        <div class="col-sm-9 text-muted">
                            <div class="">
                                : {{  \Carbon\Carbon::parse($time->jam_masuk)->format('H:i') }}
                                <button class="ml-5 btn  btn-outline-primary px-2" data-toggle="modal" data-backdrop="false" data-target="#time-1">Ubah</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3 d-flex justify-content-center align-items-center">
                            <h6 class="mb-0">Jam Pulang</h6>
                        </div>
                        <div class="col-sm-9 text-muted">
                            : {{  \Carbon\Carbon::parse($time->jam_pulang)->format('H:i') }}
                            <button class="ml-5 btn btn-outline-primary px-2" data-toggle="modal" data-backdrop="false" data-target="#time-2">Ubah</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        {{-- Modals --}}

        <!-- Modal 1-->
            <div class="modal fade" id="time-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Jam Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ url('admin/pengaturan/waktu') }}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <div class="input-group date" >
                                <input type="text" name="jam_masuk"class="form-control" id="timepic-1" value="{{ $time->jam_masuk ?? old('jam_masuk') }}"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>Ket: Jam Masuk adalah batas jam bisa melakukan presensi masuk sampai dengan waktu Jam Pulang</div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="form1" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

            <!-- Modal 2-->
            <div class="modal fade" id="time-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Jam Pulang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ url('admin/pengaturan/waktu') }}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <div class="input-group date" >
                                <input type="text" name="jam_pulang"class="form-control" id="timepic-2" value="{{ $time->jam_pulang ?? old('jam_pulang') }}"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>Ket: Jam Pulang adalah mulai jam bisa melakukan presensi pulang sampai jam 23:59</div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="form2" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('addon-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" integrity="sha512-2xXe2z/uA+2SyT/sTSt9Uq4jDKsT0lV4evd3eoE/oxKih8DSAsOF6LUb+ncafMJPAimWAXdu9W+yMXGrCVOzQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#modal-2").fireModal({
            body: '',
            center: true});

        $(function() {
        $('#timepic-1').timepicker({
            showInputs: false,
            minuteStep: 1,
            showMeridian: false,
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down'
            }
        });
        $('#timepic-2').timepicker({
            showInputs: false,
            minuteStep: 1,
            showMeridian: false,
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down'
            }
        });
        });
    </script>
@endpush