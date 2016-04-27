<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Master Setting</title>
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
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js">
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
      @include('sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
          <h1>
            Setting Program
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
                  <a class="btn bg-blue btn-app" href="#modal-addProgram" data-toggle="modal" data-target="#modal-addProgram">
                    <i class="fa fa-plus"> </i>
                    <b>Tambah Program</b>
                  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Program </th>
                        <th align="center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i =0 ;?>
                      @foreach($programs as $program)
                      <tr @if($i==0) class = "success"
                          @endif
                        >
                        <td>{{$program->id}} </td>
                        <td>{{$program->description}}</td>
                        <td align="center">
                          <a class="btn btn-warning" href="#modal-updateProgram{{$i}}" data-toggle="modal" data-target="#modal-updateProgram{{$i}}">
                              <i class="fa fa-edit fa-lg"></i> Update
                          </a>
                          <a class="btn btn-danger"  href="#modal-deleteProgram{{$i}}" data-toggle="modal" data-target="#modal-deleteProgram{{$i}}">
                              <i class="fa fa-trash-o fa-lg"></i> Delete
                          </a>
                        </td>
                      </tr>
                      <?php $i++?>
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

        <section class="content-header">
          <h1>
            Setting Kegiatan
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <a class="btn bg-blue btn-app" href="#modal-addKegiatan" data-toggle="modal" data-target="#modal-addKegiatan">
                    <i class="fa fa-plus"> </i>
                    <b>Tambah Kegiatan</b>
                  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tableProgram" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Kegiatan</th>
                      </tr>
                    </thead>

                    <tfoot>

                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <!-- Modal Add Program-->
      <div class="modal fade" id="modal-addProgram" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Tambah Program</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/program/add">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Program" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Program</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Program" required>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah Program</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <?php $i=0;?>
      @foreach($programs as $program)
      <!-- Modal Convirmation Delete Program-->
      <div class="modal fade" id="modal-deleteProgram{{$program->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
              <form action="/program/delete/{{$program->id}}" method="post">
                <?php echo csrf_field(); ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php $i++;?>
      @endforeach

      <?php $i=0;?>
      @foreach($programs as $program)
      <!-- Modal Update Program -->
      <div class="modal fade" id="modal-updateProgram{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Update Program</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/program/update">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode</label>
                      <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Program" value="{{$program->id}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Program</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Program" value="{{$program->description}}" required>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning">Update Program</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php $i++;?>
      @endforeach

      <!-- Modal Add Kegiatan-->
      <div class="modal fade" id="modal-addKegiatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Tambah Kegiatan</h2>
            </div>
            <div class="modal-body">

              <form role="form" method="post" action="/kegiatan/add">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">KodeBidang</label>
                      <div>
                      <div class="col-md-3" style="padding-left:0px">
                        <select class="form-control" name="kodeBidang" id="kodeBidang" required>
                        <option disabled selected>-Pilih Kode Bidang-</option>
                        @foreach($bidang as $item)
                          <option value="{{$item->id}}">{{$item->id}}</option>
                        @endforeach
                      </select></div>
                      <div class="col-md-9"><input type="text" class="form-control" name="shortNameBidang" id="shortNameBidang" placeholder="" readonly></div>
                      </div>
                    </div>
                    <div class="form-group" style="margin-top:50px">
                      <input type="text" class="form-control" name="completeNameBidang" id="completeNameBidang" placeholder="" readonly>
                    </div>

                    <hr class="divider" style="border-top-color:#908D8D;border-top-width:2px">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Program</label>
                      <input type="text" class="form-control" name="kodeProgram" id="kodeProgram" placeholder="Masukkan Kode Program" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Program</label>
                      <input type="text" class="form-control" name="namaProgram" id="namaProgram" placeholder="Masukkan Nama Program" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Kegiatan</label>
                      <div>
                        <div class="col-md-8" style="padding-left:0px;padding-right:5px">
                          <input type="text" class="form-control" name="kodeProgram2" id="kodeProgram2" placeholder="Masukkan Kode Program" readonly>
                         </div>
                        <div class="col-md-4" style="padding-right:0px;padding-left:0px">
                          <input type="text" class="form-control" name="kodeKegiatan" placeholder="Masukkan Kode Program" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <textarea class="form-control" rows="5" name="namaKegiatan" placeholder="Masukkan Nama Kegiatan" required></textarea>
                    </div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" onClick="if(document.getElementById('kodeBidang').value == '-Pilih Kode Bidang-') document.getElementById('kodeBidang').value=null">Tambah Kegiatan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

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

    //data that will be used to reload datatables
    var data = [];
    var table;
    var table2;
      $(function () {
        $("#tableProgram").DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "data" : data
        });

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
        table = $('#example2').DataTable();
        table2 = $('#tableProgram').DataTable();
      });



    //initialize data
    function refreshData(id)
    {

      $.ajax({
        url: "/program/load/"+id,
        success: function(response) {


          //if single data
          if(typeof(response.length) === "undefined")
          {
            table2.clear();
            //create data from response

              var arrTemp = [];
              var objName;

              arrTemp.push(response["id"]);
              arrTemp.push(response["description"]);

              table2.row.add(arrTemp);

          }
          //if multiple data
          else if(typeof(response.length) === "number")
          {
            table2.clear();
            //create data set from response
            for (var i =0; i<response.length ; i++) {
                    var arrTemp = [];
                    var objName;

                    arrTemp.push(response[i]["id"]);
                    arrTemp.push(response[i]["description"]);

                    table2.row.add(arrTemp);
                }
          }


            table2.draw();

            //Do Something
        },
        error: function(xhr) {
            //Do Something to handle error
            alert("tidak berhasil");
        }
      });
    }

    //when load done
    $(document).ready(function() {

    var arrBidangKode = [];
    var arrBidangNama = [];

    //add nama to array list of bidang
    @foreach($bidang as $item)
      arrBidangKode['{{$item->id}}'] = '{{$item->nama}}';
    @endforeach

    //add nama_lengkap to array list of bidang
    @foreach($bidang as $item)
      arrBidangNama['{{$item->id}}'] = '{{$item->nama_lengkap}}';
    @endforeach

    <?php $i=0;?>
    @foreach($programs as $item)
      @if ($i==0)
        $('#kodeProgram').val('{{$item->id}}');
        $('#kodeProgram2').val('{{$item->id}}');
        $('#namaProgram').val('{{$item->description}}');
      @endif
    <?php $i++;?>
    @endforeach

    //digunakan untuk mengupdate pada saat select d ganti
    $('#kodeBidang').change(function(){
      var kode = $(this).val();
      if(kode != "-Pilih Kode Bidang-")
      {
        $('#shortNameBidang').val(arrBidangKode[kode]);
        $('#completeNameBidang').val(arrBidangNama[kode]);
      }
    });

    <?php try { if(isset($programs[0]['id'])){} ?>
    refreshData("<?php if(isset($programs[0]['id']))echo $programs[0]['id']?>");
    table2.clear();
    for(var item in data)
    table2.row.add(item);
    table2.draw();
    <?php }catch(Exception $e){} ?>

    $('#example2 tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('success') ) {
            //$(this).removeClass('success');
        }
        else {
            table.$('tr.success').removeClass('success');
            $(this).addClass('success');
            var rowData= table.row( this ).data();
            refreshData(rowData[0]);
            $('#kodeProgram').val(rowData[0]);
            $('#kodeProgram2').val(rowData[0]);
            $('#namaProgram').val(rowData[1]);
        }
    } );

    $('#button').click( function () {
        table.row('.success').remove().draw( false );
    } );
} );


    </script>
  </body>
</html>
