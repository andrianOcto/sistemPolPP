<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="index2.html" class="logo">Sistem Anggaran</a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image"/>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo Session::get('name', 'default'); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
              <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            


            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <button data-toggle="modal" data-target="#modal-changePassword" class="btn btn-default btn-flat">Change Password</button>
              </div>
              <div class="pull-right">
                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<script>
//initialize data
    function refreshData(id)
    {
      $.ajax({
        type : "POST",
        url: "/changePassword",
        data: {
          'old'     : document.getElementById("old").value,
          'new'     : document.getElementById("new").value,
          'confirm' : document.getElementById("confirm").value,
          '_token'  : document.getElementsByName("_token")[0].value
        },
        success: function(response) {
         
          console.log(response.status); 
          $('#modal-changePassword').modal('hide');

          if(response.status == "fail")
          {
            document.getElementById("failureMessage").innerHTML = response.message;
            $('#modal-fail').modal('show');
          }
          else
          {
            $('#modal-success').modal('show');
          }
            //Do Something
        },
        error: function(xhr) {
            //Do Something to handle error
            alert("tidak berhasil");
        }
      });
    }
</script>
      
      <!-- Modal Change Password-->
      <div class="modal fade" id="modal-changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="canga" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Change Password</h2>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Old Password</label>
                <input type="password" class="form-control" name="old" id="old" placeholder="Masukan Password Lama" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">New Password</label>
                <input type="password" class="form-control" name="new" id="new" placeholder="Masukan Password Baru" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Re-Type Password</label>
                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Ulangi Masukan Password Baru" required>
              </div>
            </div>
            <div class="modal-footer">
                <?php echo csrf_field(); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick = "refreshData(4)" class="btn btn-danger">Update</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      <!-- Modal Failure Message-->
      <div class="modal fade" id="modal-fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Gagal Ganti Password</h2>
            </div>
            <div class="modal-body">
              <h4 class="modal-title" id="failureMessage">Gagal Ganti Password</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>

      <!-- Modal Success Message-->
      <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Berhasil Ganti Password</h2>
            </div>
            <div class="modal-body">
              <h4 class="modal-title" id="successMessage">Berhasil Ganti Password</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
