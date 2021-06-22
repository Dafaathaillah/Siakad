@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class="icon-user"></i><b style="opacity: 0">0</b>
                                        <p class="text-muted">
                                            {{Auth::user()->name}}</p>
                                            <a href="#" class="btn-box big span4"><i class=" icon-book"></i><b>{{$mks}}</b>
                                        <p class="text-muted">
                                            Mata Kuliah Yang Diambil</p>
                                    </a>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b style="opacity: 0">15,152</b>
                                        <p class="text-muted">
                                            DPA : {{$dosen->nama_dosen}}</p>
                                    </a>
                                </div>
                                
                            </div>
                            <!--/#btn-controls-->

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
@endsection
