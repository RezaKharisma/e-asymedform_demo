   </div>

   <!-- Modal -->
   <div class="modal fade" id="modalDevice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-circle"></i> Perhatian</h5>
               </div>
               <div class="modal-body">
                   Program Easy MedForm tidak mendukung perangkat mobile.
               </div>
           </div>
       </div>
   </div>

   <!-- /.content-wrapper -->
   <footer class="main-footer">
       <strong>E-asy MedForm <span style="color: red;">Demo</span></strong>
       <div class="float-right d-none d-sm-inline-block">

       </div>
   </footer>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
       <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- Jquery -->
   <script src="<?= base_url('/application/views/assets/'); ?>js/jquery.js"></script>
   <!-- jQuery -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/jquery/jquery.min.js"></script>
   <!-- Print JS -->
   <script src="<?= base_url('/application/views/assets/'); ?>js/print-js.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/jquery-ui/jquery-ui.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/chart.js/Chart.min.js"></script>
   <!-- Sparkline -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/sparklines/sparkline.js"></script>
   <!-- daterangepicker -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/moment/moment.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables/dataTables.dateTime.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables/jquery.dataTablesDateFormat.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables/jquery.dataTablesDate.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/jszip/jszip.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
   <!-- InputMask -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/inputmask/jquery.inputmask.min.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <!-- <script src="<?= base_url('/application/views/assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
   <!-- Summernote -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- ChartJS -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/chart.js/Chart.min.js"></script>
   <!-- Toastr -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/toastr/toastr.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url('/application/views/assets/'); ?>js/adminlte.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="<?= base_url('/application/views/assets/'); ?>js/demo.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="<?= base_url('/application/views/assets/'); ?>js/pages/dashboard.js"></script>
   <!-- Signature -->
   <script src="<?= base_url('/application/views/assets/'); ?>plugins/signature/js/signature_pad.umd.js"></script>

   <script>
       document.addEventListener('contextmenu', event => event.preventDefault());
       $(document).ready(function() {
           if (window.matchMedia("(max-width: 767px)").matches) {
               $("#modalDevice").modal("show");
           }
       });

       toastr.options = {
           "closeButton": false,
           "debug": false,
           "newestOnTop": false,
           "progressBar": false,
           "positionClass": "toast-top-right",
           "preventDuplicates": true,
           "onclick": null,
           "showDuration": "300",
           "hideDuration": "1000",
           "timeOut": "5000",
           "extendedTimeOut": "1000",
           "showEasing": "swing",
           "hideEasing": "linear",
           "showMethod": "fadeIn",
           "hideMethod": "fadeOut"
       }

       class Notifier {
           constructor(opt) {
               this.dflt = {
                   info: {
                       "closeButton": false
                   },
                   success: {
                       "progressBar": true
                   },
                   warning: {

                   },
                   error: {

                   }
               }
               this.cfg = $.extend(true, {}, opt, this.dflt);
           }

           info(msg, tl, cfgOvr) {
               this.notify('info', msg, tl, cfgOvr);
           }

           success(msg, tl, cfgOvr) {
               this.notify('success', msg, tl, cfgOvr);
           }

           warning(msg, tl, cfgOvr) {
               this.notify('warning', msg, tl, cfgOvr);
           }

           error(msg, tl, cfgOvr) {
               this.notify('error', msg, tl, cfgOvr);
           }

           notify(lvl, msg, tl, cfgOvr) {
               let cfg = this.cfg[lvl];
               if (cfgOvr) {
                   cfg = $.extend(true, {}, cfgOvr, cfg);
               }
               window.toastr[lvl](msg, tl, cfg);
           }
       }

       const notifier = new Notifier();

       <?php
        if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
        }
        ?>
   </script>

   </body>

   </html>