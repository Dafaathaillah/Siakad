@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                              @if($message=Session::get('danger'))
                            <div class="alert bg-teal" role="alert">
                                <em class="fa fa-lg fa-check">&nbsp;</em> 
                               <p style="color: red">{{$message}}</p>
                            </div>
                            @endif
                             @if($message=Session::get('success'))
                            <div class="alert bg-teal" role="alert">
                                <em class="fa fa-lg fa-check">&nbsp;</em> 
                               <p style="color: green">{{$message}}</p>
                            </div>
                            @endif
                                <h3>Daftar UKT <a style="float: right;" class="btn btn-small btn-info"
                                     href="#myModal" role="button" data-toggle="modal"><i class="icon-plus"></i> Tambah UKT</a></h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Tingkat</th>
                                            <th>Tahung Angkatan</th>
                                            <th>Nominal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nama_jurusan}}</td>
                                            <td>{{$dt->tingkat}}</td>
                                            <td>{{$dt->tahun_angkatan}}</td>
                                            <td>{{number_format($dt->nominal)}}</td>
                                            <td>   <a href="{{url('pembayaran/admin/filter/'.$dt->id_jurusan)}}" class="btn btn-small btn-info"><i class="icon-money"></i> Detail</a></td>
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
    <h3 id="myModalLabel">Tambah UKT</h3>
  </div>
<form class="form-horizontal row-fluid" action="{{url('/pembayaran/generate')}}" method="POST">
  @csrf
  <div class="modal-body">

 <div class="control-group">
        <label class="control-label" for="basicinput">Prodi - Jurusan - Tingkat - Kelas</label>
          <div class="controls">
            <select tabindex="1" name="id_jurusan" data-placeholder="Select here.." class="span8">
              <option value="0">Pilih Jurusan</option>
                @foreach($kelas as $pd)
               <option value="{{$pd->id_jurusan}}">{{$pd->nama_prodi}} - {{$pd->nama_jurusan}} - {{$pd->tingkat}} - {{$pd->nama_kelas}}</option>
               @endforeach
              </select>
            </div>
        </div>
     <div class="control-group">
      <label class="control-label" for="basicinput">Tahun Angkatan</label>
        <div class="controls">
          <input type="text" name="tahun_angkatan" id="basicinput" readonly value="{{date('Y')}}" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
       <div class="control-group">
      <label class="control-label" for="basicinput">Nominal</label>
        <div class="controls">
          <input type="text" name="nominal" id="basicinput"  placeholder="Nominal Ukt" class="span8">
                       <!--  <span class="help-inline">Minimum 5 Characters</span> -->
          </div>
      </div>
  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin membuat tagihan ukt ini, aksi ini tidak dapat di hapus atau pun di edit!')">Submit</button>
  </div>
  </form>
</div>
@endsection
