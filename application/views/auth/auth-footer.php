 <!--end::Body-->
 </div>
 <!--end::Authentication - Sign-in-->
 </div>
 <!--end::Root-->
 <!--begin::Javascript-->
 <script>
     var hostUrl = "<?= base_url('demo1/') ?>assets/";
 </script>
 <!--begin::Global Javascript Bundle(mandatory for all pages)-->
 <script src="<?= base_url('demo1/') ?>assets/plugins/global/plugins.bundle.js"></script>
 <script src="<?= base_url('demo1/') ?>assets/js/scripts.bundle.js"></script>
 <!--end::Global Javascript Bundle-->
 <!--end::Javascript-->
 <!-- Modal Contact -->
 <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="contactModalLabel">Contact Book</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <img src="<?= base_url('assets/img/admin/') ?>contact_us.png" width="100%" alt="">
             </div>
         </div>
     </div>
 </div>
 </body>
 <!--end::Body-->

 </html>