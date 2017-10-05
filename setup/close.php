    	

            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    </body>

</html>
        <?php  
            if ($_GET['pages'] == 'answer') {
                echo '
                    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>';
                echo "    
                    <script>tinymce.init({ selector:'textarea' });</script>";
            }
        ?>
