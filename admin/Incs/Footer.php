  <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © HAIB.IR Website</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="/vendor/chart.js/Chart.min.js"></script>
  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin.min.js"></script>
<!--برای استفاده از دیتا تیبل آماده یک صفحه جدید جاوا اسکریپت درست کردیم و لینک انرا اضافه--> 
<script src="/js/datatables.js"></script>
  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>


<!--  برای چارت هستن-->

  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!--برای دریافت نوتیفیکیشن-->
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>

      Pusher.logToConsole = true;
      var pusher = new Pusher('8912d94d4b1a867fc87d', {
          cluster: 'ap2',
          forceTLS: true
      });

          var channel = pusher.subscribe('my-channel');
          channel.bind('Register',function (data) {
            toastr.success(data.message);
          })
  </script>

</body>

</html>
