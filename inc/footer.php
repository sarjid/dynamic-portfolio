 <!-- footer -->
 <script type="text/javascript" src="http://www.google.com/jsapi"></script>  
  

        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Sarjid Islam Habil - <?php echo date ('Y'); ?></span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/one-page-nav-min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/ajax-form.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/jquery.scrollUp.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        </script>
 <!-- ===============jquery form validator ==================== -- -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
          lang: 'en'
        });
      </script>

<script type="text/javascript" language="javascript">  
google.load("jquery", "1.4.2");  
  
var characterLimit = 150;  
  
google.setOnLoadCallback(function(){  
      
    $('#remainingCharacters').html(characterLimit);  
      
    $('#myInputarea').bind('keyup', function(){  
        var charactersUsed = $(this).val().length;  
          
        if(charactersUsed > characterLimit){  
            charactersUsed = characterLimit;  
            $(this).val($(this).val().substr(0, characterLimit));  
            $(this).scrollTop($(this)[0].scrollHeight);  
        }  
          
        var charactersRemaining = characterLimit - charactersUsed;  
          
        $('#remainingCharacters').html(charactersRemaining);  
    });  
}); 
</script> 
    </body>

</html>
