<!--begin::Body-->
<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
  <!--begin::Card-->
  <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
      <!--begin::Form-->
      <form class="form w-100" method="POST" action="<?= base_url('auth') ?>" autocomplete="off">
        <!--begin::Heading-->
        <div class="text-center mb-11">
          <!--begin::Title-->
          <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
          <!--end::Title-->
          <!--begin::Subtitle-->
          <div class="text-gray-500 fw-semibold fs-6">Enter Your Information</div>
          <!--end::Subtitle=-->
        </div>
        <?= $this->session->flashdata('message'); ?>
        <?php if ($this->session->flashdata('success_komentar')) : ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('success_komentar'); ?>
          </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_komentar')) : ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error_komentar'); ?>
          </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success_change')) : ?>
          <div class="alert alert-success">
            <?php echo $this->session->flashdata('success_change'); ?>
          </div>
        <?php endif; ?>
        <?php if ($appSet->toggle == 1 || ($totalPenggunaan > $targetPendapatanBulanan)) : ?>
          <div class="alert alert-danger">
            <strong>Budget Penggunaan Mold Sudah Over. <br> Mohon Konfirmasi ke Admin Untuk Pengambilan Mold Baru!</strong>
          </div>
        <?php endif; ?>
        <div class="mb-5">
          <button type="button" class="btn btn-primary btn-sm rotate" data-kt-menu-trigger="click" data-kt-menu-placement="top-start">
            <i class="ki-outline ki-up rotate-180 fs-4 me-1"></i>Informasi
            <i class="ki-outline ki-information-2 fs-4 ms-3 me-0"></i>
          </button>
          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px" data-kt-menu="true">
            <div class="menu-item px-3">
              <a data-bs-toggle="modal" data-bs-target="#tutorModal" class="menu-link px-3">
                <i class="ki-outline ki-information-2 fs-3 me-2"></i>Info
              </a>
            </div>
            <div class="menu-item px-3">
              <a data-bs-toggle="modal" data-bs-target="#contactModal" class="menu-link px-3">
                <i class="ki-outline ki-address-book fs-3 me-2"></i>Kontak
              </a>
            </div>
            <div class="menu-item px-3">
              <a data-bs-toggle="modal" data-bs-target="#commentsModal" class="menu-link px-3">
                <i class="ki-outline ki-sms fs-3 me-2"></i>Kirim Pesan
              </a>
            </div>
          </div>
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <label for="username" class="form-label">Username</label>
        <div class="fv-row input-group mb-8">
          <span class="input-group-text"><i class="ki-outline ki-security-user fs-1"></i></span>
          <input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent" autofocus />
        </div>
        <!--end::Input group=-->
        <label for="password" class="form-label">Password</label>
        <div class="fv-row input-group mb-3">
          <span class="input-group-text"><i class="ki-outline ki-key fs-1"></i></span>
          <input type="password" placeholder="Password" name="password" id="password1" autocomplete="off" class="form-control bg-transparent" />
        </div>
        <div class="fv-row">
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" onclick="showPW()" />
            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Show Password</span>
          </label>
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
          <div></div>
          <!--begin::Link-->
          <a href="<?= site_url('auth/forgotPass') ?>" class="link-primary">Forgot Password?</a>
          <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
          <button type="submit" class="btn btn-primary">
            <!--begin::Indicator label-->
            <span class="indicator-label">Sign In</span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
          </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
          <a href="<?= site_url('auth/register') ?>" class="link-primary">Sign up</a>
        </div>
        <!--end::Sign up-->
      </form>
      <!--end::Form-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Footer-->
    <div class="d-flex flex-stack px-lg-10">
      <!--begin::Languages-->
      <div class="me-0">
        <div class="menu-item" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start">
          <a class="menu-link px-5">
            <span class="menu-title position-relative">Theme Mode</span>
          </a>
          <!--begin::Menu-->
          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
            <div class="menu-item px-3 my-0">
              <a class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                <span class="menu-icon" data-kt-element="icon">
                  <i class="ki-outline ki-night-day fs-2"></i>
                </span>
                <span class="menu-title">Light</span>
              </a>
            </div>
            <div class="menu-item px-3 my-0">
              <a class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                <span class="menu-icon" data-kt-element="icon">
                  <i class="ki-outline ki-moon fs-2"></i>
                </span>
                <span class="menu-title">Dark</span>
              </a>
            </div>
            <div class="menu-item px-3 my-0">
              <a class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                <span class="menu-icon" data-kt-element="icon">
                  <i class="ki-outline ki-screen fs-2"></i>
                </span>
                <span class="menu-title">System</span>
              </a>
            </div>
          </div>
          <!--end::Menu-->
        </div>
      </div>
      <!--end::Languages-->
      <!--begin::Links-->
      <div class="d-flex fw-semibold text-primary fs-base gap-5">
        <!-- <a href="pages/team.html" target="_blank">Terms</a>
        <a href="pages/pricing/column.html" target="_blank">Plans</a> -->
        <a data-bs-toggle="modal" data-bs-target="#contactModal">Contact Us</a>
      </div>
      <!--end::Links-->
    </div>
    <!--end::Footer-->
  </div>
  <!--end::Card-->
</div>
<!-- Modal Tutorial -->
<div class="modal fade" id="tutorModal" tabindex="-1" aria-labelledby="tutorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tutorModalLabel">Panduan Penggunaan Aplikasi (Untuk User)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselTutorial" class="carousel slide" data-interval="false">
          <div class="carousel-inner active">
            <!-- <div class="carousel-item active">
                <img src="<?= base_url('assets/img/slideshow/') ?>comsheet.png" class="d-block w-100" alt="img1">
              </div> -->
            <!-- <div class="carousel-item active">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://player.vimeo.com/video/900989618?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" title="Panduan Aplikasi Mold Control - PT. Fine Sinter Indonesia"></iframe>
              </div>
            </div> -->
            <div class="carousel-item active">
              <img src="<?= base_url('assets/img/slideshow/') ?>15.png" class="d-block w-100" alt="img15">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>16.png" class="d-block w-100" alt="img16">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>17.png" class="d-block w-100" alt="img17">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>1.png" class="d-block w-100" alt="img1">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>2.png" class="d-block w-100" alt="img2">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>3.png" class="d-block w-100" alt="img3">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>4.png" class="d-block w-100" alt="img4">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>5.png" class="d-block w-100" alt="img5">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>6.png" class="d-block w-100" alt="img6">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>7.png" class="d-block w-100" alt="img7">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>8.png" class="d-block w-100" alt="img8">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>9.png" class="d-block w-100" alt="img9">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>10.png" class="d-block w-100" alt="img10">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>11.png" class="d-block w-100" alt="img11">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>12.png" class="d-block w-100" alt="img12">
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/img/slideshow/') ?>13.png" class="d-block w-100" alt="img13">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-target="#carouselTutorial" data-bs-slide="prev">Sebelumnya</button>
        <button type="button" class="btn btn-primary" data-bs-target="#carouselTutorial" data-bs-slide="next">Selanjutnya</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Comments box -->
<div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentsModalLabel">Kotak Komentar Aplikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-lg">
          <form action="<?= base_url('auth/komentarApp') ?>" method="post">
            <div class="mb-4">
              <label class="form-label" for="tgl_komen">Tanggal Pengisian</label>
              <input type="date" class="form-control" name="tgl_komen" value="<?= date('Y-m-d') ?>">
            </div>
            <div class="mb-4">
              <label class="form-label" for="nama_pic">Nama PIC</label>
              <input type="text" class="form-control" name="nama_pic" value="" placeholder="Masukkan Nama Anda">
            </div>
            <div class="mb-4">
              <label class="form-label" for="catatanapp">Catatan Aplikasi:</label>
              <textarea class="form-control" name="catatanapp" id="catatanapp" cols="30" rows="10" maxlength="500"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  function showPW() {
    var x = document.getElementById("password1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>