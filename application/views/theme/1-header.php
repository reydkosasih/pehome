<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="Document Control App" />
    <meta name="keywords" content="Docu FSI, Document Control, FSI, Fine Sinter Indonesia, PT Fine Sinter Indonesia, PT FSI" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Document Control App by TXEN for PT FSI" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>logo/icon-light.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?= base_url('demo1/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('demo1/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "<?= base_url('demo1/') ?>assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?= base_url('demo1/') ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url('demo1/') ?>assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->

    <!-- Datatables -->
    <link href="<?= base_url('assets/custom/') ?>vendor/DataTables/datatables.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/custom/') ?>vendor/DataTables/datatables.min.js"></script>
    <!-- Datatables -->

    <!-- Summernote -->
    <link href="<?= base_url('assets/custom/') ?>vendor/summernote/summernote-bs5.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/custom/') ?>vendor/summernote/summernote-bs5.min.js"></script>
    <!-- Summernote -->

    <!-- DropzoneJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <!-- DropzoneJS -->

    <!-- LemonadeJS (Sign) -->
    <script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
    <!-- LemonadeJS (Sign) -->

    <!-- Dropify -->
    <link href="<?= base_url('assets/custom/') ?>vendor/dropify/dropify.css" rel="stylesheet">
    <script src="<?= base_url('assets/custom/') ?>vendor/dropify/dropify.js"></script>
    <!-- Dropify -->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
    <script>
        function confirmDelete(event, element) {
            event.preventDefault();

            Swal.fire({
                title: 'Yakin Hapus Data?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Data berhasil dihapus.',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(() => {
                        window.location.href = element.href;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cancelled',
                        text: 'Aksi telah dibatalkan.',
                    });
                }
            });
        }

        function logout() {
            var logoutUrl = '<?= site_url('auth/logout') ?>';

            Swal.fire({
                title: 'Yakin keluar aplikasi?',
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Sign Out',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = logoutUrl;
                }
            });
        }

        function detail_customerRedirect() {
            var redirectURL = '<?= site_url('file_manager/folder_customer') ?>';

            let timerInterval;
            Swal.fire({
                title: "Redirecting to Folder Customer!",
                html: "Anda akan beralih dalam <b></b>.",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = redirectURL;
                } else {
                    Swal.fire("Cancelled", "", "info");
                }
            });
        }

        function comingsoon() {
            Swal.fire({
                title: "Coming Soon!",
                text: "Fitur/Menu ini masih dalam pengembangan",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Okay",
                customClass: {
                    confirmButton: "btn btn-info"
                }
            });
        }

        function blocked() {
            Swal.fire({
                title: "Access Denied!",
                text: "Anda tidak memiliki hak akses untuk halaman ini!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }

        function showPW() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2 fs-md-1"></i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="index.html" class="d-lg-none">
                            <img alt="Logo" src="<?= base_url('assets/') ?>logo/icon-light.png" class="h-30px theme-light-show" />
                            <img alt="Logo" src="<?= base_url('assets/') ?>logo/icon-dark.png" class="h-30px theme-dark-show" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <?php if (isset($_SESSION['success'])) : ?>
                        <script>
                            Swal.fire({
                                title: "Sukses",
                                text: "<?= $_SESSION['success'] ?>",
                                icon: "success"
                            });
                        </script>
                        <?php unset($_SESSION['success']);
                        ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <script>
                            Swal.fire({
                                title: "Gagal",
                                text: "<?= $_SESSION['error'] ?>",
                                icon: "error"
                            });
                        </script>
                        <?php unset($_SESSION['error']);
                        ?>
                    <?php endif; ?>