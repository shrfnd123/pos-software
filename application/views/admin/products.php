<title><?php echo $pagetitle?></title>
<!-- datatables css-->
<link href="<?php echo base_url()?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- datatables css-->

<link href="<?php echo base_url()?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
            <div class="page-content-wrapper">
                <div class="page-content">
                    <h1 class="page-title"> Products
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?php echo base_url()?>admin-dashboard">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Product List</span>
                            </li>
                        </ul> 
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                               <button type="button" data-toggle="modal" data-target="#modal-new" class="btn btn-fit-height grey-salt " ><i class="fa fa-plus"></i> New Product
                                    
                                </button>
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
                                            <span class="caption-subject font-green sbold uppercase">List Of Products</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container">                                 
                                                <table class="table table-striped table-bordered table-hover" id="table-products">
                                                <thead>
                                                    <tr class="bg-green-seagreen bg-font-green-seagreen">
                                                       <th class="bg-dark bg-font-dark"> Product ID</th>
                                                       <th>Image</th>
                                                       <th>Product Name</th>
                                                       <th>Quantity</th>
                                                       <th>Category</th>
                                                        <th>Unit</th>
                                                       <th>Selling Price</th>
                                                       <th class="bg-red bg-font-red">Supplier Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($list as $k) {
                                                  $image = $k->image;
                                                  $unit = $k->unit;
                                                  if ($image=="") {
                                                      $image_path = 'no_image.jpg';
                                                   }else{
                                                      $image_path = $image;
                                                   }
                                                   if ($unit=='pc') {
                                                      $unit_data = 'Pieces';
                                                   }elseif ($unit=='kl') {
                                                      $unit_data = 'Kilo';
                                                   }elseif ($unit=='m') {
                                                      $unit_data = 'Meter';
                                                   }
                                                 ?> 
                                                    <tr title="View Product Details" data-id="<?= $k->product_id; ?>" data-name="<?php echo $k->product_name?>" onclick="view_details(this)" style="cursor: pointer;">
                                                        <td style="border-left: 2px solid #2F353B"> <?php echo $k->product_id?> </td>
                                                        <td class="text-center"> <img src="<?php echo base_url()?>/uploads/<?= $image_path?>" alt="<?php echo base_url()?>/uploads/<?= $image_path?>" style="width: 100px;height: 100px"> </td>
                                                        <td> <?php echo $k->product_name?> </td>
                                                        <td class="text-center"> <?php echo $k->qty_left?> </td>
                                                        <td class=""><?php echo $k->category_name;?> </td>
                                                        <td><?= $unit_data?></td>
                                                        <td class="text-right"> <?php echo $this->config->item('money');?>00.00 </td>
                                                        <td class="text-right" style="border-right: 2px solid #E7505A;"> <?php echo $this->config->item('money');?><?php echo number_format($k->sprice,2);?></td>
                                                    </tr>
                                                 <?php }?>
                                                </tbody>
                                            </table>


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

            <div id="modal-new" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">NEW PRODUCT </h4>
                        </div>
                        <div class="modal-body">
                       
                          <div class="preview" style="display: none;">
                            <img src="">
                          </div>

                          
                               <form action="#" id="form-product" class="form-horizontal" data-toggle="validator" role="form" >
                               <div class="show-cart" style="display: none;"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Product Image</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                 <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?= base_url()?>/uploads/no_image.jpg" alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image_file" id="image_file"   accept="image/*"  accept=".jpg,.png,.gif"> </span>
                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input class="form-control"  name="product_name" placeholder="Product Name" type="text"    data-error="Product Name is required." required >
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Supplier Price</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input class="form-control"  name="sprice" placeholder="Supplier Price" type="number" step="0.00"  data-error="Please enter valid amount(0.00)."   required >
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Selling Price</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input class="form-control"  name="price" placeholder="Selling Price" type="number" step="0.00"  data-error="Please enter valid amount(0.00)." required>
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input class="form-control"  name="qty_left" placeholder="Quantity" type="number" step="0"  data-error="Please enter valid quantity"   required >
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Category</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                 <select class="form-control" name="unit">
                                                    <option value="pc"> Pieces</option>
                                                    <option value="kl"> Kilo</option>
                                                    <option value="m"> Meter</option>
                                                 </select>
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>  

                                     <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Category</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                 <select class="form-control" name="cat_id">
                                                     <?php foreach ($category_list as $category) {?>
                                                     <option value="<?= $category->cat_id?>"><?= $category->category_name?></option>
                                                     <?php }?>
                                                 </select>
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>  
                                   <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-9">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                    <input type="radio" id="radio14" name="status" class="md-radiobtn" value="1" checked="">
                                                    <label for="radio14">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Active </label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="radio15" name="status" class="md-radiobtn" value="2">
                                                    <label for="radio15">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Inactive </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    
                                </div>

                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn green btn-block">Submit</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
            
             <div class="modal fade in" id="modal-history" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Product History of <b id="product-name" class="font-green"></b> </h4>
                        </div>
                        <div class="modal-body" id="show-history" > 
                       
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <script src="<?php echo base_url()?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
             <!-- datatables js-->
            <script src="<?php echo base_url()?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
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
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/js/validator.min.js"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url()?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
           
            <script type="text/javascript">
              $(document).ready(function()
                { 
                    $('#table-products').DataTable( {
                          "iDisplayLength": 10,
                          "order" : [[3,"asc"]],
                          "aLengthMenu": [[10, 40, 60, 80, 100, -1], [10, 40, 60, 80, 100, "All"]]
                    } );
                });

                $('#form-product').validator().on('submit', function (e) 
                   {

                       if (e.isDefaultPrevented()) 
                       {
                       }else { 
                               $.ajax({
                                method   : 'post',
                                 url             :'<?php echo base_url()?>save-product', 
                                 data:new FormData(this),  
                                 contentType: false,  
                                 cache: false,  
                                 processData:false,  
                                success : function (data)
                                {//console.log(data);
                                    if (data==1) {
                                        $(':input[type="submit"]').prop('disabled', true);
                                        var delay = 2000;
                                         setTimeout(function(){  location.reload();  }, delay);  
                                         toastr.success("New Product Succesfully Added!", "Success Notification", {"closeButton": true, "debug": false, "positionClass": "toast-top-right", "showDuration": "1000", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "2000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"
                                        }); 
                                    }else{
                                        alert(data);
                                    }
                                    
                                }
                            });
                            return false;
                            } 
                });

              function view_history(el)
              {
                  $("#modal-history").modal('show');
                  $('#show-history').html('<div style="width;100%;text-align:center"><img src="<?= base_url()?>/images/loader.gif"style="height:100%;width:height:100%" align="center"></div>');
                  var product_id = $(el).attr('data-id'); 
                  var product_name = $(el).attr('data-name'); 
                  $("#product-name").html(product_name)
                  $.ajax({
                      url     :      '<?= base_url()?>view-product-history',
                      type    :      'post',
                      data    :      {product_id:product_id},
                      success : function(msg){
                         $("#show-history").html(msg);
                      }
    
                  });
              }

              function view_details(el)
              {   alert('Under Construction');
                  //var product_id = $(el).attr('data-id'); 
                 // window.location='<?= base_url()?>product-details?product_id='+product_id;
              }
               
            </script>
 
</body>

</html>
