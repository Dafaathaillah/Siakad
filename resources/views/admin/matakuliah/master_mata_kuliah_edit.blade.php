@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/matakuliah/update/'.$dt->id)}}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                <div class="control-group">
                                <label class="control-label" for="basicinput">Nama Mata Kuliah</label>
                                  <div class="controls">
                                    <input type="text" name="nama_mata_kuliah" id="basicinput" placeholder="Nama Mata Kuliah" class="span8" value="{{$dt->nama_mata_kuliah}}">
                                                 <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                    </div>
                                </div>
                                 <div class="control-group">
                                <label class="control-label" for="basicinput">Sks Mata Kuliah</label>
                                  <div class="controls">
                                    <input type="text" name="sks" id="basicinput" placeholder="Sks Mata Kuliah" class="span8" value="{{$dt->sks}}">
                                                 <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label" for="basicinput">Semester</label>
                                    <div class="controls">
                                      <select tabindex="1" name="semester" data-placeholder="Select here.." class="span8">
                                        <option value="0">Pilih Semester</option>
                                        <option value="1" {{$dt->semester=='1'?'selected':''}}>1</option>
                                          <option value="2" {{$dt->semester=='2'?'selected':''}}>2</option>
                                          <option value="3" {{$dt->semester=='3'?'selected':''}}>3</option>
                                          <option value="4" {{$dt->semester=='4'?'selected':''}}>4</option>
                                        <option value="5" {{$dt->semester=='5'?'selected':''}}>5</option>
                                        <option value="6" {{$dt->semester=='6'?'selected':''}}>6</option>
                                        <option value="7" {{$dt->semester=='7'?'selected':''}}>7</option>
                                        <option value="8" {{$dt->semester=='8'?'selected':''}}>8</option>
                                        </select>
                                      </div>
                                  </div>
                                   <div class="control-group">
                                  <label class="control-label" for="basicinput">Dosen Pengampu</label>
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
                                      <a href="{{url('matakuliah')}}" class="btn btn">Kembali</a>
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
