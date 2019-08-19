<?php defined('BASEPATH') OR exit ('Not Found'); ?>

<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://support.mazzapp.com/help-center/categories/5/expressgo-car-rental-management-system">
                        Help Center
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            ExpressGo v1.2 | &copy; made by <a href="http://www.mazzapp.com">mazzApp!</a>
        </div>
    </div>
</footer>

</div>
</div>


</body>
<script type="text/javascript">
    var p_base_url = "<?php echo base_url();?>index.php/"
</script>
<!--   Core JS Files   -->
<script src="<?php echo base_url('public/'); ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>assets/autocomplete/jquery.easy-autocomplete.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Plugins -->
<script src="<?php echo base_url('public/'); ?>assets/js/bootstrap-checkbox-radio.js"></script>
<script src="<?php echo base_url('public/'); ?>assets/js/jquery.printPage.js"></script>
<script src="<?php echo base_url('public/'); ?>assets/js/sweetalert2.js"></script>
<script src="<?php echo base_url('public/'); ?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url('public/'); ?>assets/js/bootstrap-table.js"></script>

<!-- Paper Dashboard Core javascript -->
<script src="<?php echo base_url('public/'); ?>assets/js/paper-dashboard.js"></script>

<!-- Default JS -->
<script src="<?php echo base_url('public/'); ?>assets/js/lang/<?=$this->expressgo->setup("language");?>.js"></script>
<script src="<?php echo base_url('public/'); ?>assets/js/expressgo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

     <?php echo $js_code;?>

 });
</script>

</html>