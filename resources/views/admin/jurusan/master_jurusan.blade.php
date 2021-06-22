@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Jurusan <a style="float: right;" class="btn btn-small btn-info"
                                     href="#myModal" role="button" data-toggle="modal"><i class="icon-plus"></i> Tambah Jurusan</a></h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Porodi</th>
                                            <th>Nama Jurusan</th>
                                            <th>Tingkat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nama_prodi}}</td>
                                            <td>{{$dt->nama_jurusan}}</td>
                                            <td>{{$dt->tingkat}}</td>
                                            <td>
                                             <a href="{{url('jurusan/edit/'.$dt->id)}}" class="btn btn-small btn-info"><i class="icon-edit"></i> Edit</a>
                                             &nbsp;
                                             <a onclick="return confirm('Yakin mau menhgapus data?')"  href="{{url('jurusan/delete/'.$dt->id)}}" class="btn btn-small btn-danger"><i class="icon-trash"></i> Delete</a>
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
    <h3 id="myModalLabel">Tambah Prodi</h3>
  </div>
<form class="form-horizontal row-fluid" action="{{url('/jurusan/create')}}" method="POST">
  @csrf
  <div class="modal-body">

      <div class="control-group">
      <label class="control-label" for="basicinput">Nama Jurusan</label>
        <div class="controls">
          <input type="text" name="nama_jurusan" id="basicinput" placeholder="Nama Jurusan" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="basicinput">Program</label>
          <div class="controls">
            <select name="id_prodi"
             tabindex="1" data-placeholder="Nama Pordi" class="span8">
               <option value="0">Pilih prodi</option>
               @foreach($prodi as $pd)
               <option value="{{$pd->id}}">{{$pd->nama_prodi}}</option>
               @endforeach
              </select>
            </div>
        </div>
         <div class="control-group">
        <label class="control-label" for="basicinput">Tingat</label>
          <div class="controls">
            <select name="tingkat"
             tabindex="1" data-placeholder="Tingkat" class="span8">
               <option value="0">Pilih Tingkat</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              </select>
            </div>
        </div>
  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" type="submit">Submit</button>
  </div>
  </form>
</div>
@endsection
