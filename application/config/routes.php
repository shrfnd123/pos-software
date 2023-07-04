<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// home routes
$route['login-check'] = 'home/login_check';

// admin routes
$route['admin-dashboard'] = 'admin';
$route['admin-logout'] = 'admin/log';
$route['customer'] = 'admin/customer';
$route['new-pos'] = 'admin/new_pos';
$route['add-to-cart'] = 'admin/add_to_cart';
$route['add-to-cart2'] = 'admin/add_to_cart2';
$route['sales-cart-details'] = 'admin/sales_cart_details';
$route['sales-cart-details2'] = 'admin/sales_cart_details2';
$route['sales-cart-total'] = 'admin/sales_cart_total';
$route['save-sales'] = 'admin/save_sales';
$route['delete-to-cart'] = 'admin/delete_to_cart';
$route['sales-list'] = 'admin/sales_list';
$route['save-customer'] = 'admin/save_customer';
$route['products'] = 'admin/products';
$route['save-product'] = 'admin/save_product';
$route['update-cart'] = 'admin/update_cart';
$route['update-discount'] = 'admin/update_discount';
$route['select-customer'] = 'admin/select_customer';
$route['selected-category'] = 'admin/selected_category';
$route['view-receipt'] = 'admin/view_receipt';
$route['sales-report'] = 'admin/sales_report';
$route['supplier'] = 'admin/supplier';
$route['save-supplier'] = 'admin/save_supplier';
$route['my-sale'] = 'admin/my_sale';
$route['cancel-sale'] = 'admin/cancel_sale';
$route['new-receiving'] = 'admin/new_receiving';
$route['history-report'] = 'admin/history_report';
$route['view-product-history'] = 'admin/view_product_history';
$route['product-details'] = 'admin/product_details';
$route['update-product'] = 'admin/update_product';
$route['update-customer'] = 'admin/update_customer';
$route['cancel-category'] = 'admin/cancel_category';
$route['sales-receipt'] = 'admin/sales_receipt';
$route['session-sales-report'] = 'admin/session_sales_report';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';
$route[''] = 'admin/';


$route['lights'] = 'admin/light';