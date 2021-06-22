@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Mata Kuliah <a style="float: right;" class="btn btn-small btn-info"
                                     href="#myModal" role="button" data-toggle="modal"><i class="icon-plus"></i> Tambah Mata Kuliah</a></h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Sks</th>
                                            <th>Semester</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nama_mata_kuliah}}</td>
                                            <td>{{$dt->sks}}</td>
                                            <td>{{$dt->semester}}</td>
                                            <td>{{$dt->nama_dosen}}</td>
                                            <td>
                                             <a href="{{url('matakuliah/edit/'.$dt->id)}}" class="btn btn-small btn-info"><i class="icon-edit"></i> Edit</a>
                                             &nbsp;
                                             <a onclick="return confirm('Yakin mau menhgapus data?')"  href="{{url('matakuliah/delete/'.$dt->id)}}" class="btn btn-small btn-danger"><i class="icon-trash"></i> Delete</a>
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
    <h3 id="myModalLabel">Tambah Mata Kuliah</h3>
  </div>
<form class="form-horizontal row-fluid" action="{{url('/matakuliah/create')}}" method="POST">
  @csrf
  <div class="modal-body">

      <div class="control-group">
      <label class="control-label" for="basicinput">Nama Mata Kuliah</label>
        <div class="controls">
          <input type="text" name="nama_mata_kuliah" id="basicinput" placeholder="Nama Mata Kuliah" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
       <div class="control-group">
      <label class="control-label" for="basicinput">Sks Mata Kuliah</label>
        <div class="controls">
          <input type="text" name="sks" id="basicinput" placeholder="Sks Mata Kuliah" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="basicinput">Semester</label>
          <div class="controls">
            <select tabindex="1" name="semester" data-placeholder="Select here.." class="span8">
              <option value="0">Pilih Semester</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              </select>
            </div>
        </div>
         <div class="control-group">
        <label class="control-label" for="basicinput">Dosen Pengampu</label>
          <div class="controls">
            <select tabindex="1" name="id_dosen" data-placeholder="Select here.." class="span8">
               <option value="0">Pilih Dosen</option>
               @foreach($dosen as $pd)
               <option value="{{$pd->id}}">{{$pd->nama_dosen}}</option>
               @endforeach
              </select>
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
