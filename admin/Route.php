<?php
// Admin Роуты
$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('admin-auth', '/admin/auth/', 'LoginController:adminAuth', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');
