
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{url('home')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="{{url('prodi')}}"><i class="menu-icon icon-tasks"></i>Master Prodi</a>
                                </li>
                                <li><a href="{{url('jurusan')}}"><i class="menu-icon icon-tasks"></i>Master Jurusan</a></li>
                                 <li><a href="{{url('dosen')}}"><i class="menu-icon icon-tasks"></i>Master Dosen
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                  <li><a href="{{url('kelas')}}"><i class="menu-icon icon-tasks"></i>Master Kelas
                                </a></li>
                            
                              <li><a href="{{url('matakuliah')}}"><i class="menu-icon icon-tasks"></i>Master Mata Kuliah
                                </a></li>
                              <li><a href="{{url('mahasiswa')}}"><i class="menu-icon icon-tasks"></i>Master Mahasiswa
                                </a></li>
                                <li><a href="{{url('/pembayaran/admin')}}"><i class="menu-icon icon-tasks"></i>UKT Mahasiswa
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                 <form id="logout-form" action="{{ url('logout') }}"
                                    method="POST" style="display: none;">@csrf </form>
                                <li><a href="#" tyle="cursor: pointer;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->