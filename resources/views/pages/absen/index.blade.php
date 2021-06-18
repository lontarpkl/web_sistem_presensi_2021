<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Presensi</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <style>
    /*
 * Globals
 */

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritance from `body` */
  background-color: #fff;
  border: .05rem solid #fff;
}


/*
 * Base structure
 */

html,
body {
  height: 100%;
  background-color: rgb(255, 255, 255);
}

.cover {
  padding: 0 1.5rem;
}
.cover .btn-lg {
  padding: .75rem 1.25rem;
  font-weight: 700;
}
@media (min-width: 768px) {
    .h-md-100 { height: 100vh; }
}

.ket-1 {
  width: 30px;
  height: 30px;
  background: #28A745;
}

.ket-2 {
  width: 30px;
  height: 30px;
  background: #DC3545;

}

  </style>
</head>
<body>
  <!-- text -->
  
  
  {{-- Main --}}
  <div class="d-md-flex h-md-100 align-items-center">
    
    <!-- First Half -->
    
    <div class="col-md-4 p-0 bg-primary h-md-100">
      <form action="" class="btn-submit" method="POST" >
        @csrf
        <input type="text" name="rfid_id" data-action="" id="rfid" autofocus style="position:absolute; z-index: -999; margin-top:-100px;"/>
      </form>
      <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
        <div class="logoarea pt-5 pb-5">
          <img src="{{ asset("assets/img/smkn.png")}} "  width="100" alt="">
          <h1 id="jam"></h1>
          <h4 class="text-uppercase" id="tanggalwaktu"></h4>
        </div>
      </div>
    </div>
    
    <!-- Second Half -->
    
    <div class="col-md-8 p-0 bg-light h-md-100">

      <div class="m-4 d-flex justify-content-between align-items-center">
          <div>
              <h3 class="font-weight-bold">Riwayat Presensi</h3>
              <hr class="doted" style="border-top: 8px solid #007BFF; width: 300px; border-radius: 3px;">
              
          </div>
          <div>
              <h5>Tepat Waktu &nbsp&nbsp <div class="ket-1 float-right"></div></h5>
              <h5>Terlambat &nbsp&nbsp <div class="ket-2 float-right"></div></h5>
          </div>

      </div>

      {{-- Data Presensi --}}

      @forelse ($presences as $pres)
        @if ($pres->kehadiran == "Tepat Waktu")
          <div class="m-4 bg-white d-flex justify-content-between align-items-center flex-center rounded">
            <div class="pl-4 text-dark font-weight-bold text-uppercase" style="font-size: 26px;">{{ $pres->student->name}} <span class="font-weight-normal">{{ $pres->student->kelas->class}}</span> </div>
            <div class="p-4 bg-success text-white font-weight-bold rounded">{{ $pres->keterangan}} Pada Pukul {{ $pres->jam}} </div>
          </div>
          @else
          <div class="m-4 bg-white d-flex justify-content-between align-items-center flex-center rounded">
            <div class="pl-4 text-dark font-weight-bold text-uppercase" style="font-size: 26px;">{{ $pres->student->name}} <span class="font-weight-normal">{{ $pres->student->kelas->class}}</span> </div>
            
            <div class="p-4 bg-danger text-white font-weight-bold rounded">{{ $pres->keterangan}} Pada Pukul {{ $pres->jam}}</div>
        </div>
        @endif

      @empty
          <div class="text-center">
            <i class="far fa-address-card fa-5x mb-3"></i>
            <h4>Silahkan Tap Kartu Anda</h4>
          </div>
      @endforelse



      
      
  </div>

    </div>
  <!-- end text -->
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
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
    
const firebaseConfig = {
    apiKey: "AIzaSyCapxxeERt1SVJHYXV-dSPlzvTuGPyPaR4",
    authDomain: "api-notif.firebaseapp.com",
    projectId: "api-notif",
    storageBucket: "api-notif.appspot.com",
    messagingSenderId: "895176124191",
    appId: "1:895176124191:web:50182f19cc94838efb322a",
    measurementId: "G-00Q3SFVELL"
    };
    // measurementId: G-R1KQTR3JBN
      // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $(".btn-submit").click(function(e){

          e.preventDefault();

          var rfidValue = $("input[name=rfid_id]").val();
          var url = '{{ url('presensi') }}';

          $.ajax({
            url:url,
            method:'POST',
            data:{
                    rfid_id:rfidValue,
                  },
            success:function(response){
                if(response.success){
                    alert(response.message) //Message come from controller
                }else{
                    alert("Error")
                }
            },
            error:function(error){
                console.log(error)
            }
          });
    });
  
        

    
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@include('sweetalert::alert')
</body>
</html>
