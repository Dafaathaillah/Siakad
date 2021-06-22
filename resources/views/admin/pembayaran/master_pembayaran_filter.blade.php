@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Tagihan Siswa 
                                   </h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nim}}</td>
                                            <td>{{$dt->nama_mahasiswa}}</td>
                                            <td>{{$dt->nama_jurusan}}</td>
                                            <td>{{$dt->nama_kelas}}</td>
                                            <td>
                                              {{$dt->status}}
                                            <td>
                                               @if($dt->bukti_bayar==NULL)
                                                -
                                              @elseif($dt->bukti_bayar!=NULL && $dt->status=='Menunggu Verfikasi Admin')
                                              <a href="{{$dt->bukti_bayar}}" target="_blank" ><i class="icon-download"></i>Lihat Bukti</a>
                                              &nbsp; &nbsp;
                                               <a onclick="return confirm('Setujui pembayaran?')" 
                                               href="{{url('/pembayaran/sudah/'.$dt->id_trs)}}"><i class="icon-check"></i>Setjui</a>
                                               @else
                                               -
                                              @endif
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


  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
@endsection
