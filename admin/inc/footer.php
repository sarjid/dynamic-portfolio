           <!--scroll to top-->
           <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
     <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="assets/javascripts/template-script.min.js"></script>
    <script src="assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="assets/vendor/toastr/toastr.min.js"></script>
    <!--morris chart-->
    <script src="assets/vendor/chart-js/chart.min.js"></script>
    <!--Gallery with Magnific popup-->
    <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<!--Examples-->
    <script src="assets/javascripts/examples/tables/data-tables.js"></script>
    <!--Examples-->
    <script src="assets/javascripts/examples/dashboard.js"></script>
    <script src="assets/javascripts/examples/script.js"></script>




    

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        	 $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");

             swal({
                   title: "Are you sure To Delete?",
                   text: "Once deleted, you will not be able to recover this imaginary file!",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
                   })
                   .then((willDelete) => {
                   if (willDelete) {
                       window.location.href = link;
                       swal("Deleted.!", "You clicked the button!", "success");

                   } else {
                       swal("Your file is safe!");
                   }

               });
         });

     </script>
 <!-- ===============jquery form validator ==================== -- -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
          lang: 'en'
        });
      </script>


  

</body>

</html>