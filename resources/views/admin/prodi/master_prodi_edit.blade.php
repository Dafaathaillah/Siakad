@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                              <div class="module-body">
                                 <form class="form-horizontal row-fluid" action="{{url('/prodi/update/'.$dt->id)}}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="control-group">
                                        <label class="control-label" for="basicinput">Nama Prodi</label>
                                          <div class="controls">
                                            <input type="text" name="nama_prodi" id="basicinput" placeholder="Nama Prodi" value="{{$dt->nama_prodi}}" class="span8">
                                                         <!--  <span class="help-inline">Minimum 5 Characters</span> -->
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="basicinput">Program</label>
                                            <div class="controls">
                                              <select tabindex="1" name="program" data-placeholder="Select here.." class="span8">
                                                  <option value="D1" 
                                                  {{$dt->program=='D1'?'selected':''}}
                                                  >D1</option>
                                                  <option value="D2"
                                                  {{$dt->program=='D2'?'selected':''}}
                                                  >D2</option>
                                                  <option value="D3"
                                                  {{$dt->program=='D3'?'selected':''}}
                                                  >D3</option>
                                                  <option value="S1/D4"
                                                  {{$dt->program=='S1/D4'?'selected':''}}
                                                  >S1/D4</option>
                                                  <option value="S2"
                                                  {{$dt->program=='S2'?'selected':''}}
                                                  >S2</option>
                                                  <option value="S3"
                                                  {{$dt->program=='S3'?'selected':''}}
                                                  >S3</option>
                                                </select>
                                              </div>
                                          </div>
                                    </div>

                                   <div class="control-group">
                                    <div class="controls">
                                      <a href="{{url('prodi')}}" class="btn btn">Kembali</a>
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
