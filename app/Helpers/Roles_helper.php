<?php

if(!function_exists('RoleWiseSidebar')) {
    
    function RoleWiseSidebar(){
        if(session()->get('role') == 'admin' || session()->get('role') == 'super-admin')
        echo view('templates/asidebar');
        else
        if(session()->get('role') == 'staff')
        echo view('staff/sidebar');
        else
        if(session()->get('role') == 'customer')
        echo view('customer/sidebar');
    }
}


if(!function_exists('RoleWiseURL')) {
    
    function RoleWiseURL(){
        if(session()->get('role') == 'admin' || session()->get('role') == 'super-admin')
        return "admin/";
        else
        if(session()->get('role') == 'staff')
        return "home/";
        else
        if(session()->get('role') == 'customer')
        return "dashboard/";
    }
}