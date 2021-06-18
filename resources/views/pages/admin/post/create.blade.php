@extends('layouts.master')
@section('title', 'Pengumuman')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tambah Pengumuman</h1>
    </div>
    <a href="{{ route('posts.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-arrow-left"></i>Kembali</a>
    {{-- <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">      
            <div class="form-group">
              <label>NIS</label>
              <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" placeholder="11901214" required>
            </div>
            <div class="form-group">
              <label>NISN</label>
              <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}" placeholder="11901214" required>
            </div>
            <div class="form-group">
              <label>RFID</label>
              <input type="text" name="rfid" class="form-control" value="{{ old('rfid') }}" placeholder="11901214" required>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="text" name="password" class="form-control" readonly value="" placeholder="11901214" required>
            </div>

            <div class="form-group">
              <label>Nama Siswa</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="John Doe" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select
                class="form-control"
                name="gender" required>
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="0">Laki - Laki</option>
                <option value="1">Perempuan</option>
            </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Jl. Arif Rahman Hakim" required>
            </div>
            <div class="form-group">
              <label>Nomor Hp Orang Tua</label>
              <input type="tel" name="parents_phone" class="form-control" value="{{ old('parents_phone') }}" placeholder="08123456789" required>
            </div>
            <button type="submit" class="btn btn-icon icon-left btn-primary">
              Simpan
          </button>
          </div>
        </form>
        </div>
      </div>
    </div> --}}
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Write Your Post</h4>
                </div>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                
                <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Sekolah Dibuka Bulan Juli 2021" minlength="5" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="Ahmad S.Kom" minlength="5" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Pengumuman</label>
                    <div class="col-sm-12 col-md-7">
                    <textarea name="content" class="summernote" minlength="5" maxlength="2000" value="{{ old('content') }}" required></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                    <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Pilih Gambar</label>
                        <input type="file" name="thumbnail" id="image-upload" required/>
                    </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Buat Pengumuman</button>
                    </div>
                </div>
                </div>
            </form>
            </div>
            </div>
        </div>
  </section>
</div>
@endsection
@push('addon-script')
<script type="text/javascript">
    $(document).ready(function() {
      $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Pilih Gambar",   // Default: Choose File
        label_selected: "Ganti Gambar",  // Default: Change File
        no_label: false                 // Default: false
      });
    });
    </script>
@endpush