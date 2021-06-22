@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/jurusan/update/'.$dt->id)}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Nama Jurusan</label>
                                          <div class="controls">
                                            <input type="text" name="nama_jurusan" id="basicinput" placeholder="Nama Jurusan" class="span8" value="{{$dt->nama_jurusan}}">
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
                                                 <option value="{{$pd->id}}"
                                                  {{$dt->id_prodi==$pd->id?'selected':''}}
                                                  >{{$pd->nama_prodi}}</option>
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
                                          <option value="1" {{$dt->tingkat=='1'?'selected':''}}>1</option>
                                          <option value="2" {{$dt->tingkat=='2'?'selected':''}}>2</option>
                                          <option value="3" {{$dt->tingkat=='3'?'selected':''}}>3</option>
                                          <option value="4" {{$dt->tingkat=='4'?'selected':''}}>4</option>
                                          </select>
                                        </div>
                                    </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('jurusan')}}" class="btn btn">Kembali</a>
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
