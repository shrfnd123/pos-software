<title><?php echo $pagetitle?></title>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <h1 class="page-title"> Patient
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?php echo base_url()?>admin-dashboard">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Patient</span>
                            </li>
                        </ul> 
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                               
                            </div>
                        </div> 
                    </div>    
                      <!-- start code-->
                      <div class="row">
                            <div class="col-md-12">
                                <!-- Begin: life time stats -->
                                <div class="portlet light portlet-fit portlet-datatable ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-list-ol font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Test Panel</span>
                                        </div>
                                        <div class="actions">
                                           
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container">

                                        </div>
                                    </div>
                                </div>
                                <!-- End: life time stats -->
                            </div>
                     </div>
                     <!-- end code-->
                 </div>
              </div>
           </div>

            <script src="<?php echo base_url()?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
             <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url()?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
          
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?php echo base_url()?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?php echo base_url()?>/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
           
</body>

</html>