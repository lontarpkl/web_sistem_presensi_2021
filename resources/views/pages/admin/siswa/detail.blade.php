@extends('layouts.master')
@section('title', 'Detail Siswa')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Siswa</h1>
        </div>
        <a href="{{ route('siswa.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-arrow-left"></i>Kembali</a>
        <div class="container">
            <div class="main-body">
            
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ Storage::url($item->photo )}}" alt="{{ $item->name}} " class="rounded" width="150">
                            <div class="mt-3">
                              <h4>{{ $item->name}} </h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Nama</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                              {{ $item->name }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">NIS</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->nis }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">NISN</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->nisn }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">RFID</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->rfid }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Kelas</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->kelas->class }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->FilterGender }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->address }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">No Orang Tua</h6>
                            </div>
                            <div class="col-sm-9 text-muted">
                                {{ $item->parents_phone }}
                            </div>
                          </div>
                        </div>
                      </div>        
                    </div>
                  </div>
        
                </div>
            </div>
    
    </section>
</div>
@endsection
