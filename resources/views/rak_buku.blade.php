
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Cover Template · Bootstrap v5.3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    

    

<link href="{{ asset('resource/bootstrap.min.css')}}" rel="stylesheet" >

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="{{ asset('resource/manifest.json')}}">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('resource/cover.css') }}" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center">
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0">Staff</h3>
          <nav class="text-dark nav nav-masthead justify-content-center float-md-end">
            <a class="text-dark nav-link fw-bold py-1 px-0" href="{{ url('/') }}">Data Staff</a>
            <a class="text-dark nav-link fw-bold py-1 px-0 active" aria-current="page" href="{{ url('/rak_buku') }}">Data Rak</a>
            <a class="text-dark nav-link fw-bold py-1 px-0" href="{{ url('/daftar_buku') }}">Data Buku</a>
          </nav>
        </div>
      </header>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data Rak
      </button>
      <main class="px-3">
        <!-- Button trigger modal -->
        <div class="container mt-4">
          
    
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Rak</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Rak</label>
                      <input type="text" class="form-control" name="nama_rak">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btn-submit">Tambah Data</button>
                </div>
              </div>
            </div>
          </div>
    
          <!-- Modal -->
          <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Rak</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label d-none">id Rak</label>
                      <input type="text" class="form-control d-none" name="edit_id" id="edit-id">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nama Rak</label>
                      <input type="text" class="form-control" name="nama_rak" id="edit-nama-rak">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" id="btn-edit">Simpan Perubahan</button>
                </div>
              </div>
            </div>
          </div>
    
          <table class="table">
            <thead>
              <tr>
                <th>Nama Rak</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody id="tbody" class="bg-white">
    
            </tbody>
          </table>
        </div>        
      </main>

      <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
      </footer>
    </div>

  </body>
  <script>
    $(document).ready(function () {
      show();
    });

    function show(){
      $.ajax({
        type: "GET",
        url: "https://api-novianto-eko-budiman.000webhostapp.com/public/api/bookshelf",
        dataType: "json",
        crossDomain: true,
        format: "json",
          success:function(data, status){
            var data =  data.data;
            console.log(data);
            data.forEach(function(dt){
              $("#tbody").append(`
                <tr>
                  <td>`+dt.nama_rak+`</td>
                  <td>
                    <button class="btn btn-md btn-warning" onclick="edit(`+dt.id+`)">Edit</button>
                    <button class="btn btn-md btn-danger" onclick="deleteData(`+dt.id+`)">Hapus</button>
                  </td>
                </tr>
              `);
            });
          },
          error:function(error){
              console.log('message Error' + JSON.stringify(error));
          }
      });
    }

    function edit(id){
      $('#modalEdit').modal('show');
      $.ajax({
        type: "GET",
        url: "https://api-novianto-eko-budiman.000webhostapp.com/public/api/bookshelf/"+id,
        dataType: "json",
        crossDomain: true,
        format: "json",
        success:function(data, status){
          var data =  data.data;
          $("#edit-id").val(data.id);
          $("#edit-nama-rak").val(data.nama_rak);
        },
        error:function(error){
            console.log('message Error' + JSON.stringify(error));
        }
      });
    }

    $("#btn-submit").click(function(e){
      let nama_rak  = $("[name='nama_rak']").val();
      let token     = $("meta[name='csrf-token']").attr("content");

      $.ajax({
        url:"https://api-novianto-eko-budiman.000webhostapp.com/public/api/bookshelf",
        method:'post',
        data:{
          nama_rak:nama_rak,
          _token:token
        },
        success:function(response){
          $('#exampleModal').modal('hide');
          location.reload();
        },
      });
    });

    $("#btn-edit").click(function(e){
      let id        = $("#edit-id").val();
      let nama_rak  = $("#edit-name").val();
      let token     = $("meta[name='csrf-token']").attr("content");
      
      $.ajax({
        url:"https://api-novianto-eko-budiman.000webhostapp.com/public/api/bookshelf/"+id,
        method:'PUT',
        data:{
          nama_rak:nama_rak,
          _token:token,

        },
        dataType: "json",
        success:function(response){
            $('#exampleModal').modal('hide');
        },
      });
    });

    function deleteData(id) {
      let token     = $("meta[name='csrf-token']").attr("content");

      $.ajax({ 
        method: "POST", 
        url:"https://api-novianto-eko-budiman.000webhostapp.com/public/api/bookshelf/"+id, 
        data:{
          id:id,
          _token:token
        },
        dataType: 'json',
        success: function(result) {
          location.reload();
        },
        error:function(error){
            console.log('message Error' + JSON.stringify(error));
        }
      });
    }
  </script>
</html>
