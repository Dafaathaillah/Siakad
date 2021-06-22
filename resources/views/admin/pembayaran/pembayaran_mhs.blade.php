@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                            <div class="module-head">
                                <h3>Daftar Tagihan 
                                   </h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Nominal</th>
                                            <th>Bukti</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $dt)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td>{{$dt->nim}}</td>
                                            <td>{{$dt->nama_mahasiswa}}</td>
                                            <td> {{$dt->status}}</td>
                                            <td>{{number_format($dt->nominal)}}</td>
                                            <form enctype="multipart/form-data" 
                                            action="{{url('/pembayaran/upbukti/'.$dt->id_trs)}}"
                                             method="POST">
                                            @csrf
                                            <td>
                                               @if($dt->bukti_bayar==NULL)
                                              <input type="file" name="bukti_bayar">
                                                 @elseif($dt->bukti_bayar!=NULL)
                                                   <a href="{{$dt->bukti_bayar}}" target="_blank" class="btn btn-small btn-info"><i class="icon-download"></i>Lihat Bukti</a>
                                                  @endif
                                            </td>
                                            <td>
                                               @if($dt->bukti_bayar==NULL)
                                                 <button class="btn btn-small btn-info" type="submit"
                                                  onclick="return confirm('Aksi ini tidak dapat di batalakan pastikan anda mengupload bukti yang benar , jika ada kesalahan upload silahkan hubungi admin')">
                                                  <i class="icon-upload"></i> Upload</button>
                                              @elseif($dt->bukti_bayar!=NULL)
                                             
                                              @endif
                                         </td>
                                         </form>
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
