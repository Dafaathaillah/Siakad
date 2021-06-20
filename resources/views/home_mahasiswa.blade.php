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
                                            <a href="#" class="btn-box big span4"><i class=" icon-book"></i><b>100</b>
                                        <p class="text-muted">
                                            Mata Kuliah Yang Diambil</p>
                                    </a>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b style="opacity: 0">15,152</b>
                                        <p class="text-muted">
                                            DPA : Nasrul Admin</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div >
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b>Messages</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-group"></i><b>Clients</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-exchange"></i><b>Expenses</b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/#btn-controls-->

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
@endsection
