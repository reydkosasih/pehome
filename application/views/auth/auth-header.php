<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="Document Control App" />
    <meta name="keywords" content="Docu FSI, Document Control, FSI, Fine Sinter Indonesia, PT Fine Sinter Indonesia, PT FSI" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:site_name" content="Document Control App by TXEN for PT FSI" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>logo/icon-dark.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?= base_url('demo1/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('demo1/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('assets/custom/') ?>js/jquery-3.7.1.min.js"></script>
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
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
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('<?= base_url('demo1/') ?>assets/media/auth/bg2.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?= base_url('demo1/') ?>assets/media/auth/bg1-dark.jpg');
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <!--begin::Logo-->
                    <a class="mb-7">
                        <img alt="Logo" src="<?= base_url('assets/') ?>logo/docu-dark.png" width="230px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h2 class="text-white fw-normal m-0 mb-3">Copyright © PT Fine Sinter Indonesia</h2>
                    <!--end::Title-->
                    <!-- <a class="mb-7">
                        <img alt="Logo" src="<?= base_url('') ?>assets/img/scanqr-wi.png" width="452px" />
                    </a> -->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->