<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/* Auth */
$route['login'] = 'Auth/login';
$route['login_process'] = 'Auth/login_process';
$route['registrasi'] = 'Auth/registration';
$route['register_process'] = 'Auth/register_process';

/* Admin */
$route['admin_side'] = 'admin/App/login';
$route['admin_side/login_process'] = 'admin/App/login_process';
$route['admin_side/launcher'] = 'admin/App/launcher';
$route['admin_side/beranda'] = 'admin/App/home';
$route['admin_side/menu'] = 'admin/App/menu';
$route['admin_side/log_aktifitas'] = 'admin/App/log_activity';
$route['admin_side/hapus_aktifitas/(:any)'] = 'admin/App/hapus_aktifitas/$1';
$route['admin_side/cleaning_log'] = 'admin/App/cleaning_log';
$route['admin_side/tentang_aplikasi'] = 'admin/App/about';
$route['admin_side/bantuan'] = 'admin/App/helper';
$route['admin_side/profil'] = 'admin/App/profile';
$route['admin_side/kata_sandi'] = 'admin/App/password';
$route['admin_side/perbarui_profil'] = 'admin/App/perbarui_profil';
$route['admin_side/perbarui_kata_sandi'] = 'admin/App/perbarui_kata_sandi';
$route['admin_side/logout'] = 'admin/App/logout';

$route['admin_side/administrator'] = 'admin/Master/data_administrator';
$route['admin_side/tambah_data_admin'] = 'admin/Master/tambah_data_administrator';
$route['admin_side/simpan_data_admin'] = 'admin/Master/simpan_data_administrator';
$route['admin_side/detail_data_admin/(:any)'] = 'admin/Master/detail_data_administrator/$1';
$route['admin_side/ubah_data_admin/(:any)'] = 'admin/Master/ubah_data_administrator/$1';
$route['admin_side/perbarui_data_admin'] = 'admin/Master/perbarui_data_administrator';
$route['admin_side/atur_ulang_kata_sandi_admin/(:any)'] = 'admin/Master/atur_ulang_kata_sandi_admin/$1';
$route['admin_side/hapus_data_admin/(:any)'] = 'admin/Master/hapus_data_administrator/$1';

$route['admin_side/data_anggota'] = 'admin/Master/data_anggota';
$route['admin_side/tambah_data_anggota'] = 'admin/Master/tambah_data_anggota';
$route['admin_side/simpan_data_anggota'] = 'admin/Master/simpan_data_anggota';
$route['admin_side/atur_ulang_kata_sandi_anggota/(:any)'] = 'admin/Master/reset_password_member_account/$1';
$route['admin_side/hapus_data_anggota/(:any)'] = 'admin/Master/hapus_data_anggota/$1';

$route['admin_side/kategori_berita'] = 'admin/Master/kategori_berita';
$route['admin_side/tambah_kategori_berita'] = 'admin/Master/tambah_kategori_berita';
$route['admin_side/simpan_kategori_berita'] = 'admin/Master/simpan_kategori_berita';
$route['admin_side/detail_kategori_berita/(:any)'] = 'admin/Master/detail_kategori_berita/$1';
$route['admin_side/perbarui_kategori_berita'] = 'admin/Master/perbarui_kategori_berita';
$route['admin_side/hapus_kategori_berita/(:any)'] = 'admin/Master/hapus_kategori_berita/$1';

$route['admin_side/berita'] = 'admin/Master/berita';
$route['admin_side/tambah_berita'] = 'admin/Master/tambah_berita';
$route['admin_side/simpan_berita'] = 'admin/Master/simpan_berita';
$route['admin_side/detail_berita/(:any)'] = 'admin/Master/detail_berita/$1';
$route['admin_side/perbarui_berita'] = 'admin/Master/perbarui_berita';
$route['admin_side/hapus_berita/(:any)'] = 'admin/Master/hapus_berita/$1';

$route['admin_side/komen_berita'] = 'admin/Master/komen_berita';
$route['admin_side/comment_approved/(:any)'] = 'admin/Master/comment_approved/$1';
$route['admin_side/detail_komen/(:any)'] = 'admin/Master/detail_komen/$1';
$route['admin_side/hapus_komentar/(:any)'] = 'admin/Master/hapus_komentar/$1';

$route['admin_side/event'] = 'admin/Master/event';
$route['admin_side/tambah_event'] = 'admin/Master/tambah_event';
$route['admin_side/simpan_event'] = 'admin/Master/simpan_event';
$route['admin_side/detail_event/(:any)'] = 'admin/Master/detail_event/$1';
$route['admin_side/perbarui_event'] = 'admin/Master/perbarui_event';
$route['admin_side/hapus_event/(:any)'] = 'admin/Master/hapus_event/$1';

$route['admin_side/subscriber'] = 'admin/Master/subscriber';

$route['admin_side/kritik_saran'] = 'admin/Report/kritik_saran';

$route['admin_side/iklan'] = 'admin/Setting/iklan';
$route['admin_side/tambah_iklan'] = 'admin/Setting/tambah_iklan';
$route['admin_side/simpan_iklan'] = 'admin/Setting/simpan_iklan';
$route['admin_side/detail_iklan/(:any)'] = 'admin/Setting/detail_iklan/$1';
$route['admin_side/perbarui_iklan'] = 'admin/Setting/perbarui_iklan';
$route['admin_side/hapus_iklan/(:any)'] = 'admin/Setting/hapus_iklan/$1';

/* Public */
$route['kategori'] = 'User/kategori';
$route['news_detail/(:any)'] = 'User/detail/$1';
$route['news_detail'] = 'User/detail';
$route['kategori/(:any)'] = 'User/kategori/$1';
$route['event_detail/(:any)'] = 'User/event_detail/$1';
$route['event_detail'] = 'User/event_detail';
$route['about'] = 'User/about';
$route['contact'] = 'User/contact';
$route['save_subscriber'] = 'User/save_subscriber';
$route['save_comment'] = 'User/save_comment';
$route['save_issue'] = 'User/save_issue';
$route['searching'] = 'User/searching';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8