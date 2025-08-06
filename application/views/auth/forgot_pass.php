<!--begin::Body-->
<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
    <!--begin::Card-->
    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
        <!--begin::Wrapper-->
        <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100" action="<?= site_url('auth/proses_forgotPass') ?>" method="POST">
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 fw-bolder mb-3">Forgot Password?</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-6">Enter your username to reset your password.</div>
                    <!--end::Link-->
                </div>
                <?php if ($this->session->flashdata('error_change')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error_change'); ?>
                    </div>
                <?php endif; ?>
                <!--begin::Heading-->
                <!--begin::Input group=-->
                <div class="fv-row mb-6">
                    <label for="id" class="form-label">Cari Username</label>
                    <select class="form-select" id="select2" name="id" data-control="select2" data-placeholder="Cari Username Anda" data-allow-clear="true" required>
                        <option value=""></option>
                        <?php foreach ($userlist as $ul) { ?>
                            <option value="<?= $ul->id ?>"><?= 'User: ' . $ul->username  . ' → (' . $ul->nama_lengkap . ')' ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="fv-row mb-6">
                    <label for="passworda" class="form-label">Ubah Password</label>
                    <input type="password" class="form-control" name="password" id="passworda" placeholder="Masukkan Password Baru" required>
                </div>
                <div class="fv-row mb-6">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" onclick="showPWA()" />
                        <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Show Password</span>
                    </label>
                </div>
                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" class="btn btn-primary hover-scale me-4">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Submit</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                    <a href="<?= site_url('auth') ?>" class="btn btn-danger hover-scale">Cancel</a>
                </div>
                <!--end::Actions-->
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
<script>
    function showPWA() {
        var x = document.getElementById("passworda");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>