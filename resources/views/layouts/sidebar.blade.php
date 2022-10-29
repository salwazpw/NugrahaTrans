<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dashboard" aria-expanded="false"><i
                            data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('katalog.index')}}" aria-expanded="false"><i
                            class="fas fa-car"></i><span class="hide-menu">Katalog Kendaraan </span></a>
                </li>
                {{-- @if (auth()->user()->level == 'admin') --}}
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('pegawai.index')}}" aria-expanded="false"><i
                            class=" fab fa-black-tie"></i><span class="hide-menu">Data Pegawai</span></a>
                </li>
                {{-- @endif --}}
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('customer.index')}}" aria-expanded="false"><i
                            class=" fas fa-users"></i><span class="hide-menu">Data Customer</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/sewa" aria-expanded="false"><i
                            class="far fa-money-bill-alt"></i><span class="hide-menu">Sewa & Transaksi</span></a>
                </li>
                {{-- @if (auth()->user()->level == 'admin') --}}
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu">Data Keuangan</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="/pemasukan" class="sidebar-link"><span class="hide-menu"> Data
                                    Pemasukan
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{route('pengeluaran.index')}}" class="sidebar-link"><span class="hide-menu">
                                    Data Pengeluaran
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/lokasi" aria-expanded="false"><i
                            class="fas fa-map-marker-alt"></i><span class="hide-menu">Lokasi</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/sosialmedia" aria-expanded="false"><i
                            class="fas fa-comments"></i><span class="hide-menu">Sosial Media</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/testimoni"
                        aria-expanded="false"><i class=" fas fa-th-list"></i><span
                            class="hide-menu">Testimoni</span></a>
                </li>
                {{-- @endif --}}
                <li class="nav-small-cap"><span class="hide-menu">Account</span></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link " href="/acc" aria-expanded="false"><i
                            data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
