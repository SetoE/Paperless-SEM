<?php
require 'vendor/autoload.php';

$f3 = \Base::instance();

$f3->config('app/config.ini');

$f3->config('app/routes.ini');

$f3->run();




// $f3->set('DB', new DB\SQL('mysql:host=localhost;port=3306;dbname=aai_db', 'root', ''));
// $f3->set('AUTOLOAD', 'app/classes/');

// $f3->route('GET /', function ($f3) {
//     $f3->mset(array(
//         'page_title' => 'AAI Logistics SEM',
//         'content' => 'home.htm',
//         'customers' => array(
//             'Seto' => array(
//                 (new DateTime())->format('Y-m-d H:i:s'),
//                 'something something',
//                 'something something',
//                 'Complete',
//             ),
//             'Eman' => array(
//                 (new DateTime())->format('Y-m-d H:i:s'),
//                 'something something',
//                 'something something',
//                 'Pending'
//             ),
//         ),
//     ));

//     echo \Template::instance()->render('views/layout.htm');
// });

// $f3->route('GET /login', function ($f3) {
//     $user = new \DB\SQL\Mapper($f3->get('DB'), 'user');
//     $auth = new \Auth($user, array('id' => 'username', 'pw' => 'password'));
//     $auth->basic('SEM->login');
//     // $user = new DB\SQL\Mapper($f3->get('DB'), 'user');
//     // $user->username = 'admin';
//     // $user->password = password_hash('Admin@12345', PASSWORD_DEFAULT);
//     // $user->created_on = (new DateTime())->format('Y-m-d H:i:s');
//     // $user->role = 'Admin';
//     // $user->save();
// });

// $f3->route('POST /order/all [ajax]', 'SEM->fetchOrders');

// $f3->route('POST /register', function ($f3) {
//     $f3->set('page_title', 'Register');
//     $f3->set('content', 'register.htm');
//     echo \Template::instance()->render('views/layout.htm');
// });
// $f3->set('DEBUG', 3);
// $f3->run();
