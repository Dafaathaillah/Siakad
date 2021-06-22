@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Mahasiswa <a style="float: right;" class="btn btn-small btn-info"
                                     href="#myModal" role="button" data-toggle="modal"><i class="icon-plus"></i> Tambah Mahasiswa</a></h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nim}}</td>
                                            <td>{{$dt->nama_mahasiswa}}</td>
                                            <td>{{$dt->nama_kelas}}</td>
                                            <td>
                                             <a href="{{url('mahasiswa/edit/'.$dt->id)}}" class="btn btn-small btn-info"><i class="icon-edit"></i> Edit</a>
                                             &nbsp;
                                             <a onclick="return confirm('Yakin mau menhgapus data?')" 
                                             href="{{url('mahasiswa/delete/'.$dt->id)}}"class="btn btn-small btn-danger"><i class="icon-trash"></i> Delete</a>
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
    <h3 id="myModalLabel">Tambah Mahasiswa</h3>
  </div>
<form class="form-horizontal row-fluid" action="{{url('/mahasiswa/create')}}" method="POST">
  @csrf
  <div class="modal-body">

      <div class="control-group">
      <label class="control-label" for="basicinput">Nama Mahasiswa</label>
        <div class="controls">
          <input type="text" name="nama_mahasiswa" id="basicinput" placeholder="Nama Mahasiswa" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="basicinput">Prodi - Jurusan - Tingkat - Kelas</label>
          <div class="controls">
            <select tabindex="1" name="id_kelas" data-placeholder="Select here.." class="span8">
              <option value="0">Pilih Kelas</option>
                @foreach($kelas as $pd)
               <option value="{{$pd->id}}">{{$pd->nama_prodi}} - {{$pd->nama_jurusan}} - {{$pd->tingkat}} - {{$pd->nama_kelas}}</option>
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
