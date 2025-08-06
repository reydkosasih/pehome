<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        <?= $subtitle ?></h1>
                    <!--end::Title-->
                    <span class="fw-semibold fs-7 my-0 pt-1 text-muted">
                        <?php
                        $dat = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                        $date = $dat->format('H');
                        if ($date < 12)
                            echo "Good Morning, ";
                        else if ($date < 17)
                            echo "Good Afternoon, ";
                        else if ($date < 20)
                            echo "Good Evening, ";
                        else
                            echo "Good Night, ";
                        ?>
                    </span>
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">