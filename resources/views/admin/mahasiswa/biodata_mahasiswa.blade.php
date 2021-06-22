@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                  <h3>Biodata</h3>
                                </div>
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/mahasiswa/update/biodata/'.$dt->id)}}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                   <div class="control-group">
                                        <label class="control-label" for="basicinput">Nama Mahasiswa</label>
                                          <div class="controls">
                                            <input type="text" readonly name="nama_mahasiswa" id="basicinput" placeholder="Nama Mahasiswa" class="span9" value="{{$dt->nama_mahasiswa}}">
                                                          <span class="help-inline">Jika ada kesalahan hubungi admin</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Nim Mahasiswa</label>
                                          <div class="controls">
                                            <input type="text" readonly id="basicinput" placeholder="Nama Mahasiswa" class="span9" value="{{$dt->nim}}">
                                                          <span class="help-inline">Digunakan untuk login user : nim dan pass : nim</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="basicinput">Prodi - Jurusan - Tingkat - Kelas</label>
                                            <div class="controls">
                                              <select disabled tabindex="1" name="id_kelas" data-placeholder="Select here.." class="span9">
                                                <option value="0">Pilih Kelas</option>
                                                  @foreach($kelas as $pd)
                                                 <option value="{{$pd->id}}"
                                                  {{$dt->id_kelas==$pd->id?'selected':''}}
                                                  >{{$pd->nama_kelas}} - {{$pd->nama_jurusan}} - {{$pd->tingkat}} - {{$pd->nama_kelas}}</option>
                                                 @endforeach
                                                </select>
                                              </div>
                                          </div>

                                      <div class="control-group">
                                        <label class="control-label" for="basicinput">Tanggal Lahir</label>
                                          <div class="controls">
                                            <input type="date"  name="tanggal_lahir" id="basicinput" placeholder="Nama Mahasiswa" class="span9" value="{{$dt->tanggal_lahir}}">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Tempat Lahir</label>
                                          <div class="controls">
                                            <input type="text"  name="tempat_lahir" id="basicinput" placeholder="Tempat Lahir" class="span9" value="{{$dt->tempat_lahir}}">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Alamat Lengkap</label>
                                          <div class="controls">
                                           <textarea class="span9" name="alamat" placeholder="Alamat Lengkap">
                                             {{$dt->tempat_lahir}}
                                           </textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Asal Sekolah</label>
                                          <div class="controls">
                                           <input type="text"  name="asal_sekolah" id="basicinput" placeholder="Asal Sekolah" class="span9" value="{{$dt->asal_sekolah}}">
                                            </div>
                                        </div>
                                         <div class="control-group">
                                        <label class="control-label" for="basicinput">Jurusan Asal</label>
                                          <div class="controls">
                                           <input type="text"  name="jurusan_sekolah" id="basicinput" placeholder="Jurusan Asal" class="span9" value="{{$dt->jurusan_sekolah}}">
                                            </div>
                                        </div>

                                         <div class="control-group">
                                        <label class="control-label" for="basicinput">Jenis Kelamin</label>
                                          <div class="controls">
                                              <select  tabindex="1" name="jenis_kelamin" data-placeholder="Select here.." class="span9">
                                                <option value="0">Pilih Jenis Kelamin</option>
                                                 <option value="Laki-laki" 
                                                 {{$dt->jenis_kelamin=='Laki-laki'?'selected':''}}
                                                 >Laki-laki</option>
                                                  <option value="Perempuan"
                                                   {{$dt->jenis_kelamin=='Perempuan'?'selected':''}}
                                                  >Perempuan</option>
                                                </select>
                                              </div>
                                            </div>

                                             <div class="control-group">
                                        <label class="control-label" for="basicinput">Agama</label>
                                          <div class="controls">
                                              <select  tabindex="1" name="agama" data-placeholder="Select here.." class="span9">
                                                     <option value="0">Pilih Agama</option>
                                                      <option value="ISLAM"
                                                      {{$dt->agama=='ISLAM'?'selected':''}}
                                                      >ISLAM</option>
                                                      <option value="KATOLIK"
                                                      {{$dt->agama=='KATOLIK'?'selected':''}}
                                                      >KATOLIK</option>
                                                      <option value="KRISTEN PROTESTAN"
                                                      {{$dt->agama=='KRISTEN PROTESTAN'?'selected':''}}
                                                      >KRISTEN PROTESTAN</option>
                                                      <option value="HINDU"
                                                      {{$dt->agama=='HINDU'?'selected':''}}
                                                      >HINDU</option>
                                                      <option value="BUDDHA"
                                                      {{$dt->agama=='BUDDHA'?'selected':''}}
                                                      >BUDDHA</option>
                                                      <option value="KONGHUCU"
                                                      {{$dt->agama=='KONGHUCU'?'selected':''}}
                                                      >KONGHUCU</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                        <label class="control-label" for="basicinput">No Handphone</label>
                                          <div class="controls">
                                            <input type="text"  name="no_hp" id="basicinput" placeholder="No Handphone" class="span9" value="{{$dt->no_hp}}">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Email</label>
                                          <div class="controls">
                                            <input type="text"  name="email" id="basicinput" placeholder="Email Mahasiswa" class="span9" value="{{$dt->email}}">
                                            </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="basicinput">Foto Mahasiswa</label>
                                            <div class="controls">
                                              <input type="file" name="foto_mahasiswa" id="basicinput" placeholder="" class="span9">
                                                           <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                              </div>
                                               <div class="controls">
                                              <img src="{{$dt->foto_mahasiswa}}" style="width: 20%" align="center">
                                            </div>
                                              <input type="hidden" name="old_foto" value="{{$dt->foto_mahasiswa}}">
                                          </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('home')}}" class="btn btn">Kembali</a>
                                      <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                  </div>
                                    </form>
                              </div>
                        </div><!--/.module-->
                    </div>
                </div>
                    <!--/.span9-->


                    <!-- Modal -->
@endsection
