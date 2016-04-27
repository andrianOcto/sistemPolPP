<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Anggaran PolPP Semarang</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/bower_components/admin-lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome Icons -->
    <link href="{{ asset("/bower_components/admin-lte/awesome-font/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/ionic.css")}}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/bower_components/admin-lte/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Header -->
      @include('header')

      <!-- Sidebar -->
      @include('sidebar_master')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
          <h1>
            Management User
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          @if (session('errMessage') != null)
        <!-- Error message kalau kode sudah pernah di masukkan -->
        <div class="alert alert-danger alert-dismissable ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Data gagal disimpan!</h4>
          {!! session('errMessage') !!}
        </div>
        @endif

       @if (session('successMessage') != null)
        <!-- Success message kalau data berhasil dimasukkan -->
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i>{{session('successMessage')}} </h4>
        </div>
        @endif
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <a class="btn bg-blue btn-app" href="#modal-addUser" data-toggle="modal" data-target="#modal-addUser">
                    <i class="fa fa-plus"> </i>
                    <b>Tambah User</b>
                  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        @if($user->role != "master")
                        <tr>
                          <td>{{$user->username}}</td>
                          <td>{{$user->nama}}</td>
                          <td>{{$user->role}}</td>
                          <td align="center">
                            <a class="btn btn-warning" href="#modal-updateUser{{$user->username}}" data-toggle="modal" data-target="#modal-updateUser{{$user->username}}">
                                <i class="fa fa-edit fa-lg"></i> Update
                            </a>
                            <a class="btn btn-danger"  href="#modal-deleteUser{{$user->username}}" data-toggle="modal" data-target="#modal-deleteUser{{$user->username}}">
                                <i class="fa fa-trash-o fa-lg"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                      @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <!-- Modal Add User-->
      <div class="modal fade" id="modal-addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Add User</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/admin/register">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama </label>
                      <input type="text" class="form-control" name="nama" placeholder="Enter Name" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Role </label>
                      <select class="form-control" name="role" required>
                        @foreach($role as $item)
                           @if($item->description != "master")
                          <option value="{{$item->description}}">{{$item->description}}</option>
                          @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah User</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      @foreach($users as $user)
      <!-- Modal Convirmation Delete User-->
      <div class="modal fade" id="modal-deleteUser{{$user->username}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Perhatian</h2>
            </div>
            <div class="modal-body">
              <h4> Apakah Anda Yakin Akan Menghapus Data </h4>
            </div>
            <div class="modal-footer">
              <form action="/admin/delete/{{$user->username}}" method="post">
                <?php echo csrf_field(); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach

      @foreach($users as $user)
      <!-- Modal Update User -->
      <div class="modal fade" id="modal-updateUser{{$user->username}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Update User</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/admin/update">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter Username" value="{{$user->username}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama </label>
                      <input type="text" class="form-control" name="nama" placeholder="Enter Name" value="{{$user->nama}}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Role </label>
                        <select class="form-control" name="role" required>
                        @foreach($role as $item)
                           @if($item->description != "master")
                          <option value="{{$item->description}}">{{$item->description}}</option>
                          @endif
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning">Update User</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->



    <!-- jQuery 2.1.4 -->
    <script src="/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/bower_components/admin-lte/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/admin-lte/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/bower_components/admin-lte/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/bower_components/admin-lte/dist/js/demo.js"></script>
    <!-- page script -->
    <script>

      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
  </body>
</html>
