<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Entry Anggaran</title>
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
            Entry RKO
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
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Program </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i =0 ;?>
                      @foreach($programs as $program)
                      <tr @if($i==0) class = "success"
                          @endif
                        >
                        <td>{{$program->id}}</td>
                        <td>{{$program->description}}</td>
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
            RKO Kegiatan
            <small></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tableProgram" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Kegiatan</th>
                        <th>Action</th>
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

      <!-- Modal Update User -->
      <div class="modal fade" id="modal-updateProgram" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2 class="modal-title" id="myModalLabel">Entry RKO</h2>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="/entryRKO/update">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Kegiatan</label>
                      <input type="text" class="form-control" name="kodeKegiatan" id="kodeKegiatan" placeholder="Masukkan Kode Program" value="{{$program->id}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <input type="text" class="form-control" name="namaKegiatan" id="namaKegiatan" placeholder="Masukkan Nama Program" value="{{$program->description}}" readonly>
                    </div>
                    <hr class="divider" style="border-top-color:#908D8D;border-top-width:2px">

                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="exampleInputEmail1">Januari</label>
                        <input type="text" class="form-control" name="jan" id="jan" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Februari</label>
                        <input type="text" class="form-control" name="feb" id="feb" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Maret</label>
                        <input type="text" class="form-control" name="mar" id="mar" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="exampleInputEmail1">April</label>
                        <input type="text" class="form-control" name="apr" id="apr" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Mei</label>
                        <input type="text" class="form-control" name="mei" id="mei" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Juni</label>
                        <input type="text" class="form-control" name="jun" id="jun" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="exampleInputEmail1">Juli</label>
                        <input type="text" class="form-control" name="jul" id="jul" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Agustus</label>
                        <input type="text" class="form-control" name="agu" id="agu" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">September</label>
                        <input type="text" class="form-control" name="sep" id="sep" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="exampleInputEmail1">Oktober</label>
                        <input type="text" class="form-control" name="okt" id="okt" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">November</label>
                        <input type="text" class="form-control" name="nov" id="nov" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Desember</label>
                        <input type="text" class="form-control" name="des" id="des" onkeyup="sumTotal()" placeholder="0" required>
                      </div>
                    </div>

                    <hr class="divider" style="border-top-color:#908D8D;border-top-width:2px">


                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="exampleInputEmail1">Total Anggaran</label>
                        <input type="text" class="form-control" name="totalAnggaran" id="totalAnggaran" placeholder="0" readOnly required>
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Sasaran Anggaran</label>
                        <input type="text" class="form-control" name="anggaranSasaran" id="anggaranSasaran" placeholder="{{}}" readOnly required>
                      </div>

                    </div>
                                        <div class="alert alert-danger" id="alertTotal" role="alert">Total anggaran dan Sasaran Anggaran tidak sama</div>
                  </div><!-- /.box-body -->
                  <?php echo csrf_field(); ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="updateButton" name="updateButton" disabled class="btn btn-warning">Update</button>
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

    function sumTotal(){
      var jan = parseInt(document.getElementById("jan").value);
      var feb = parseInt(document.getElementById("feb").value);
      var mar = parseInt(document.getElementById("mar").value);
      var apr = parseInt(document.getElementById("apr").value);
      var mei = parseInt(document.getElementById("mei").value);
      var jun = parseInt(document.getElementById("jun").value);
      var jul = parseInt(document.getElementById("jul").value);
      var agu = parseInt(document.getElementById("agu").value);
      var sep = parseInt(document.getElementById("sep").value);
      var okt = parseInt(document.getElementById("okt").value);
      var nov = parseInt(document.getElementById("nov").value);
      var des = parseInt(document.getElementById("des").value);

      var total = jan + feb + mar + apr + mei + jun + jul + agu + sep + okt + nov + des;

      document.getElementById("totalAnggaran").value = total;

      var sasaran = document.getElementById("anggaranSasaran").value;

      if(sasaran != total)
      {
        document.getElementById("updateButton").disabled=true;
        document.getElementById("alertTotal").style.visibility="visible";
      }
      else
      {
        document.getElementById("updateButton").disabled=false;
        document.getElementById("alertTotal").style.visibility="hidden";
      }

    }
    function updateModal(idKegiatan,namaKegiatan,jan,feb,mar,apr,mei,jun,jul,agu,sep,okt,nov,des,anggaran)
    {
      document.getElementById("kodeKegiatan").value = idKegiatan;
      document.getElementById("namaKegiatan").value = namaKegiatan;

      document.getElementById("jan").value = jan;
      document.getElementById("feb").value = feb;
      document.getElementById("mar").value = mar;
      document.getElementById("apr").value = apr;
      document.getElementById("mei").value = mei;
      document.getElementById("jun").value = jun;
      document.getElementById("jul").value = jul;
      document.getElementById("agu").value = agu;
      document.getElementById("sep").value = sep;
      document.getElementById("okt").value = okt;
      document.getElementById("nov").value = nov;
      document.getElementById("des").value = des;
      document.getElementById("anggaranSasaran").value=anggaran;

    }

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
              var temp = "<a class='btn btn-primary' href='#modal-updateProgram' data-toggle='modal' data-target='#modal-updateProgram' onClick='updateModal(\""+response[i]['id']+"\",\""+response[i]['description']+"\",\""+response[i]['jan']+"\",\""+response[i]['feb']+"\",\""+response[i]['mar']+"\",\""+response[i]['apr']+"\",\""+response[i]['mei']+"\",\""+response[i]['jun']+"\",\""+response[i]['jul']+"\",\""+response[i]['agu']+"\",\""+response[i]['sep']+"\",\""+response[i]['okt']+"\",\""+response[i]['nov']+"\",\""+response[i]['des']+"\",\""+response[i]['anggaran']+"\"); sumTotal();'><i class='fa fa-edit fa-lg'></i> Entry RKO</a>";
              arrTemp.push(response["id"]);
              arrTemp.push(response["description"]);
              arrTemp.push(temp);
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

                    var temp = "<a class='btn btn-primary' href='#modal-updateProgram' data-toggle='modal' data-target='#modal-updateProgram' onClick='updateModal(\""+response[i]['id']+"\",\""+response[i]['description']+"\",\""+response[i]['jan']+"\",\""+response[i]['feb']+"\",\""+response[i]['mar']+"\",\""+response[i]['apr']+"\",\""+response[i]['mei']+"\",\""+response[i]['jun']+"\",\""+response[i]['jul']+"\",\""+response[i]['agu']+"\",\""+response[i]['sep']+"\",\""+response[i]['okt']+"\",\""+response[i]['nov']+"\",\""+response[i]['des']+"\",\""+response[i]['anggaran']+"\"); sumTotal();'><i class='fa fa-edit fa-lg'></i> Entry RKO</a>";

                    arrTemp.push(response[i]["id"]);
                    arrTemp.push(response[i]["description"]);
                    arrTemp.push(temp);
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

    refreshData("<?php if(isset($programs[0]['id']))echo $programs[0]['id']?>");
    table2.clear();
    for(var item in data)
    table2.row.add(item);
    table2.draw();

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
