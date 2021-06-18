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
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Write Your Post</h4>
                </div>
                <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')                
                <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="title" class="form-control" value="{{ $post->title ?? old('title') }}" placeholder="Sekolah Dibuka Bulan Juli 2021" minlength="5" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="author" class="form-control" value="{{ $post->author ?? old('author') }}" placeholder="Ahmad S.Kom" minlength="5" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Pengumuman</label>
                    <div class="col-sm-12 col-md-7">
                    <textarea name="content" class="summernote" minlength="5" maxlength="2000" required>{{ $post->content ?? old('content') }}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar <br> <p class="text-muted">(Silahkan upload kembali gambarnya)</p></label>
                    <div class="col-sm-12 col-md-7">
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Pilih Gambar</label>
                        <input type="file" name="thumbnail" id="image-upload"/>
                    </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Edit Pengumuman</button>
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