    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php if(checkModule('MD')) { ?>
        <li class="header">MASTER DATA</li>
        <?php } ?>

        <?php if(grantedModule('MD-01')) { ?>
        <li>
          <a href="<?php echo site_url('pengguna'); ?>">
            <i class="fa fa-user"></i> <span>Pengguna</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('MD-02')) { ?>
        <li>
          <a href="<?php echo site_url('artikel'); ?>">
            <i class="fa fa-align-center"></i> <span>Artikel</span>
          </a>
        </li>
        <?php } ?>

        <?php if(checkModule('SU')) { ?>
				<li class="header">SIMTRANS UDARA</li>
        <?php } ?>
        
				<?php if(grantedModule('SU-01')) { ?>
        <li>
          <a href="<?php echo site_url('bandara'); ?>">
            <i class="fa fa-list"></i> <span>Bandara</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SU-02')) { ?>
        <li>
          <a href="<?php echo site_url('profil_bandara'); ?>">
            <i class="fa fa-id-card"></i> <span>Profil Bandara</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SU-03') || grantedModule('SU-04')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-adjust"></i> <span>Fasilitas Bandara</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SU-03')) { ?>
            <li><a href="<?php echo site_url('fasilitas_bandara'); ?>"><i class="fa fa-list"></i> Semua Fasilitas</a></li>
            <?php } ?>

            <?php if(grantedModule('SU-04')) { ?>
            <li><a href="<?php echo site_url('kategori_fasilitas_bandara'); ?>"><i class="fa fa-tags"></i> Kategori</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
            
        <?php if(grantedModule('SU-05')) { ?>
        <li>
          <a href="<?php echo site_url('maskapai'); ?>">
            <i class="fa fa-plane"></i> <span>Maskapai</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SU-06')) { ?>
        <li>
          <a href="<?php echo site_url('jadwal_penerbangan'); ?>">
            <i class="fa fa-calendar-o"></i> <span>Jadwal Penerbangan & Rute</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SU-07')) { ?>
        <li>
          <a href="<?php echo site_url('lalin_udara'); ?>">
            <i class="fa fa-exchange"></i> <span>Lalu Lintas Udara</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(checkModule('SL')) { ?>
        <li class="header">SIMTRANS LAUT</li>
        <?php } ?>
        
        <?php if(grantedModule('SL-01')) { ?>
        <li>
          <a href="<?php echo site_url('pelabuhan'); ?>">
            <i class="fa fa-list"></i> <span>Pelabuhan</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-02')) { ?>
        <li>
          <a href="<?php echo site_url('profil_pelabuhan'); ?>">
            <i class="fa fa-id-card"></i> <span>Profil Pelabuhan</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-03')) { ?>
        <li>
          <a href="<?php echo site_url('fasilitas_dermaga'); ?>">
            <i class="fa fa-adjust"></i> <span>Fasilitas Dermaga</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-04') || grantedModule('SL-05')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Fasilitas Alat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SL-04')) { ?>
            <li><a href="<?php echo site_url('fasilitas_alat'); ?>"><i class="fa fa-list"></i> Semua Fasilitas</a></li>
            <?php } ?>

            <?php if(grantedModule('SL-05')) { ?>
            <li><a href="<?php echo site_url('kategori_alat'); ?>"><i class="fa fa-tags"></i> Kategori</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-06')) { ?>
        <li>
          <a href="<?php echo site_url('aset_pelabuhan'); ?>">
            <i class="fa fa-map"></i> <span>Aset Pelabuhan</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-07')) { ?>
        <li>
          <a href="<?php echo site_url('daftar_perusahaan'); ?>">
            <i class="fa fa-building"></i> <span>Daftar Perusahaan</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-08')) { ?>
        <li>
          <a href="<?php echo site_url('status_operasi'); ?>">
            <i class="fa fa-check-circle"></i> <span>Status Operasi</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SL-09')) { ?>
        <li>
          <a href="<?php echo site_url('jenis_barang_muatan'); ?>">
            <i class="fa fa-tags"></i> <span>Jenis Barang Muatan</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-10') || grantedModule('SL-11')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Pengguna Jasa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SL-10')) { ?>
            <li><a href="<?php echo site_url('pengguna_jasa'); ?>"><i class="fa fa-list"></i> Semua Pengguna Jasa</a></li>
            <?php } ?>

            <?php if(grantedModule('SL-11')) { ?>
            <li><a href="<?php echo site_url('jenis_pengguna'); ?>"><i class="fa fa-tags"></i> Jenis Pengguna</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SL-12')) { ?>
        <li>
          <a href="<?php echo site_url('tarif_kapal'); ?>">
            <i class="fa fa-money"></i> <span>Tarif Kapal</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-13')) { ?>
        <li>
          <a href="<?php echo site_url('kunjungan_kapal'); ?>">
            <i class="fa fa-ship"></i> <span>Kunjungan Kapal</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SL-14')) { ?>
        <li>
          <a href="<?php echo site_url('arus_petikemas'); ?>">
            <i class="fa fa-exchange"></i> <span>Arus Peti Kemas</span>
          </a>
        </li>
        <?php } ?>

        <?php if(checkModule('SD')) { ?>
        <li class="header">SIMTRANS DARAT</li>
        <?php } ?>
        
        <?php if(grantedModule('SD-01') || grantedModule('SD-02')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cab"></i> <span>Angkutan Kota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-01')) { ?>
            <li><a href="<?php echo site_url('angkot'); ?>"><i class="fa fa-list"></i> Semua Angkutan Kota</a></li>
            <?php } ?>

            <?php if(grantedModule('SD-02')) { ?>
            <li><a href="<?php echo site_url('kategori_angkot'); ?>"><i class="fa fa-tags"></i> Kategori</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-03') || grantedModule('SD-04')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cab"></i> <span>Angkutan Desa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-03')) { ?>
            <li><a href="<?php echo site_url('angdes'); ?>"><i class="fa fa-list"></i> Semua Angkutan Desa</a></li>
            <?php } ?>

            <?php if(grantedModule('SD-04')) { ?>
            <li><a href="<?php echo site_url('kategori_angdes'); ?>"><i class="fa fa-tags"></i> Kategori</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SD-05') || grantedModule('SD-06')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cab"></i> <span>Angkutan Perintis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-05')) { ?>
            <li><a href="<?php echo site_url('angper'); ?>"><i class="fa fa-list"></i> Semua Angkutan Perintis</a></li>
            <?php } ?>
            
            <?php if(grantedModule('SD-06')) { ?>
            <li><a href="<?php echo site_url('kategori_angper'); ?>"><i class="fa fa-tags"></i> Kategori</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-07')) { ?>
        <li>
          <a href="<?php echo site_url('bus_akap'); ?>">
            <i class="fa fa-bus"></i> <span>Bus AKAP</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SD-08')) { ?>
        <li>
          <a href="<?php echo site_url('bus_akdp'); ?>">
            <i class="fa fa-bus"></i> <span>Bus AKDP</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-09') || grantedModule('SD-10')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i> <span>Bus Damri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-09')) { ?>
            <li><a href="<?php echo site_url('bus_damri'); ?>"><i class="fa fa-list"></i> Semua Bus Damri</a></li>
            <?php } ?>
            
            <?php if(grantedModule('SD-10')) { ?>
            <li><a href="<?php echo site_url('rute_damri'); ?>"><i class="fa fa-tags"></i> Rute</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-11') || grantedModule('SD-12')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i> <span>Bus Rapid Transit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-11')) { ?>
            <li><a href="<?php echo site_url('brt'); ?>"><i class="fa fa-list"></i> Semua BRT</a></li>
            <?php } ?>

            <?php if(grantedModule('SD-12')) { ?>
            <li><a href="<?php echo site_url('shelter_brt'); ?>"><i class="fa fa-tags"></i> Shelter</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-22')) { ?>
        <li>
          <a href="<?php echo site_url('transportasi_pariwisata'); ?>">
            <i class="fa fa-bus"></i> <span>Transportasi Pariwisata</span>
          </a>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-23')) { ?>
        <li>
          <a href="<?php echo site_url('angkutan_penyebrangan'); ?>">
            <i class="fa fa-ship"></i> <span>Angkutan Penyebrangan</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SD-13') || grantedModule('SD-14') || grantedModule('SD-15')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bolt"></i> <span>LLAJ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-13')) { ?>
            <li><a href="<?php echo site_url('traffic_light'); ?>"><i class="fa fa-circle-o"></i> Traffic Light</a></li>
            <?php } ?>

            <?php if(grantedModule('SD-14')) { ?>
            <li><a href="<?php echo site_url('warning_light'); ?>"><i class="fa fa-circle-o"></i> Warning Light</a></li>
            <?php } ?>
            
            <?php if(grantedModule('SD-15')) { ?>
            <li><a href="<?php echo site_url('rambu_lalin'); ?>"><i class="fa fa-circle-o"></i> Rambu Lalu Lintas</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
        
        <?php if(grantedModule('SD-16') || grantedModule('SD-17') || grantedModule('SD-21')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-braille"></i> <span>Terminal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-16')) { ?>
            <li><a href="<?php echo site_url('terminal'); ?>"><i class="fa fa-list"></i> Semua Terminal</a></li>
            <?php } ?>
            
            <?php if(grantedModule('SD-21')) { ?>
            <li><a href="<?php echo site_url('data_terminal'); ?>"><i class="fa fa-book"></i> Data Terminal</a></li>
            <?php } ?>

            <?php if(grantedModule('SD-17')) { ?>
            <li><a href="<?php echo site_url('tipe_terminal'); ?>"><i class="fa fa-tags"></i> Tipe</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(grantedModule('SD-18') || grantedModule('SD-19') || grantedModule('SD-20')) { ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Informasi Transportasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if(grantedModule('SD-18')) { ?>
            <li><a href="<?php echo site_url('transportasi_pelabuhan'); ?>"><i class="fa fa-ship"></i> Pelabuhan</a></li>
            <?php } ?>

            <?php if(grantedModule('SD-19')) { ?>
            <li><a href="<?php echo site_url('transportasi_bandara'); ?>"><i class="fa fa-plane"></i> Bandara</a></li>
            <?php } ?>
            
            <?php if(grantedModule('SD-20')) { ?>
            <li><a href="<?php echo site_url('jenis_transportasi'); ?>"><i class="fa fa-tags"></i> Jenis Transportasi</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->