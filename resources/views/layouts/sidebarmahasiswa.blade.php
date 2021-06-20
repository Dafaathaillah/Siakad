
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-tasks"></i>Biodata</a>
                                </li>
                                <li><a href="message.html"><i class="menu-icon icon-tasks"></i>Pembayaran UKT</a></li>
                                <li><a href="task.html"><i class="menu-icon icon-tasks"></i>
                                    Riwayat Pembayaran UKT
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                               <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Pemilihan Mata Kuliah
                                </a></li>
                              <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Kartu Rencana Studi (KRS)
                                </a></li>
                               <form id="logout-form" action="{{ url('logout') }}"
                                    method="POST" style="display: none;">@csrf </form>
                                        <li><a href="#" tyle="cursor: pointer;" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                            <!--/.widget-nav-->
                        </div>
                        <!--/.sidebar-->