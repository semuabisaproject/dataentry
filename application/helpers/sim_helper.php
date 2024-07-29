<?php

function is_logged_in()
{
    
    $sim = get_instance();
    $verif= $sim->db->get_where('user', 'verifikasi');
    if (!$sim->session->userdata('email') and $verif === 1) {
        redirect('auth');
    } else {
        $role_id = $sim->session->userdata('role_id');
        $menu = $sim->uri->segment(1);
        $queryMenu = $sim->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $sim->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/logout');
        }
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}


function order_kurir($refnum, $parid)
{
    $ci = get_instance();

    $ci->db->where('reference_number', $refnum);
    $ci->db->where('parcel_id', $parid);
    $result = $ci->db->get('parcel_tracks');

    if ($result->num_rows() > 0) {
        return $result;
    }
}



