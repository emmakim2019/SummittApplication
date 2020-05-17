<?php

return [
  /*
    Let's create the nav structure of the admin section.
  */
  'admin_nav' => [
    'Dashboard'=>[
      // ['title'=>'My Recruitment','icon'=>'<i class="fas fa-file"></i>','route'=>'dashboard'],

      ['title'=>'Job Ad Management','icon'=>'<i class="fas fa-book"></i>','route'=>'jobAds.index'],

      ['title'=>'Staff','icon'=>'<i class="fas fa-users"></i>','route'=>'users.index'],

      ['title'=>'Tickets','icon'=>'<i class="fas fa-comments"></i>','route'=>'tickets'],

    ],

  ],

  'summit_staff' => [
    'Dashboard'=>[
      // ['title'=>'My Recruitment','icon'=>'<i class="fas fa-file"></i>','route'=>'dashboard'],
      ['title'=>'Job Ad Management','icon'=>'<i class="fas fa-book"></i>','route'=>'jobAds.index'],

      ['title'=>'Tickets','icon'=>'<i class="fas fa-comments"></i>','route'=>'tickets'],

    ],

  ],


  /*
    Theme specific styles
  */
  'styles'=>[
    "assets/vendors/general/bootstrap/dist/css/bootstrap.min.css",
    "assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css",
    "assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
    "admin-assets/css/sb-admin-2.min.css",
    "admin-assets/vendor/datatables/dataTables.bootstrap4.min.css",

  	//Global Mandatory Vendors
    
  ],

  /*
    Theme specific js
  */
  'js'=>[

  "admin-assets/vendor/jquery/jquery.min.js",
  "assets/vendors/general/bootstrap/dist/js/bootstrap.min.js",
  "admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
  "admin-assets/vendor/jquery-easing/jquery.easing.min.js",
  "admin-assets/js/sb-admin-2.min.js",
  "admin-assets/vendor/datatables/jquery.dataTables.min.js",
  "admin-assets/vendor/datatables/dataTables.bootstrap4.min.js",
  "admin-assets/js/demo/datatables-demo.js",
  "admin-assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
  
  
  ]

];
