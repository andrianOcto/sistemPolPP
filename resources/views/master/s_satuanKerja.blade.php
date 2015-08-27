@extends('dashboard')

@section('content')
<div class='row'>
  <div class='col-md-10'>
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Satuan Kerja</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="col-md-12">
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Urusan</label>
              <div class="col-sm-10">
                <select class="form-control select2" style="width: 100%;">
                  <option>1.01 Urusan Wajib Pendidikan</option>
                  <option>1.02 Urusan Wajib Kesehatan</option>
                  <option>1.03 Urusan Wajib Pekerjaan Umum</option>
                  <option>1.04 Urusan Wajib Perumahan</option>
                  <option>1.05 Urusan Wajib Penataan Ruan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Kode SKPD</label>
              <div class="col-xs-3">
                      <input type="text" class="form-control" placeholder="">
              </div>
              <div class="col-xs-3">
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Bendahara</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Nama Bendahara">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NIP Bendahara</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="NIP Bendahara">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NPWP</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="NPWP">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Bank</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Nama Bank">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">No. Rekening</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="No. Rekening">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">NIP Kepala</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="NIP Kepala">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Kepala</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Nama Kepala">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Jabatan</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Nama Jabatan">
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
@endsection