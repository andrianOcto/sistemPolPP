<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset("/bower_components/admin-lte/awesome-font/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <!-- <link href="{{ asset("/bower_components/admin-lte/dist/css/ionic.css")}}" rel="stylesheet" type="text/css" /> -->
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
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/select2/select2.min.css")}}">
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
            Setting Urusan
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
        @if (session('successMessage') != null)
          <!-- Success message kalau data berhasil dimasukkan -->
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{session('successMessage')}} </h4>
          </div>
          @endif
          <div class='row'>
  <div class='col-md-10'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Satuan Kerja</h3>
      </div>
      <div class="box-body">
        <div class="col-md-12">
        <form class="form-horizontal" role="form" method="post" action="satuanKerja/save">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Urusan</label>
              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;" id="kode_urusan" name="id_urusan">
                  @foreach($urusan as $data)
                  <option value="{{$data->id}}" <?php if($data->id==$satuanKerja->id_urusan) echo "selected" ?>>{{$data->id}} &nbsp {{$data->description}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Kode SKPD</label>
              <div class="col-xs-3">
                      <input type="text" class="form-control" placeholder="" id="kode_skpd" name="kode_skpd" value="{{$satuanKerja->id_urusan}}">
              </div>
              <div class="col-xs-3">
                <input type="text" class="form-control" placeholder="" name="kode_skpd2" value="{{$satuanKerja->kode_skpd}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama SKPD</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama SKPD" name="nama_skpd" value="{{$satuanKerja->nama_skpd}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Bendahara</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Bendahara" name="nama_bendahara" value="{{$satuanKerja->nama_bendahara}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NIP Bendahara</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="NIP Bendahara" name="nip_bendahara" value="{{$satuanKerja->nip}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NPWP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="NPWP" name="npwp" value="{{$satuanKerja->npwp}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Bank</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Bank" name="nama_bank" value="{{$satuanKerja->nama_bank}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">No. Rekening</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="No. Rekening" name="rekening" value="{{$satuanKerja->no_rekening}}">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NIP Kepala</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="NIP Kepala" name="nip_kepala" value="{{$satuanKerja->nip_kepala}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Kepala</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Kepala" name="nama_kepala" value="{{$satuanKerja->nama_kepala}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Jabatan" name="nama_jabatan" value="{{$satuanKerja->nama_jabatan}}">
              </div>
            </div>

          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Simpan</button>
          </div><!-- /.box-footer -->
        </form>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

      <!-- Modal Add User-->
      <div class="modal fade" id="modal-addUrusan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Add User</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/urusan/add">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode </label>
                      <input type="text" class="form-control" name="kode" placeholder="Masukan Kode Urusan" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi </label>
                      <input type="text" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi Urusan" required>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php $i=1; ?>
      @foreach($urusan as $data)
      <!-- Modal Convirmation Delete User-->
      <div class="modal fade" id="modal-deleteUrusan{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
              <form action="/urusan/delete/{{$data->id}}" method="post">
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
      @foreach($urusan as $data)
      <!-- Modal Update User -->
      <div class="modal fade" id="modal-updateUrusan{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Update User</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/urusan/update">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" class="form-control" name="kode" placeholder="Kode" value="{{$data->id}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi </label>
                      <input type="text" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi" value="{{$data->description}}" required>
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
    <!-- Select2 -->
    <script src="{{ asset("bower_components/admin-lte/plugins/select2/select2.full.min.js")}}"></script>
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

        $('#kode_urusan').change(function(){
          var kode = $(this).val();
          if(kode != "-Pilih Jenis Belanja-")
            $('#kode_skpd').val(kode);
          else
            $('#kode_skpd').val(null);
        });

        $(".select2").select2();
      });
    </script>
  </body>
</html>
