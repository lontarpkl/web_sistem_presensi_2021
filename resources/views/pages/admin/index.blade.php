@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<style>
  .ia {
    font-size: 38px;
  }
</style>
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Siswa</h4>
              </div>
              <div class="card-body">
                {{ $student }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-layer-group"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Kelas</h4>
              </div>
              <div class="card-body">
                {{ $student }}
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Reports</h4>
              </div>
              <div class="card-body">
                1,201
              </div>
            </div>
          </div>
        </div> --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-address-card"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Presensi Harian</h4>
              </div>
              <div class="card-body">
                {{ $presensi }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-bullhorn"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pengumuman</h4>
              </div>
              <div class="card-body">
                {{ $pengumuman }}
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- ini --}}
      <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Siswa Paling Rajin Presensi Masuk Minggu ini</h4>
            </div>
            <div class="card-body">
              <div class="row">
                @forelse ($data as $sering)
                <div class="col text-center">
                  <span class="text-primary"><i class="fas fa-medal ia"></i></span>
                  <h5 class="mt-2 font-weight-bold">{{ $sering->student->name}} </h5>
                  <div class="text-muted text-medium"> {{ $sering->student->kelas->class}}</div>
                </div>
                    
                @empty
                  <div class="col text-muted">*Belum ada data</div>
                @endforelse
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Pengumuman Terbaru</h4>
              <div class="card-header-action">
                <a href="{{ route('posts.index')}} " class="btn btn-primary">Lihat Semua</a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped mb-0">
                  <thead>
                    <tr>
                      <th>Judul</th>
                      <th>Penulis</th>
                      <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>                         
                    @forelse ($posts as $post)
                    <tr>
                      <td width="300">
                        {{ $post->title }}
                      </td>
                      <td>
                        <h6 href="#"><img src="assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> {{ $post->author}}</h6>
                      </td>
                      <td>{{ $post->created_at->format('d-m-Y')}} </td>
                      {{-- <td>
                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                      </td> --}}
                    </tr>
                    @empty
                        
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
          <div class="card">
              <div class="card-body">
              <div class="summary ">
                  <div class="summary-info bg-info text-white">
                  <h3 id="jam"></h3>
                  <h5 id="tanggalwaktu"></h5>
                  </div>
                  <div class="summary-item">
                  <ul class="list-unstyled list-unstyled-border">
                      <li class="media">
                      <a href="#">
                          <img class="mr-3 rounded" width="50" src="{{ asset('../assets/img/products/product-1-50.png')}} " alt="product">
                      </a>
                      
                      <div class="media-body">
                          <div class="media-title">Nama Sekolah</div>
                          <div class="text-muted text-small">SMKN 1 Subang</div>
                      </div>
                      </li>
                      <li class="media">
                      <a href="#">
                          <img class="mr-3 rounded" width="50" src="{{ asset('../assets/img/products/product-2-50.png')}} " alt="product">
                      </a>
                      <div class="media-body">
                          <div class="media-title">Alamat Sekolah</div>
                          <div class="text-muted text-small">Jl. Arif Rahman Hakim</div>
                      </div>
                      </li>
                      <li class="media">
                      <a href="#">
                          <img class="mr-3 rounded" width="50" src="{{ asset('../assets/img/products/product-3-50.png')}} " alt="product">
                      </a>
                      <div class="media-body">
                          <div class="media-title">No Telpon</div>
                          <div class="text-muted text-small">082123456789</div>
                      </div>
                      </li>
                  </ul>
                  </div>
              </div>
              </div>
          </div>
        </div>
      </div>

    </section>
  </div>
@endsection
@push('addon-script')
<script>
  window.onload = function() { jam(); }
    
    function jam() {
      var e = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());
    
      e.innerHTML = h +':'+ m +':'+ s;
    
      setTimeout('jam()', 1000);
    }
    
    function set(e) {
      e = e < 10 ? '0'+ e : e;
      return e;
    }
    
  var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

  var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

  var date = new Date();

  var day = date.getDate();

  var month = date.getMonth();

  var thisDay = date.getDay(),

      thisDay = myDays[thisDay];

  var yy = date.getYear();

  var year = (yy < 1000) ? yy + 1900 : yy;

  document.getElementById('tanggalwaktu').innerHTML = (thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
</script>
    
@endpush