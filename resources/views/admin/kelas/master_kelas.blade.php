@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Kelas <a style="float: right;" class="btn btn-small btn-info"
                                     href="#myModal" role="button" data-toggle="modal"><i class="icon-plus"></i> Tambah Kelas</a></h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Tingkat</th>
                                            <th>Dosen Dpa</th>
                                            <th>Nama Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nama_jurusan}}</td>
                                            <td>{{$dt->tingkat}}</td>
                                            <td>{{$dt->nama_dosen}}</td>
                                            <td>{{$dt->nama_kelas}}</td>
                                            <td>
                                             <a href="{{url('kelas/edit/'.$dt->id)}}" class="btn btn-small btn-info"><i class="icon-edit"></i> Edit</a>
                                             &nbsp;
                                             <a onclick="return confirm('Yakin mau menhgapus data?')"  href="{{url('kelas/delete/'.$dt->id)}}" class="btn btn-small btn-danger"><i class="icon-trash"></i> Delete</a>
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
    <h3 id="myModalLabel">Tambah kelas</h3>
  </div>
<form class="form-horizontal row-fluid" action="{{url('/kelas/create')}}" method="POST">
  @csrf
  <div class="modal-body">

      <div class="control-group">
      <label class="control-label" for="basicinput">Nama kelas</label>
        <div class="controls">
          <input type="text" name="nama_kelas" id="basicinput" placeholder="Nama kelas" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="basicinput">Jurusan</label>
          <div class="controls">
            <select tabindex="1" name="id_jurusan" data-placeholder="Select here.." class="span8">
               <option value="0">Pilih Jurusan</option>
               @foreach($jurusan as $pd)
               <option value="{{$pd->id}}">{{$pd->nama_jurusan}} - Tingkat {{$pd->tingkat}}</option>
               @endforeach
              </select>
            </div>
        </div>
        <div class="control-group">
        <label class="control-label" for="basicinput">Dosen Dpa</label>
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
