<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <!-- Button trigger modal -->
    <div class="container mt-4">
      
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data Staff
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Staff</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                @csrf
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="confirm_password">
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Staff</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Id</label>
                  <input type="text" class="form-control" id="edit-id">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="edit-name">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Email</label>
                  <input type="text" class="form-control" id="edit-email">
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
            <th>Nama</th>
            <th>email</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody id="tbody" class="bg-white">

        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  </body>
  <script>
    $(document).ready(function () {
      show();
    });

    function show(){
      $.ajax({
        type: "GET",
        url: "https://api-novianto-eko-budiman.000webhostapp.com/public/api/staff",
        dataType: "json",
        crossDomain: true,
        format: "json",
          success:function(data, status){
            var data =  data.data;
            // console.log(data);
            data.forEach(function(dt){
              $("#tbody").append(`
                <tr>
                  <td>`+dt.name+`</td>
                  <td>`+dt.email+`</td>
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
        url: "https://api-novianto-eko-budiman.000webhostapp.com/public/api/staff/"+id,
        dataType: "json",
        crossDomain: true,
        format: "json",
        success:function(data, status){
          var data =  data.data;
          console.log(data);
          $("#edit-id").val(data.id);
          $("#edit-name").val(data.name);
          $("#edit-email").val(data.email);
        },
        error:function(error){
            console.log('message Error' + JSON.stringify(error));
        }
      });
    }

    $("#btn-submit").click(function(e){
      let name      = $("[name='name']").val();
      let email     = $("[name='email']").val();
      let password  = $("[name='password']").val();
      let confirm   = $("[name='confirm_password']").val();
      let token     = $("meta[name='csrf-token']").attr("content");

      $.ajax({
        url:"https://api-novianto-eko-budiman.000webhostapp.com/public/api/register_staff",
        method:'post',
        data:{
          name:name, 
          email:email, 
          password:password, 
          confirm_password:confirm,
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
      let name      = $("#edit-name").val();
      let email     = $("#edit-email").val();
      // let password  = $("#edit-password").val();
      // let confirm   = $("#edit-confirm_password").val();
      let token     = $("meta[name='csrf-token']").attr("content");
      
      $.ajax({
        url:"https://api-novianto-eko-budiman.000webhostapp.com/public/api/staff/"+id,
        method:'PUT',
        data:{
          name:name, 
          email:email,
          // password:password,
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
        url:"https://api-novianto-eko-budiman.000webhostapp.com/public/api/staff_delete/"+id, 
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