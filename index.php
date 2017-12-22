<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "app/autoload.php";

use AdminDesk\Auth\User\User;
use AdminDesk\Auth\Gate\Gate;
use AdminDesk\Core\View\View;
use AdminDesk\Auth\Access\Access;

$user = User::get();
Gate::enter($user, Access::allowUsers(), function(){
    View::print('desk');
});
Gate::enter($user, Access::denyUsers(), function(){
    View::print('login'); 
});
