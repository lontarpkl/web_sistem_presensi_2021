@extends('layouts.master')
@section('title', 'Data Kelas')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Data Kelas</h1>
    </div>
    <a href="{{ route('kelas.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-arrow-left"></i>Kembali</a>
      <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">      
            <div class="form-group">
              <label>Nama Kelas</label>
              <input type="text" name="class" class="form-control" value="{{ old('class') }}" placeholder="11-RPL-1" required>
            </div>
            <button type="submit" class="btn btn-icon icon-left btn-primary">
              Simpan
          </button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection