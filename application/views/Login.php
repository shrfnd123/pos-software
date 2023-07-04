<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8" />
        <title><?php echo $pagetitle?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #5 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url()?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url()?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url()?>/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(<?php echo base_url()?>/assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="<?php echo base_url()?>/img/logo.png" /> </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <h3>NSA Dental Care - Login Page</h3>

                        <form  class="login-form"   > 
                         
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>

                              <div style="border-radius: 0px!important;display:none" class="alert alert-danger" id="alert-wrong">
                          <strong></strong> We're sorry, either the Username or Password was incorrect. Please try again.
                     </div>
                     <div id="loader" style="width:100%"></div><br>


                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="username" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="remember" value="1" /> Remember me
                                            <span></span>
                                        </label>
                                    </div> -->
                                </div>
                                <div class="col-sm-8 text-right">
                                   <!--  <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div> -->
                                    <button class="btn green" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                      
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                               
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; REPOLINDO'S STORE 2017</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  <script src="<?php echo base_url()?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>


        <script>
            $(document).ready(function()
            {    
            $(document).on('submit', '.login-form', function()
              {  
               $("#alert-wrong").hide();
                $('#loader').html('<div style="width;100%;text-align:center"><img src="<?php echo  base_url()?>images/loader.gif"style="height:50px;width:height:50px" ></div>');

                var data = $(this).serialize(); 
                 $.ajax({
                  type : 'POST',
                  url  : '<?php echo base_url();?>login-check',
                  data : data,
                  success :  function(msg)
                  { //alert(msg);
                     $('#loader').html('');

                    //alert(msg);   
                  if(parseInt(msg) == 1){
                     
                    var delay = 0; 
                    setTimeout(function(){ window.location='<?php  echo base_url()?>admin-dashboard'  }, delay); 
                  }  
                  else if(parseInt(msg) == 2){
                    var delay = 0; 
                    setTimeout(function(){ window.location='<?php  echo base_url()?>staff/'  }, delay); 
                  }
                  else
                  {  
                    $("#signup_btn").attr("disabled",false);
                     $("#alert-wrong").show();
                     $("#alert-employer").hide();
                     
                   }                                    
                 }
             });       
        return false;
             });
            });

  
        </script>
</body>


</html>