<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Setting Rincian Obyek Belanja</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
    <link href="{{ asset("/bower_components/admin-lte/awesome-font/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/ionic.css")}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- DataTables -->
    <link href="{{ asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />

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
      @include('sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
          <h1>
            Setting Rincian Obyek belanja
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
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
                  <a class="btn bg-blue btn-app" href="#modal-addRincianbelanja" data-toggle="modal" data-target="#modal-addRincianbelanja">
                    <i class="fa fa-plus"> </i>
                    <b>Tambah Data</b>
                  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Obyek</th>
                        <th>Kode</th>
                        <th>Nama Rincian Obyek Belanja</th>
                        <th align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; ?>
                      @foreach($rincianbelanja as $data)
                      <tr>
                        <td>{{$data->id_objek}}</td>
                        <td>{{$data->id}}</td>
                        <td>{{$data->description}}</td>
                        <td align="center">
                          <a class="btn btn-warning" href="#modal-updateRincianbelanja{{$i}}" data-toggle="modal" data-target="#modal-updateRincianbelanja{{$i}}">
                              <i class="fa fa-edit fa-lg"></i> Update
                          </a>
                          <a class="btn btn-danger"  href="#modal-deleteRincianbelanja{{$i}}" data-toggle="modal" data-target="#modal-deleteRincianbelanja{{$i}}">
                              <i class="fa fa-trash-o fa-lg"></i> Delete
                          </a>
                        </td>
                      </tr>
                      <?php $i++; ?>
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
      <div class="modal fade" id="modal-addRincianbelanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Tambah</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/rincianBelanja/add">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Jenis Belanja</label>
                      <select class="form-control" name="objek" id="objek" required>
                        <option disabled selected>-Pilih Objek Belanja-</option>
                        @foreach($objek as $objek)
                        <option value="{{$objek->id}}"> {{$objek->id}} &nbsp &nbsp {{$objek->description}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Obyek Belanja</label>
                      <table>
                        <tr>
                          <td>
                            <input type="text" class="form-control" style="width: 120px" name="id_objek" id="id_objek" placeholder="Kode" value="" readonly>
                          </td>
                          <td>
                            <input type="text" class="form-control" style="width: 100px" name="kode" placeholder="Kode" required>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Rincian Obyek Belanja</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Rincian Obyek Belanja" required>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" onClick = "if(document.getElementById('objek').value == '-Pilih Objek Belanja-') document.getElementById('objek').value=null">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <?php $i=1; ?>
      @foreach($rincianbelanja as $data)
      <!-- Modal Convirmation Delete User-->
      <div class="modal fade" id="modal-deleteRincianbelanja{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
              <form action="/rincianBelanja/delete/{{$data->id}}" method="post">
                <?php echo csrf_field(); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php $i++; ?>
      @endforeach

      <?php $i=1; ?>
      @foreach($rincianbelanja as $data)
      <!-- Modal Update User -->
      <div class="modal fade" id="modal-updateRincianbelanja{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Update User</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/rincianBelanja/update/{{$i}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Jenis Belanja</label>
                      <select class="form-control" name="updateobjek{{$i}}" id="updateobjek{{$i}}">
                        <option disabled>-Pilih Jenis Belanja-</option>
                        @foreach($obj as $objek)
                        <option value="{{$objek->id}}" <?php if($data->id_objek == $objek->id) {echo "selected";} ?> readonly=''> {{$objek->id}} &nbsp &nbsp {{$objek->description}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Obyek Belanja</label>
                      <table>
                        <tr>
                          <td>
                            <input type="text" class="form-control" style="width: 120px" name="updateid_objek{{$i}}" id="updateid_objek{{$i}}" placeholder="Kode" value="{{$data->id_objek}}" readonly>
                            <input type="hidden" class="form-control" style="width: 120px" name="updateid_rincian" id="updateid_rincian" placeholder="Kode" value="{{$data->id}}" >
                          </td>
                          <td>
                            <?php $kd = explode('.', $data->id) ?>
                            <input type="text" class="form-control" style="width: 100px" name="kode" placeholder="Kode" readonly="" value="<?php echo $kd[3]; ?>">
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Obyek Belanja</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="{{ $data->description}}" required>
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
      <?php $i++; ?>
      @endforeach
      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->

    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}"></script>
    <!-- DataTables -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/demo.js") }}"></script>
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

        //digunakan untuk mengupdate pada saat select d ganti
        $('#objek').change(function(){
          var kode = $(this).val();
          if(kode != "-Pilih Jenis Belanja-")
            $('#id_objek').val(kode);
          else
            $('#id_objek').val(null);
        });

        //digunakan pada onchange event di modal update
        <?php $i=1; ?>
        @foreach($rincianbelanja as $data)
        $('#updateobjek{{$i}}').change(function(){
          var kode = $(this).val();
            $('#updateid_objek{{$i}}').val(kode);
        });
        <?php $i++; ?>
        @endforeach

      });
    </script>
  </body>
</html>
