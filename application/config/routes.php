<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'page';
$route['404_override'] = 'page/nf';
$route['translate_uri_dashes'] = FALSE;

// Routing
// $route['page/kategori/(:any)']
// page/kategori/(:any) itu link yang di akses sama client
// (:any) artinya lu mau nerima data teks atau angka di http://localhost/goodtest/page/kategori/data
// page/kategori/$1
// page itu nama Controllernya
// kategori nama functionnya
// $1 itu artinya data pertama di $route['page/kategori/(:any)'] karena bisa banyak
// contoh $route['page/kategori/(:any)/obat/(:any)'] ini contoh 2 data
// kaya manipulasi linknya yak
// ini kan angka sama huruf, kalau angka atau huruf aja bisa? bisa tapi gw lupa namanya
// angka aja num
// huruf aja keknya harus pakai regex jadi mending pakai (:any) kalau huruf
// ba semisal kaya http://localhost/goodtest/page/d_artikel/5 
// nah angka 5nya mau di ialngin bisa tapi masih dibisa diakses? make routing juga?
/// fungsi angka 5 itu buat id artikel 5 kan?  iya ngga bisa yak berarti kgk bisa paling pakai slug jadi judul artikel jadi
// pengganti angka 5, slug tuh apaan
// Judul : Ketahui 5 Penyakit yang Ditandai dengan Sakit Tenggorokan
// Slug : Ketahui-5-Penyakit-yang dan seterusnyna pakai - 
// nah iya itu ba gimana dah bikin slug kek gitu di database yak
// iya di simpen di db slugnya gw cek di ci udh ada bawaan library untuk artikel / news lu bisa manfaatin itu
// coba liat



$route['403'] = 'page/ad';
$route['404'] = 'page/nf';
$route['coming-soon'] = 'page/coming_soon';

$route['buat-janji'] = 'page/b_janji';
$route['buat-janji-covid'] = 'page/b_janji_covid';

$route['layanan-labotarium'] = 'page/l_labo';
$route['layanan-covid'] = 'page/l_covid';
$route['layanan-apotek'] = 'page/l_apotek';
$route['dokter'] = 'page/l_dokter';
$route['selesai'] = 'page/selesai';

$route['dokter/(:any)'] = 'page/d_dokter/$1';
$route['artikel/(:any)'] = 'page/d_artikel/$1';
$route['artikel'] = 'page/artikel';
$route['obat/(:any)'] = 'page/kategori/$1';
$route['detail-obat/(:any)'] = 'page/d_obat/$1';
$route['detail-layanan/(:any)'] = 'page/d_labo/$1';
$route['detail-layanan-covid/(:any)'] = 'page/d_covid/$1';
