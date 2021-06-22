@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Dosen <a style="float: right;" class="btn btn-small btn-info"
                                     href="#myModal" role="button" data-toggle="modal"><i class="icon-plus"></i> Tambah Dosen</a></h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nip</th>
                                            <th>Nama Dosen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nip}}</td>
                                            <td>{{$dt->nama_dosen}}</td>
                                            <td>
                                             <a href="{{url('dosen/edit/'.$dt->id)}}" class="btn btn-small btn-info"><i class="icon-edit"></i> Edit</a>
                                             &nbsp;
                                             <a onclick="return confirm('Yakin mau menhgapus data?')"  href="{{url('dosen/delete/'.$dt->id)}}" class="btn btn-small btn-danger"><i class="icon-trash"></i> Delete</a>
                                         </td>
                                        </tr>
                                        <!-- endmodaledit -->
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!--/.module-->
                    </div>
                </div>
                    <!--/.span9-->


                    <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Dosen</h3>
  </div>
<form class="form-horizontal row-fluid" action="{{url('/dosen/create')}}" method="POST"
 enctype="multipart/form-data">
  @csrf
  <div class="modal-body">

      <div class="control-group">
      <label class="control-label" for="basicinput">Nama Dosen</label>
        <div class="controls">
          <input type="text" name="nama_dosen" id="basicinput" placeholder="Nama Dosen" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="basicinput">Nip Dosen</label>
        <div class="controls">
          <input type="text" name="nip" id="basicinput" placeholder="Nip Dosen" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
       <div class="control-group">
      <label class="control-label" for="basicinput">Foto Dosen</label>
        <div class="controls">
          <input type="file" name="foto_dosen" id="basicinput" placeholder="" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
@endsection
