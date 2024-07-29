<?php

$config2['base_url'] = site_url('master/datamaster'); //site url
$config2['per_page'] = 5;  //show record per halaman

//styling


$config2['first_link']       = 'First';
$config2['last_link']        = 'Last';
$config2['next_link']        = 'Next';
$config2['prev_link']        = 'Prev';
$config2['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
$config2['full_tag_close']   = '</ul></nav></div>';
$config2['num_tag_open']     = '<li class="page-item"><span class="page-link">';
$config2['num_tag_close']    = '</span></li>';
$config2['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
$config2['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
$config2['next_tag_open']    = '<li class="page-item"><span class="page-link">';
$config2['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
$config2['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
$config2['prev_tagl_close']  = '</span>Next</li>';
$config2['first_tag_open']   = '<li class="page-item"><span class="page-link">';
$config2['first_tagl_close'] = '</span></li>';
$config2['last_tag_open']    = '<li class="page-item"><span class="page-link">';
$config2['last_tagl_close']  = '</span></li>';
$config2['attributes'] = array('class => page-link');
