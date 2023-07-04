<?php
	
class Admin extends CI_Controller
{

    public function __construct()
    {
  	    parent::__construct();
  	    $this->load->model('admin_model');
        $check_login = $this->session->userdata('<<<<<<');
        if ($check_login!='>>>>>') 
        {
          redirect('home','refresh');
        }else{
            $user_login =$this->session->userdata('usertypedata'); 
            if ($user_login!='dental_sofware_admin>>><<<') {
               redirect('home','refresh');
            }
      }
  }

  public function index()
  {
    
    $data['pagetitle'] = 'Admin Dashboard';
    $this->load->view('includes/admin_header');
    $this->load->view('includes/sidebar');
    $this->load->view('admin/dashboard',$data);
    $this->load->view('includes/admin-quick-sidebar');
    $this->load->view('includes/admin_footer');
  }

  private function _includes(){
    $this->load->view('includes/admin_header');
    $this->load->view('includes/sidebar');
  }

  private function _includes2(){
    $this->load->view('includes/admin-quick-sidebar');
    $this->load->view('includes/admin_footer');
  }

  public function customer()
  {
    $data['pagetitle'] = 'Customer';
    $data['list'] = $this->admin_model->display('customer_list');
    $this->_includes();
    $this->load->view('admin/customer',$data);
    $this->_includes2();
  }

  public function supplier()
  {
     $data['pagetitle'] = 'Supplier';
     $data['list'] = $this->admin_model->display('supplier_list');
     $this->_includes();
     $this->load->view('admin/supplier',$data);
     $this->_includes2();
  }


  public function sales_list()
  {

    $data['pagetitle'] = 'Sales';
    $data['list'] =  $this->admin_model->display('sales_list');
    $this->_includes();
    $this->load->view('admin/sales-list',$data);
    $this->_includes2();
  }

  public function history_report()
  {

    $data['pagetitle'] = 'History Report';
    $data['list'] =  $this->admin_model->display('history_list');
    $this->_includes();
    $this->load->view('admin/history',$data);
    $this->_includes2();
  }


  public function new_pos()
  {
      if(isset($_GET["page"]))
      $page = (int)$_GET["page"];
      else
      $page = 1;
      $setLimit = 12;
      $pageLimit = ($page * $setLimit) - $setLimit;

      $data['pagetitle'] = 'POS';
      $data['customer_list'] = $this->admin_model->display('customer_list');
      $c =$this->session->userdata('session_category');
       if ($c!="") {
          $cat_ids = $c;
       }else{
           $cat_ids = "";
       }
      $cat_id ="";
      $data['product_list'] = $this->admin_model->sales_select($pageLimit,$setLimit,$cat_ids);
      $data['category_list'] = $this->admin_model->category_list();
      $data['cart_list'] = $this->admin_model->sales('cart_list');
      $this->_includes();
      $this->load->view('admin/new-pos',$data);
      $this->_includes2();
  }

   public function new_receiving()
  {
      if(isset($_GET["page"]))
      $page = (int)$_GET["page"];
      else
      $page = 1;
      $setLimit = 20;
      $pageLimit = ($page * $setLimit) - $setLimit;

      $data['pagetitle'] = 'New Receiving';
      $data['customer_list'] = $this->admin_model->display('customer_list');
      // if (!empty($this->session->userdata('session_category'))) {
      //     $cat_id = $this->session->userdata('session_category');
      // }else{
      //     $cat_id = "";
      // }
      $cat_id ="";
      $data['product_list'] = $this->admin_model->sales_select($pageLimit,$setLimit,$cat_id);
      $data['category_list'] = $this->admin_model->category_list();
      $data['cart_list'] = $this->admin_model->receive('cart_list');
      $this->_includes();
      $this->load->view('admin/new-receiving',$data);
      $this->_includes2();
  }

  
  public function products()
  {
      $data['pagetitle'] = 'Product List';
      $data['list'] =  $this->admin_model->display('product_list');
      $data['category_list'] =  $this->admin_model->display('category_list');
      $this->_includes();
      $this->load->view('admin/products',$data);
      $this->_includes2();
  }

  public function product_details()
  {
      if (!$this->input->get('product_id')) {
         
         redirect('products','refresh');
      }

      $checks=0;
      foreach ($this->admin_model->display('product_history',$this->input->get('product_id')) as $check_datas) {
       $checks ++;
      }
      if ($checks==0) {
         redirect('products','refresh');
      }
      $data['pagetitle'] = 'Product List';
      $data['product_details'] =  $this->admin_model->display('specific_product_details',$this->input->get('product_id'));
      $data['product_history'] =  $this->admin_model->display('product_history',$this->input->get('product_id'));
      $data['product_sold'] =  $this->admin_model->display('sales_history',$this->input->get('product_id'));
       $data['category_list'] =  $this->admin_model->display('category_list');
      $this->_includes();
      $this->load->view('admin/product-details',$data);
      $this->_includes2();
  }

  public function sales_report()
  {
      $data['pagetitle'] = 'Sales Report';
      $data['list'] =  $this->admin_model->display('sales_report');
      $this->_includes();
      $this->load->view('admin/sales-report',$data);
      $this->_includes2();
  }

  public function new_product()
  {

      $data['pagetitle'] = 'Product List';
      $data['list'] =  $this->admin_model->display('product_list');
      $this->_includes();
      $this->load->view('admin/new-product',$data);
      $this->_includes2();
  }

  public function add_to_cart()
  {
     $select_products = $this->admin_model->sales('select_product',$this->input->post('product_id'));
     foreach ($select_products as $product_data) {
         $qty_left = $product_data->qty_left;
         $price    = $product_data->price;
     }
     $select_products_cart = $this->admin_model->sales('select_product_cart',$this->input->post('product_id'));
      if ($select_products_cart) {
          foreach ($select_products_cart as $select_products_cart_data) {
            $quantity = $select_products_cart_data->qty;
          }
          $select_products = $this->admin_model->sales('select_product',$this->input->post('product_id'));
           foreach ($select_products as $product_data) {
                 $qty_left = $product_data->qty_left;
                 $price    = $product_data->price;
           }

           if ($quantity >= $qty_left) {
                 $data2 = array(
                      'product_id'         => $this->input->post('product_id'),
                      'qty'                => $qty_left,
                  ); 
                  $this->admin_model->sales('update_cart',$data2); 
                   echo "1";
           }else{
                  $data2 = array(
                      'product_id'         => $this->input->post('product_id'),
                      'qty'                => $quantity+1,
                  ); 
                  $this->admin_model->sales('update_cart',$data2); 
                  echo "2";
           }
          
      }
      else{

          $data = array(
                  'product_id'         => $this->input->post('product_id'),
                  'qty'                => 1,
                  'price'              => $price,
                  'user_id'            => $this->session->userdata('posdata_user_id')
          ); 
          $this->admin_model->sales('add_cart',$data);
          echo "3";
           
           
      }
      
  }

  public function add_to_cart2()
  {
    // $user_id = $_SESSION['garage_user_id'];
       $select_products = $this->admin_model->receive('select_product',$this->input->post('product_id'));
       foreach ($select_products as $product_data) {
           $qty_left = $product_data->qty_left;
           $price    = $product_data->sprice;
       }
       $select_products_cart = $this->admin_model->receive('select_product_cart',$this->input->post('product_id'));
        if ($select_products_cart) {
            foreach ($select_products_cart as $select_products_cart_data) {
              $quantity = $select_products_cart_data->qty;
            }
            $data = array(
                'product_id'         => $this->input->post('product_id'),
                'qty'                => $quantity+1,
            ); 
            $this->admin_model->receive('update_cart',$data);
        }
        else{
             $data = array(
                'product_id'         => $this->input->post('product_id'),
                'qty'                => 1,
                'price'              => $price,
                'user_id'            => $this->session->userdata('posdata_user_id')
            ); 
            $this->admin_model->receive('add_cart',$data);
        }
      
  }

  public function sales_cart_details()
  {
         $cart =  $this->admin_model->sales('cart_list',$this->session->userdata('posdata_user_id'));
         $total = 0;
         $item = 0 ;
         foreach ($cart as $k) {
           $price = $k->price;
           $qty = $k->qty;
           $sum = $price * $qty;
           $total +=$sum;
           $item++;
           $unit = $k->unit;

           echo '
            <tr>
                 <td width="50%"><a oncontextmenu="return false;"  data-id="'.$k->cart_id.'" onclick="deleteCart(this)" class="btn btn-circle btn-icon-only btn-default tooltips" title="Delete Product" href="javascript:;" ><i class="icon-close"></i></a>'.$k->product_name.' <input type="hidden" name="item_id[]"  value="'.$k->product_id.'">
                    <input type="hidden" name="price[]" value="'.$price.'">
                    </td>
                 <td width="20px" style="width:20px;text-align:center;font-weight:"><input  data-product_id="'.$k->product_id.'"  data-pid="'.$k->cart_id.'"  onchange="update_qty(this)" onkeypress="return numbersonly(event)" type="text" style="width:30px;text-align:center" name="qty_order[]" data-value="'.$qty.'" value="'.$qty.'"> </td>
                 <td "20%" style="width:;text-align:center;">'.$unit.'</td>
                 <td "20%" style="width:;text-align:right;">'.number_format($k->price,2).'</td>
                 <td "20%" style="width:;text-align:right;">'.number_format($sum,2).'</td>
             </tr>
           ';
          }
          if ($item==0) {
             echo "<tr > <td colspan='4' style='width:100%;text-align:center;padding-top:80px'><h3>No Product Added!</h3></td></tr>";
          }
  }
   public function sales_cart_details2()
  {
         $cart =  $this->admin_model->receive('cart_list',$this->session->userdata('posdata_user_id'));
         $total = 0;
         $item = 0 ;
         foreach ($cart as $k) {
           $price = $k->sprice;
           $qty = $k->qty;
           $sum = $price * $qty;
           $total +=$sum;
           $item++;
           echo '
            <tr>
                 <td width="50%"><a oncontextmenu="return false;"  data-id="'.$k->cart_id.'" onclick="deleteCart(this)" class="btn btn-circle btn-icon-only btn-default tooltips" title="Delete Product" href="javascript:;" ><i class="icon-close"></i></a>'.$k->product_name.' <input type="hidden" name="item_id[]"  value="'.$k->product_id.'">
                    <input type="hidden" name="price[]" value="'.$price.'">
                    </td>
                 <td width="20px" style="width:20px;text-align:center;font-weight:"><input data-pid="'.$k->cart_id.'"  onchange="update_qty(this)" type="text" style="width:30px;text-align:center" name="qty_order[]" data-value="'.$qty.'" value="'.$qty.'"> </td>
                 <td "20%" style="width:;text-align:right;">'.number_format($k->sprice,2).'</td>
                 <td "20%" style="width:;text-align:right;">'.number_format($sum,2).'</td>
             </tr>
           ';
          }
          if ($item==0) {
             echo "<tr > <td colspan='4' style='width:100%;text-align:center;padding-top:80px'><h3>No Product Added!</h3></td></tr>";
          }
  }
   
  public function sales_cart_total()
  {
      $cart =  $this->admin_model->sales('cart_list',$this->session->userdata('posdata_user_id'));
      $items= 0;
      $total = 0;
      $discount = 0;
      if ($cart) {
        foreach ($cart as $k) {
         $items++;
         $price = $k->price;
         $qty = $k->qty;
         $sum = $price * $qty;
         $total +=$sum;
         $discount = number_format($k->discount,2); 
         $dis = $k->discount;
      }
      $totals = number_format($total-$dis,2);
      $arr = array ("total"=>"$totals","item"=>"$items","discount"=>"$discount");
      echo json_encode($arr);
      }else{
           $arr = array ("total"=>"0.00","item"=>"0","discount"=>"0.00");
            echo json_encode($arr);
      }
      
  }

  public function save_sales()
  {
      $count = count($_POST['item_id']);
      $item_id = $this->input->post('item_id');
      $qty_order = $this->input->post('qty_order');
      $price = $this->input->post('price');
      $no = $this->admin_model->sales('select_max_no',""); 
      foreach ($no as $k){
        $max_no = $k->no+1; 
      }
      $data =array();
      $data2 =array();
      for($i=0; $i<$count; $i++) 
      {
          $data[$i] =  array(
                'sales_no'              => $max_no,
                'sales_date'            => date('Y-m-d H:i:s'),
                'product_id'            =>  $item_id[$i],
                'quantity_order'        => $qty_order[$i],
                'price'                 => $price[$i],
                'user_id'               => $this->session->userdata('posdata_user_id'),
                'cust_id'               => $this->input->post('cust_id'),
                'discount'               => $this->input->post('discount'),
                'payable'               => str_replace(',', '', $this->input->post('payable')),
                'amount_paid'           =>  str_replace(',', '', $this->input->post('amount_paid')),
                'notes'                 => $this->input->post('notes')
          );//var_dump($data);
             
          $get_qty_left = $this->admin_model->sales('get_qty_left',$item_id[$i]);
          foreach ($get_qty_left as $get_qty_left_data) 
          {
            $qty_left = $get_qty_left_data->qty_left;
          }
          $new_qty = $qty_left - $qty_order[$i];
          $query = $this->db->query("UPDATE  tbl_products SET qty_left=$new_qty where product_id='$item_id[$i]' ");
          $data_history = array(
             'date_history'         => date('Y-m-d H:i:s'),
             'type'                 => '1',
             'no'                   =>  $max_no,
             'quantity'             =>  $qty_order[$i],
             'product_id'           => $item_id[$i],
             'balance_quantity'     => $new_qty

          );
         $add_data = $this->admin_model->insert_history_product($data_history);
        
      }  
        
      $save = $this->db->insert_batch('tbl_sales', $data);
      if ($save) {
        $query = $this->db->query("DELETE FROM tbl_cart WHERE 1"); 
        $details = '[{"sales_no":"'.$max_no.'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
         $data3 = array(
             'date_history'      => date('Y-m-d H:i:s'),
             'type'              =>      'New Sales',
             'details'           => $details
          );
         $add_data = $this->admin_model->insert_history($data3);
      } 
     $this->_receipt_data($max_no);   
  }

  private function _receipt_data($max_no){
    $data['receipt'] = $this->admin_model->sales('get_receipt',$max_no);
    $this->load->view('admin/receipt',$data);
  }

  public function save_customer()
  {
    
     $data = array(
          'name'        => $this->input->post('name'),
          'address'     => $this->input->post('address'),
          'contact'     => $this->input->post('contact')
      );
      $save  = $this->admin_model->save('customer',$data);
      if($save){
         $details = '[{"cust_id":"'.$save.'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
         $data3 = array(
             'date_history'      => date('Y-m-d H:i:s'),
             'type'              =>      'New Customer',
             'details'           => $details
          );
         $add_data = $this->admin_model->insert_history($data3);
         if ($add_data) {
            echo "1";
             $this->session->set_userdata('session_customer',$save);
             $this->session->set_userdata('session_customer_name',$this->input->post('name'));
         }
       }
  }

  public function update_customer()
  {   
      $data = array(
          'cust_id'     => $this->input->post('cust_id'),
          'name'        => $this->input->post('name'),
          'address'     => $this->input->post('address'),
          'contact'     => $this->input->post('contact')
      );
      $file_id = $this->admin_model->update('update_customer',$data); 
      $details = '[{"cust_id":"'.$this->input->post('cust_id').'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
      $data3 = array(
          'date_history'      => date('Y-m-d H:i:s'),
          'type'              =>  'Update Customer',
          'details'           => $details
      );
      $this->admin_model->insert_history($data3);
      echo "1";
  }

  public function save_supplier()
  {
    
     $data = array(
          'supplier_name'        => $this->input->post('name'),
          'supplier_address'     => $this->input->post('address'),
          'supplier_contact'     => $this->input->post('contact'),
          'supplier_email'       => $this->input->post('email'),
          'other_details'        => $this->input->post('other')
      );
       $save  = $this->admin_model->save('supplier',$data);
       if($save){
         $details = '[{"supplier_id":"'.$save.'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
         $data3 = array(
             'date_history'      => date('Y-m-d H:i:s'),
             'type'              =>      'New Supplier',
             'details'           => $details
          );
         $add_data = $this->admin_model->insert_history($data3);
         if ($add_data) {
            echo "1";
         }
       }
  }

  public function save_product()
  {  
     
      $config =  array(
            'upload_path'     => "./uploads/",
            'allowed_types'   => "gif|jpg|png|jpeg|pdf",
            'overwrite'       => TRUE,
            'max_size'        => "2048000",  // Can be set to particular file size
            'encrypt_name'    => true,
            'max_size'        => '100',
            'max_width'       => '1000',
            'max_height'      => '1000'
      );

     $this->load->library('upload', $config);
     if(!$this->upload->do_upload('image_file'))
      {
          $error = array('error' => $this->upload->display_errors());
          $msg=$this->upload->display_errors('','');
          if (!$_FILES['image_file']['name']) {
                $uploded = array('upload_data' => $this->upload->data());
                $datas = $this->upload->data();
                $image = $datas['raw_name'].$datas['file_ext'];
                $data = array(
                  'cat_id'           => $this->input->post('cat_id'), 
                  'unit'             => $this->input->post('unit'), 
                  'image'            => "", 
                  'product_name'     => $this->input->post('product_name'), 
                  'qty_left'         => $this->input->post('qty_left'), 
                  'price'            => $this->input->post('price'), 
                  'sprice'           => $this->input->post('sprice'), 
                  'status'           => $this->input->post('status')
               );
               $file_id = $this->admin_model->save('product',$data);
               if ($file_id) {
                    $data_history = array(
                     'date_history'         =>  date('Y-m-d H:i:s'),
                     'type'                 =>  '1',
                     'no'                   =>  $file_id,
                     'quantity'             =>  $this->input->post('qty_left'),
                     'product_id'           =>  $file_id,
                     'balance_quantity'     =>  $this->input->post('qty_left')

                   );
                    $this->admin_model->insert_history_product($data_history);
                     $details = '[{"product_id":"'.$file_id.'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
                    $data3 = array(
                      'date_history'      => date('Y-m-d H:i:s'),
                      'type'              =>      'New Product',
                      'details'           => $details
                    );
                    $this->admin_model->insert_history($data3);
                }
              echo "1";
          }else{
             echo  $msg.'('.'Width = '.$config['max_width'].'px' .' and '.'Height = '.$config['max_width'].'px' .')';
          }
      }else{
            $uploded = array('upload_data' => $this->upload->data());
            $datas = $this->upload->data();
            $image = $datas['raw_name'].$datas['file_ext'];
            $data = array(
              'cat_id'           => $this->input->post('cat_id'), 
              'unit'           => $this->input->post('unit'),
              'image'            => $image, 
              'product_name'     => $this->input->post('product_name'), 
              'qty_left'         => $this->input->post('qty_left'), 
              'price'            => $this->input->post('price'), 
              'sprice'           => $this->input->post('sprice'), 
              'status'          => $this->input->post('status')
           );
           $file_id = $this->admin_model->save('product',$data);
           if ($file_id) {
                $data_history = array(
                 'date_history'         =>  date('Y-m-d H:i:s'),
                 'type'                 =>  '1',
                 'no'                   =>  $file_id,
                 'quantity'             =>  $this->input->post('qty_left'),
                 'product_id'           =>  $file_id,
                 'balance_quantity'     =>  $this->input->post('qty_left')

               );
                $this->admin_model->insert_history_product($data_history);
                 $details = '[{"product_id":"'.$file_id.'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
                $data3 = array(
                  'date_history'      => date('Y-m-d H:i:s'),
                  'type'              =>      'New Product',
                  'details'           => $details
                );
                $this->admin_model->insert_history($data3);
            }
            echo "1";
      }   
     
  }

  public function update_product()
  { 
      $config =  array(
            'upload_path'     => "./uploads/",
            'allowed_types'   => "gif|jpg|png|jpeg|pdf",
            'overwrite'       => TRUE,
            'max_size'        => "2048000",  // Can be set to particular file size
            'encrypt_name'    => true,
            'max_size'        => '100',
            'max_width'       => '1000',
            'max_height'      => '1000'
      );
     $base_url = base_url();
     $image_paths = $this->input->post('image_path');
     $this->load->library('upload', $config);
     if(!$this->upload->do_upload('image_file'))
      {
          $error = array('error' => $this->upload->display_errors());
          $msg=$this->upload->display_errors('','');
          if (!$_FILES['image_file']['name']) {
             $uploded = array('upload_data' => $this->upload->data());
             $datas = $this->upload->data();
             $image = $datas['raw_name'].$datas['file_ext'];
             $data = array(
                    'product_id'       => $this->input->post('product_id'),
                    'cat_id'           => $this->input->post('cat_id'), 
                    'unit'             => $this->input->post('unit'), 
                    'image'            => $this->input->post('image_path'), 
                    'product_name'     => $this->input->post('product_name'), 
                    'price'            => $this->input->post('price'), 
                    'sprice'           => $this->input->post('sprice'), 
                    'status'           => $this->input->post('status')
              );
              $file_id = $this->admin_model->update('update_product',$data);
              $details = '[{"product_id":"'.$this->input->post('product_id').'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
              $data3 = array(
                  'date_history'      => date('Y-m-d H:i:s'),
                  'type'              =>      'Update Product',
                  'details'           => $details
              );
              $this->admin_model->insert_history($data3);
          echo "1";
          }else{
             echo  $msg.'('.'Width = '.$config['max_width'].'px' .' and '.'Height = '.$config['max_width'].'px' .')';
          }

      }else{
              $uploded = array('upload_data' => $this->upload->data());
              $datas = $this->upload->data();
              $image = $datas['raw_name'].$datas['file_ext'];
              $data = array(
                  'product_id'       => $this->input->post('product_id'),
                  'cat_id'           => $this->input->post('cat_id'), 
                  'unit'             => $this->input->post('unit'),
                  'image'            => $image, 
                  'product_name'     => $this->input->post('product_name'), 
                  'price'            => $this->input->post('price'), 
                  'sprice'           => $this->input->post('sprice'), 
                  'status'           => $this->input->post('status')
               );
              $file_id = $this->admin_model->update('update_product',$data);
              unlink("uploads/".$image_paths);
              $details = '[{"product_id":"'.$this->input->post('product_id').'","user_id":"'.$this->session->userdata('posdata_user_id').'"}]';
                  $data3 = array(
                      'date_history'      => date('Y-m-d H:i:s'),
                      'type'              =>      'Update Product',
                      'details'           => $details
                  );
              $this->admin_model->insert_history($data3);
              echo "1";
      }   
     
  }

  public function count_cart()
  {
      $cart = 0;
      $cart_check = $this->cart->contents();
      foreach ($cart_check as $k) {
       $cart++;
      }
      echo  $cart;
  }

  public  function job_order_cart()
  {
      $cart = $this->cart->contents();
      $total = 0;
      if ($total==0) {
         echo " No Product";
      }
      else{
            foreach ($cart as $k) {
            $item_id = $k['item_id'];
             $items = $this->admin_model->select_cart_details($item_id);
              foreach ($items as $k1) {
                  $discount = $k1->discount;
                  $price = $k1->item_sellingprice;
                  $qty = $k['qty'];
                  $sum = $price * $qty;
                  $total +=$sum;
                  echo '
                     <tr>
                     <input type="hidden" name="item_id" value="'.$item_id.'">
                     <input type="hidden" name="price" value="'.$price.'">
                     <input type="hidden" name="itemrequest_qty" value="'.$qty.'">
                        <td>'.$k1->item_desc.'</td>
                        <td>'.$qty.'</td>
                        <td>'.$k1->item_sellingprice.'</td>
                         <td>'.$sum.'</td>
                    </tr>
                  ';
              }
          }
      }
  }

  public function delete_to_cart()
  {
     $this->db->where('cart_id', $this->input->post('cart_id'));
     $this->db->delete('tbl_cart');
  }

  public function update_cart()
  {
     $select_products = $this->admin_model->sales('select_product',$this->input->post('product_id'));
     foreach ($select_products as $product_data) {
        $qty_left = $product_data->qty_left;
        $price    = $product_data->price;
     }

     if ($this->input->post('qty') > $qty_left) {
          $data = array(
            'cart_id'       => $this->input->post('cart_id'),
            'qty'           => $qty_left
          ); 
      $this->admin_model->sales('update_cart_qty',$data);
       echo "1";
      }else{
         $data = array(
            'cart_id'       => $this->input->post('cart_id'),
            'qty'           => $this->input->post('qty')
         ); 
         $this->admin_model->sales('update_cart_qty',$data);
         echo "2";
      }

  }

  public function update_discount()
  {
      $data = array(
            'user_id'        => $this->session->userdata('posdata_user_id'),
            'discount'       => $this->input->post('discount')  
      ); 
      $this->admin_model->sales('update_discount',$data);
  }

  public function select_customer()
  {
     $customer = $this->admin_model->sales('select_customer_specific',$this->input->post('cust_id'));
     foreach ($customer as $k) {
         $cust_name = $k->name;
     }
     $this->session->set_userdata('session_customer',$this->input->post('cust_id'));
     $this->session->set_userdata('session_customer_name',$cust_name);
  }

  public function selected_category()
  {
    $category = $this->admin_model->sales('select_category_specific',$this->input->post('cat_id'));
     foreach ($category as $k) {
         echo $cat_name = $k->category_name;
     }
     $this->session->set_userdata('session_category',$this->input->post('cat_id'));
     $this->session->set_userdata('session_category_name',$cat_name);
  }

  public function cancel_category()
  {
    $this->session->set_userdata('session_category',"");
    $this->session->set_userdata('session_category_name',"");
  }

  public function view_receipt(){
    $max_no = $this->input->post('sales_no');
    $this->_receipt_data($max_no); 
  }

  public function my_sale()
  {
    $data['my_sale'] = $this->admin_model->display('my_sale',$this->session->userdata('posdata_user_id'));
    $this->load->view('admin/my-sale',$data);
  }

  public function cancel_sale()
  {
      $this->db->where('user_id', $this->session->userdata('posdata_user_id'));
     $this->db->delete('tbl_cart');
  }

  public function view_product_history()
  {
    $data['product_history'] = $this->admin_model->display('product_history',$this->input->post('product_id'));
    $this->load->view('admin/product-history',$data);
  }

  public function sales_receipt()
  {
    if (!$this->input->get('sales_no')) {
         
        redirect('admin-dashboard','refresh');
    }
     
    $checks=0;
    foreach ($this->admin_model->sales('get_receipt',$this->input->get('sales_no')) as $check_datas) {
       $checks ++;
    }

    if ($checks==0) {
         redirect('admin-dashboard','refresh');
    }
    $data['pagetitle'] = 'Sales Receipt';
    $data['receipt'] = $this->admin_model->sales('get_receipt',$this->input->get('sales_no'));
    $this->load->view('admin/sales_receipt',$data);
  }

  public function session_sales_report()
  {
      $date = $this->input->post('calendar'); 
      $datedata_billed = explode(" -",$date); 
      $fcurrent_billed = trim($datedata_billed[0]); 
      $tcurrent_billed   = trim($datedata_billed[1]);
      $this->session->set_userdata('session_sales_report_from',$fcurrent_billed);
      $this->session->set_userdata('session_sales_report_to',$tcurrent_billed);
  }

  




  public function log(){
  $this->_admin_logout();
  }

  private function _admin_logout()
  {
   $this->session->sess_destroy();
   redirect('home', 'refresh');//login
  }



  


}
?>

    