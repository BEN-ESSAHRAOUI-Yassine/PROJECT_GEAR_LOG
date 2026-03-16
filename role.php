<?php

function isAdmin(){
return $_SESSION['role'] === 'Admin';
}

function isTechnician(){
return $_SESSION['role'] === 'Technician';
}

function isGuest(){
return $_SESSION['role'] === 'Guest';
}

function canEditAssets(){
return isAdmin() || isTechnician();
}

function canManageUsers(){
return isAdmin();
}