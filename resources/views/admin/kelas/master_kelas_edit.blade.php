@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/kelas/update/'.$dt->id)}}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                  <div class="control-group">
                                  <label class="control-label" for="basicinput">Nama kelas</label>
                                    <div class="controls">
                                      <input type="text" name="nama_kelas" id="basicinput" placeholder="Nama kelas" class="span8" value="{{$dt->nama_kelas}}">
                                                   <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                      </div>
                                  </div>
                                  <div class="control-group">
                                    <label class="control-label" for="basicinput">Jurusan</label>
                                      <div class="controls">
                                        <select tabindex="1" name="id_jurusan" data-placeholder="Select here.." class="span8">
                                           <option value="0">Pilih Jurusan</option>
                                           @foreach($jurusan as $pd)
                                           <option value="{{$pd->id}}"
                                            {{$dt->id_jurusan == $pd->id?'selected':''}}
                                            >{{$pd->nama_jurusan}} - Tingkat {{$pd->tingkat}}</option>
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
                                           <option value="{{$pd->id}}"
                                            {{$dt->id_dosen == $pd->id?'selected':''}}
                                            >{{$pd->nama_dosen}}</option>
                                           @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('kelas')}}" class="btn btn">Kembali</a>
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
