
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-tasks"></i>Master Prodi</a>
                                </li>
                                <li><a href="message.html"><i class="menu-icon icon-tasks"></i>Master Jurusan</a></li>
                                <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Master Kelas
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                               <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Master Dosen
                                </a></li>
                              <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Master Mata Kuliah
                                </a></li>
                              <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Master Mahasiswa
                                </a></li>
                                <li><a href="task.html"><i class="menu-icon icon-tasks"></i>UKT Mahasiswa
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-money">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Data Pembayaran</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-tasks"></i>Lunas</a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-tasks"></i>Belum Lunas </a></li>
                                        <li><a href="other-user-listing.html"><i class="icon-tasks"></i>Semua Pembayaran</a></li>
                                    </ul>
                                </li>
                                 <form id="logout-form" action="{{ url('logout') }}"
                                    method="POST" style="display: none;">@csrf </form>
                                <li><a href="#" tyle="cursor: pointer;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->