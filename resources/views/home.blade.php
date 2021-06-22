@extends('layouts.header')

@section('content')
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-group"></i><b>{{$jurusan}}</b>
                                        <p class="text-muted">
                                            Jurusan</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-group"></i><b>{{$mhs}}</b>
                                        <p class="text-muted">
                                            Mahasiswa</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-group"></i><b>{{$dosen}}</b>
                                        <p class="text-muted">
                                            Dosen</p>
                                    </a>
                                </div>
                            </div>
                            <!--/#btn-controls-->

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
@endsection
