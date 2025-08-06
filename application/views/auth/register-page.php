<!--begin::Body-->
<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
    <!--begin::Card-->
    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
        <!--begin::Wrapper-->
        <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100" method="POST" action="<?= base_url('auth/register'); ?>" autocomplete="off">
                <!--begin::Heading-->
                <div class="text-center mb-8">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                    <!--end::Title-->
                    <!--begin::Subtitle-->
                    <div class="text-gray-500 fw-semibold fs-6">Enter Your Information</div>
                    <!--end::Subtitle=-->
                </div>
                <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('nama_depan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('nama_belakang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('password1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <!--begin::Heading-->
                <!--begin::Input group=-->
                <div class="fv-row input-group mb-8">
                    <span class="input-group-text"><i class="ki-outline ki-security-user fs-1"></i></span>
                    <input type="text" placeholder="Username" name="username" value="<?= set_value('username') ?>" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <div class="fv-row input-group mb-8">
                    <span class="input-group-text"><i class="ki-outline ki-user-square fs-1"></i></span>
                    <input type="text" placeholder="Nama Depan" name="nama_depan" <?= set_value('nama_depan') ?> autocomplete="off" class="form-control bg-transparent" />
                    <input type="text" placeholder="Nama Belakang" name="nama_belakang" <?= set_value('nama_belakang') ?> autocomplete="off" class="form-control bg-transparent" />
                </div>
                <div class="fv-row input-group mb-8">
                    <span class="input-group-text"><i class="ki-outline ki-sms fs-1"></i></span>
                    <input type="email" placeholder="Email" name="email" value="<?= set_value('email') ?>" autocomplete="off" class="form-control bg-transparent" />
                </div>
                <div class="fv-row input-group mb-8">
                    <select class="form-select" name="id_dept" id="id_dept" data-control="select2" data-placeholder="Pilih Departemen" data-allow-clear="true" required>
                        <option></option>
                        <?php foreach ($listdept as $dept) { ?>
                            <option value=""></option>
                            <option value="<?= $dept->id_dept ?>"><?= '(' . $dept->inisial . ') ' . $dept->nama_dept ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="nama_dept" id="nama_dept" value="">
                </div>
                <!--begin::Input group-->
                <div class="fv-row mb-8" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control bg-transparent" type="password" placeholder="Password" name="password1" id="password1" value="<?= set_value('password') ?>" autocomplete="off" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="ki-outline ki-eye-slash fs-2"></i>
                                <i class="ki-outline ki-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                            </div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                            </div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                            </div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">Use 6 or more characters with a mix of letters, numbers & symbols.</div>
                    <!--end::Hint-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row input-group mb-8">
                    <!--begin::Repeat Password-->
                    <span class="input-group-text"><i class="ki-duotone ki-shield fs-1"><span class="path1"></span><span class="path2"></span></i></span>
                    <input placeholder="Repeat Password" name="password2" id="password2" type="password" autocomplete="off" class="form-control bg-transparent" />
                    <!--end::Repeat Password-->
                </div>
                <!--end::Input group=-->
                <!--begin::Accept-->
                <div class="fv-row mb-8">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" onclick="showPW()" />
                        <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Show Password</span>
                    </label>
                </div>
                <!--end::Accept-->
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Sign up</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Submit button-->
                <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                    <a href="<?= site_url('auth') ?>" class="link-primary fw-semibold">Sign in</a>
                </div>
                <!--end::Sign up-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Footer-->
        <div class="d-flex flex-stack px-lg-10">
            <!--begin::Themes-->
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
            <!--end::Themes-->
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
    function showPW() {
        var x = document.getElementById("password1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("password2");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id_dept').on('input', function() {

            var id_dept = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('auth/get_dept') ?>",
                dataType: "JSON",
                data: {
                    id_dept: id_dept
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(id_dept, nama_dept) {
                        $('[name="nama_dept"]').val(data.nama_dept);
                    });

                }
            });
            return false;
        });

    });
</script>