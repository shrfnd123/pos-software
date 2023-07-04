<?php 
class Admin_model extends CI_Model
{

      public function sales($option, $data=null)
      {
        switch ($option) 
          {

                case 'product_list';
                $query = $this->db->query("SELECT  * from tbl_products where status='1' ");
                return $query->result();
                break ;
                case 'cart_list';
                $query = $this->db->query("SELECT  * from tbl_cart INNER JOIN tbl_products ON tbl_cart.product_id=tbl_products.product_id WHERE user_id='$data' ORDER BY cart_id DESC");
                return $query->result();
                break ;
                case 'add_cart':
                $this->db->insert('tbl_cart', $data);
                break;
                case 'select_product';
                $query = $this->db->query("SELECT  * from tbl_products where product_id='$data' ");
                return $query->result();
                break ;
                case 'select_product_cart';
                $query = $this->db->query("SELECT  * from tbl_cart where product_id='$data' ");
                  if($query->num_rows() > 0)
                  {
                    return $query->result();
                  }else{
                    return false;
                  }
                break ;
                case 'update_cart';
                $this->db->where('product_id',$data['product_id']);
                $this->db->update('tbl_cart', $data);
                break ; 
                case 'update_discount';
                $this->db->where('user_id',$data['user_id']);
                $this->db->update('tbl_cart', $data);
                break ; 
                case 'update_cart_qty';
                $this->db->where('cart_id',$data['cart_id']);
                $this->db->update('tbl_cart', $data);
                break ; 
                case 'select_max_no';
                $query = $this->db->query("SELECT  max(sales_no) AS no FROM tbl_sales ");
                return $query->result();
                break ; 
                case 'get_qty_left';
                $query = $this->db->query("SELECT  qty_left  FROM tbl_products where product_id='$data'");
                return $query->result();
                break ;
                case 'get_receipt';
                $query = $this->db->query("SELECT * from tbl_sales  INNER JOIN tbl_products ON tbl_sales.product_id=tbl_products.product_id where tbl_sales.sales_no = '$data'");
                return $query->result();
                break ;
                case 'select_customer_specific';
                $query = $this->db->query("SELECT * from tbl_customer  WHERE cust_id='$data'");
                return $query->result();
                break ;
                case 'select_category_specific';
                $query = $this->db->query("SELECT * from tbl_category  WHERE cat_id='$data'");
                return $query->result();
                break ;
                

               default:
               return false;
               break;
      
          }
      }
      public function receive($option, $data=null)
      {
        switch ($option) 
          { 
                case 'cart_list';
                $query = $this->db->query("SELECT  * from tbl_cart2 INNER JOIN tbl_products ON tbl_cart2.product_id=tbl_products.product_id WHERE user_id='$data' ORDER BY cart_id DESC");
                  if($query->num_rows() > 0)
                  {
                    return true;
                  }else{
                    return false;
                  }
                break ;
                case 'add_cart':
                $this->db->insert('tbl_cart2', $data);
                break;
                case 'select_product';
                $query = $this->db->query("SELECT  * from tbl_products where product_id='$data' ");
                return $query->result();
                break ;
                case 'select_product_cart';
                $query = $this->db->query("SELECT  * from tbl_cart2 where product_id='$data' ");
                if($query->num_rows() > 0)
                  {
                   return $query->result();
                  }else{
                    return false;
                  }
                break ;
                case 'update_cart';
                $this->db->where('product_id',$data['product_id']);
                $this->db->update('tbl_cart2', $data);
                break ; 
                case 'update_discount';
                $this->db->where('user_id',$data['user_id']);
                $this->db->update('tbl_cart2', $data);
                break ; 
                case 'update_cart_qty';
                $this->db->where('cart_id',$data['cart_id']);
                $this->db->update('tbl_cart2', $data);
                break ; 
                case 'select_max_no';
                $query = $this->db->query("SELECT  max(sales_no) AS no FROM tbl_sales ");
                return $query->result();
                break ; 
                case 'get_qty_left';
                $query = $this->db->query("SELECT  qty_left  FROM tbl_products where product_id='$data'");
                return $query->result();
                break ;
                case 'get_receipt';
                $query = $this->db->query("SELECT * from tbl_sales  INNER JOIN tbl_products ON tbl_sales.product_id=tbl_products.product_id where tbl_sales.sales_no = '$data'");
                return $query->result();
                break ;
                case 'select_customer_specific';
                $query = $this->db->query("SELECT * from tbl_customer  WHERE cust_id='$data'");
                return $query->result();
                break ;
                

               default:
               return false;
               break;
      
          }
      }  
      
      public function save($option, $data=null)
      {
         switch ($option) {
             case 'sales_list':
             $this->db->insert('tbl_cart', $data);
            return $this->db->affected_rows() != 1 ? false : true;
             break;
             case 'customer':
             $this->db->insert('tbl_customer', $data);
             return $this->db->affected_rows() != 1 ? false : true;
             break;
             case 'supplier':
             $this->db->insert('tbl_supplier', $data);
             return $this->db->insert_id();
             break;
             case 'product':
             $this->db->insert('tbl_products', $data);
             return $this->db->insert_id();
             break;
             
             default:
               # code...
             break;
         }
      }

      public function update($option, $data=null)
      {
         switch ($option) {
             case 'update_product':
             $this->db->where('product_id',$data['product_id']);
             $this->db->update('tbl_products', $data);
             case 'update_customer':
             $this->db->where('cust_id',$data['cust_id']);
             $this->db->update('tbl_customer', $data);
            
             default:
             break;
         }
      }

      public function display($option, $data=null)
      {
         switch ($option) {
             case 'sales_list':
             $query = $this->db->query("SELECT  * from tbl_sales INNER JOIN tbl_customer ON tbl_sales.cust_id= tbl_customer.cust_id   LEFT JOIN tbl_user ON tbl_sales.user_id=tbl_user.user_id GROUP BY tbl_sales.sales_no");
             return $query->result();
             break;
             case 'customer_list':
             $query = $this->db->query("SELECT * from tbl_customer where cust_id!=1");
             return $query->result();
             break;
             case 'supplier_list':
             $query = $this->db->query("SELECT * from tbl_supplier where supplier_id!=1");
             return $query->result();
             break;
             case 'product_list':
             $query = $this->db->query("SELECT * from tbl_products  INNER JOIN tbl_category ON tbl_products.cat_id=tbl_category.cat_id  where status=1");
             return $query->result();
             break;
             case 'my_sale':
             $query = $this->db->query("SELECT  * from tbl_sales INNER JOIN tbl_customer ON tbl_sales.cust_id= tbl_customer.cust_id   LEFT JOIN tbl_user ON tbl_sales.user_id=tbl_user.user_id WHERE tbl_sales.user_id='$data'  AND date(tbl_sales.sales_date)=CURDATE() GROUP BY tbl_sales.sales_no ");
             return $query->result();
             break;
             case 'category_list':
             $query = $this->db->query("SELECT * from tbl_category");
             return $query->result();
             break;
             case 'todays_sales':
             $query = $this->db->query("SELECT * from tbl_sales WHERE DATE( sales_date ) = CURDATE( ) GROUP BY sales_no");
             return $query->result();
             break;
             case 'total_customer':
             $query = $this->db->query("SELECT count(cust_id) AS total_customer  from tbl_customer");
             return $query->result();
             break;
             case 'total_supplier':
             $query = $this->db->query("SELECT count(supplier_id) AS total_supplier  from tbl_supplier");
             return $query->result();
             break;
             case 'total_products':
             $query = $this->db->query("SELECT count(product_id) AS total_products  from tbl_products WHERE  status='1' ");
             return $query->result();
             break;
             case 'history_list':
             $query = $this->db->query("SELECT * from tbl_history");
             return $query->result();
             case 'sales_list_today':
             $query = $this->db->query("SELECT  * from tbl_sales INNER JOIN tbl_customer ON tbl_sales.cust_id= tbl_customer.cust_id   LEFT JOIN tbl_user ON tbl_sales.user_id=tbl_user.user_id WHERE date(tbl_sales.sales_date)=CURDATE() GROUP BY tbl_sales.sales_no");
             return $query->result();
             break;
             case 'product_history':
             $query = $this->db->query("SELECT  * from tbl_product_history   WHERE  product_id = '$data' ");
             return $query->result();
             break;
             case 'specific_product_details':
             $query = $this->db->query("SELECT  * from tbl_products  INNER JOIN tbl_category ON tbl_products.cat_id=tbl_category.cat_id WHERE  product_id = '$data' ");
             return $query->result();
             break;
             case 'sales_history':
             $query = $this->db->query("SELECT  * from tbl_sales INNER JOIN tbl_customer ON tbl_sales.cust_id= tbl_customer.cust_id   LEFT JOIN tbl_user ON tbl_sales.user_id=tbl_user.user_id WHERE tbl_sales.product_id='$data' GROUP BY tbl_sales.sales_no");
             return $query->result();
             break;
             case 'sales_report':
               $from = $this->session->userdata('session_sales_report_from');
               $to = $this->session->userdata('session_sales_report_to');
               if($this->session->userdata('session_sales_report_to')){
                   $query = $this->db->query("SELECT  * from tbl_sales INNER JOIN tbl_customer ON tbl_sales.cust_id= tbl_customer.cust_id   LEFT JOIN tbl_user ON tbl_sales.user_id=tbl_user.user_id WHERE date(tbl_sales.sales_date)  BETWEEN  '$from' AND '$to'  GROUP BY tbl_sales.sales_no");
               }else{
                    $query = $this->db->query("SELECT  * from tbl_sales INNER JOIN tbl_customer ON tbl_sales.cust_id= tbl_customer.cust_id   LEFT JOIN tbl_user ON tbl_sales.user_id=tbl_user.user_id  WHERE date(tbl_sales.sales_date)=CURDATE()  GROUP BY tbl_sales.sales_no");
               }
             return $query->result();
             break;


             default:
               # code...
             break;
         }
      }
      
      public function insert_history($data)
      {
        $this->db->insert('tbl_history', $data);
        
        if($this->db->affected_rows() > 0)
          {
            
              return true;
          }
        else
          {
            return false;
          } 
      }

      public function insert_history_product($data)
      {
        $this->db->insert('tbl_product_history', $data);
        
        if($this->db->affected_rows() > 0)
          {
            
              return true;
          }
        else
          {
            return false;
          } 
      }

      public function sales_select($pageLimit,$setLimit,$cat_ids)
      {

       if ($cat_ids!="") {
             $query = $this->db->query("SELECT * FROM tbl_products where status = '1' AND cat_id='$cat_ids' AND qty_left>0 LIMIT ".$pageLimit." , ".$setLimit );
             return $query->result();
       }else{
            $query = $this->db->query("SELECT * FROM tbl_products where status = '1' AND qty_left>0 LIMIT ".$pageLimit." , ".$setLimit );
            return $query->result();
       }
      }

      public function displayPaginationBelow($per_page,$page,$cat_ids){
         $page_url="?";
          if ($cat_ids!="") {
               $qry_inp = "SELECT COUNT(*) as totalCount FROM tbl_products where status = '1' AND qty_left>0 AND cat_id='$cat_ids' ";
          }else{
              $qry_inp = "SELECT COUNT(*) as totalCount FROM tbl_products where status = '1' AND qty_left>0 ";
          }
          $query = $this->db->query($qry_inp); 
         foreach ($query->result() as $k){//var_dump($k);
              $total =  $k->totalCount;
          }
          $rec = $total;
          $total = $total;
            $adjacents = "2"; 

          $page = ($page == 0 ? 1 : $page);  
          $start = ($page - 1) * $per_page;               
        
          $prev = $page - 1;              
          $next = $page + 1;
            $setLastpage = ceil($total/$per_page);
          $lpm1 = $setLastpage - 1;
          
          $setPaginate = "";
          if($setLastpage > 1)
          { 
            $setPaginate .= "<ul class='setPaginate'>";
                        $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if ($setLastpage < 7 + ($adjacents * 2))
            { 
              for ($counter = 1; $counter <= $setLastpage; $counter++)
              {
                if ($counter == $page)
                  $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                else
                  $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";          
              }
            }
            elseif($setLastpage > 5 + ($adjacents * 2))
            {
              if($page < 1 + ($adjacents * 2))    
              {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                  if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                  else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";          
                }
                $setPaginate.= "<li class='dot'>...</li>";
                $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";    
              }
              elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
              {
                $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                $setPaginate.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                  if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                  else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";          
                }
                $setPaginate.= "<li class='dot'>..</li>";
                $setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";    
              }
              else
              {
                $setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
                $setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
                $setPaginate.= "<li class='dot'>..</li>";
                for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
                {
                  if ($counter == $page)
                    $setPaginate.= "<li><a class='current_page'>$counter</a></li>";
                  else
                    $setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";          
                }
              }
            }
            
            if ($page < $counter - 1){ 
              $setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
            }else{
              $setPaginate.= "<li><a class='current_page'>Next</a></li>";
                    $setPaginate.= "<li><a class='current_page'>Last</a></li>";
                }

            $setPaginate.= "</ul>\n";   
          }
        
        
            return $setPaginate;
      }

      public function category_list()
     {
        $query = $this->db->query("SELECT * from tbl_category");
        return $query->result();
      }










}
?>