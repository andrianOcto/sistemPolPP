<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Entry Realisasi Kegiatan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    <link href="{{ asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css") }}" rel="stylesheet" type="text/css" />
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
            Entry Realisasi Kegiatan
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
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                
                  <form class="form-horizontal" method="post" action="/SPJ/add">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kode Kegiatan</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="id_kegiatan" value="{{$detailKegiatan->id}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Bidang</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputEmail3" value="{{$detailKegiatan->nama_bidang}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anggaran</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputEmail3" value="{{$detailKegiatan->anggaran}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Kegiatan</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" value="{{$detailKegiatan->description}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Rekening Belanja</label>
                      <div class="col-sm-6">
                        <select class="form-control select2" name="id_rincian" style="width: 100%;" id="">
                          @foreach($rincian_belanja as $data)
                          <option value="{{$data->id}}">{{$data->id}} &nbsp {{$data->description}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Keperluan</label>
                      <div class="col-xs-4">
                        <select class="form-control" style="width: 100%;" name="keperluan_select" id="keperluan_select">
                          <option value="pilih">-Pilih Keperluan-</option>
                          @foreach($rencana as $data)
                          <option value="{{$data->description}}">{{$data->description}}</option>
                          @endforeach
                          <option value="other">Lain-lain</option>
                        </select>
                      </div>
                      <div class="col-xs-4">
                        <input type="text" class="form-control" id="keperluan" name="keperluan" readonly="" reqiured="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputEmail3" name="jumlah">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputEmail3" name="harga">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">tanggal</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="tanggal" name="tanggal">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Tambah Program</button>
                      </div>
                    </div>
                  </form>

                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id Kegiatan</th>
                        <th>Id Rincian</th>
                        <th>Tahun</th>
                        <th>Keperluan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; ?>
                      @foreach($detailSPJ as $data)
                      <tr>
                        <td>{{$data->id_kegiatan}}</td>
                        <td>{{$data->id_rincian}}</td>
                        <td>{{$data->tahun}}</td>
                        <td>{{$data->keperluan}}</td>
                        <td>{{$data->jumlah}}</td>
                        <td>Rp {{ number_format($data->harga,2,',','.')}}</td>
                        <td align="center">
                          <a class="btn btn-warning" href="#modal-updateBidang{{$i}}" data-toggle="modal" data-target="#modal-updateBidang{{$i}}">
                              <i class="fa fa-edit fa-lg"></i> Update
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
      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
      
      <!-- Control Sidebar -->



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
    <!-- Select2 -->
    <script src="{{ asset("bower_components/admin-lte/plugins/select2/select2.full.min.js")}}"></script>
    <script src="{{ asset("bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
    <script>

      $(function () {
        $(".select2").select2();
        $("#tanggal").datepicker({
          format: 'dd/mm/yyyy'
        });
      });

      $('#keperluan_select').change(function(){
          var keperluan = $(this).val();
          if(keperluan != "pilih" && keperluan != "other"){
            $('#keperluan').val(keperluan);
            $('#keperluan').attr('readonly','');
          }else if (keperluan == "other") {
            $('#keperluan').removeAttr("readonly");
            $('#keperluan').val("");
            $('#keperluan').focus();
          }else{
            $('#keperluan').val(null);
          }
        });


    </script>
  </body>
</html>
