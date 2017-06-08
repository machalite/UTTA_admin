<!-- FOOTER CONTENT -->
	<footer>
		<div class="pull-right">
			Copyright &copy <?php echo date('Y'); ?>
			by Himpunan Mahasiswa Elektro FT UAJ
		</div>
		<!-- JS -->
		<!-- jQuery -->
		  <script src="js/jquery.min.js"></script>
		  <!-- Bootstrap -->
		  <script src="js/bootstrap.min.js"></script>
		  <!-- FastClick -->
		  <script src="js/fastclick.js"></script>
		  <!-- NProgress -->
		  <script src="js/nprogress.js"></script>
		  <!-- Datatables -->
		  <script src="js/jquery.dataTables.min.js"></script>
		  <script src="js/dataTables.bootstrap.min.js"></script>
		  <script src="js/dataTables.buttons.min.js"></script>
		  <script src="js/buttons.bootstrap.min.js"></script>
		  <script src="js/buttons.flash.min.js"></script>
		  <script src="js/buttons.html5.min.js"></script>
		  <script src="js/buttons.print.min.js"></script>
		  <script src="js/dataTables.fixedHeader.min.js"></script>
		  <script src="js/dataTables.keyTable.min.js"></script>
		  <script src="js/dataTables.responsive.min.js"></script>
		  <script src="js/responsive.bootstrap.js"></script>
		  <script src="js/datatables.scroller.min.js"></script>
		  <script src="js/jszip.min.js"></script>
		  <script src="js/pdfmake.min.js"></script>
		  <script src="js/vfs_fonts.js"></script>

		  <!-- Custom Theme Scripts -->
		  <script src="js/custom.min.js"></script>

		  <!-- Datatables -->
		  <script>
		    $(document).ready(function() {
		      var handleDataTableButtons = function() {
		        if ($("#datatable-buttons").length) {
		          $("#datatable-buttons").DataTable({
		            dom: "Bfrtip",
		            buttons: [
		              {
		                extend: "copy",
		                className: "btn-sm"
		              },
		              {
		                extend: "csv",
		                className: "btn-sm"
		              },
		              {
		                extend: "excel",
		                className: "btn-sm"
		              },
		              {
		                extend: "pdfHtml5",
		                className: "btn-sm"
		              },
		              {
		                extend: "print",
		                className: "btn-sm"
		              },
		            ],
		            responsive: true
		          });
		        }
		      };

		      TableManageButtons = function() {
		        "use strict";
		        return {
		          init: function() {
		            handleDataTableButtons();
		          }
		        };
		      }();

		      $('#datatable').dataTable();
		      $('#datatable-keytable').DataTable({
		        keys: true
		      });

		      $('#datatable-responsive').DataTable();

		      $('#datatable-scroller').DataTable({
		        ajax: "js/datatables/json/scroller-demo.json",
		        deferRender: true,
		        scrollY: 380,
		        scrollCollapse: true,
		        scroller: true
		      });

		      var table = $('#datatable-fixed-header').DataTable({
		        fixedHeader: true
		      });

		      TableManageButtons.init();
		    });
		  </script>
		  <!-- /Datatables -->
		<!-- END OF JS -->
		</body>
		</html>
		<div class="clearfix"></div>
	</footer>
<!-- END OF FOOTER CONTENT -->