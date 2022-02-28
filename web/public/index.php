<?php 
//設定父層目錄名稱
define('DIRNAME', '');
define('BASEURL','http://localhost:8080');
//定義
define('PPP', realpath('./'));
define('URL','');
define('PUBLICS', PPP.'/public');
define('LOG', PPP.'/log');

define('DEBUG', true);
if(DEBUG) {
    ini_set('display_error', 'On');
    error_reporting(E_ALL | E_STRICT);
} else {
	ini_set('display_error', 'Off');
}

header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Origin: http://localhost:8080');
// header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token');

//避免cookie被client修改&時區
ini_set("session.cookie_httponly", 1);
date_default_timezone_set("Asia/Taipei");
session_start();

//引入 lib
include_once PPP . '/lib/function.php';
include_once PPP . '/lib/class.Router.php';
include_once PPP . '/lib/class.Model.php';

//DB
use Medoo\Medoo;
$database = new Medoo([
    'type' => 'sqlite',
    'database' => PPP . '/data/db.db'
]);

//路由
$router = new \Bramus\Router\Router();

$router->get('/', function() { 
    require(PUBLICS . '/index.html');
 });


$router->before('GET|POST', '/api/students\-.*', function() {
    $headers = apache_request_headers();
    $token = explode(" ", $headers['Authorization']);
    $return = auth($token[1]);
    if(!$return) {
        $data = ['status' => 508, 'data' => null, 'message' => 'not login yet'];
        json($data);
        exit();
    }
});
// $router->before('GET|POST', '/change/password', function() {
//     $headers = apache_request_headers();
//     $token = explode(" ", $headers['Authorization']);
//     $return = auth($token[1]);
//     if(!$return) {
//         $data = ['status' => 508, 'data' => null, 'message' => 'not login yet'];
//         json($data);
//         exit();
//     }
// });
 //api
$router->mount( '/api', function() use ($router, $database) {

    $router->post('/login', function() use ($database) {
		$post = post_json();
        $data = $database->has('Teacher', ['account' => $post['account'], 'password' => md5($post['password'])]);
        if($data == true) {
            $token = hash('sha256', date('Y-m-d H:i:s') . '@(*H*(HD!&^*DG^EFKJHFA<SJHF&*(#Y$*&@(!##$REAFDASDFSADSAd');
            $_SESSION['token'] = $token;
            $return = ['status' => 200, 'data' => ['token' => $token], 'message' => 'login success'];
        } else {
            $return = ['status' => 400, 'data' => null, 'message' => 'login failed'];
        }
        json($return);
    });

    $router->post('/password/change', function() use ($database) {
        $post = post_json();
        $database->update('Teacher', ['password' => md5($post['password'])], ['account' => $post['account']]);
        $err = $database->errorInfo;
        if($err == null) {
			$return = ['status' => 200, 'data' => null, 'message' => '更新密碼成功'];
		} else {
            $return = ['status' => 400, 'data' => null, 'message' => '更新密碼失敗!'];
        }
        json($return);
    });

    $router->get('/logout', function() {
        $_SESSION['token'] = null;
        $return = ['status' => 200, 'data' => [], 'message' => 'logout success'];
        json($return);
    });

    $router->mount( '/students', function() use ($router, $database) {
        $router->get('/list', function() use ($database) {
            $data = $database->select('Student', '*', 1);
            $return = ['status' => 200, 'data' => $data, 'message' => ''];
            json($return);
        });
    
        $router->post('/update', function() use ($database) {
            $post = post_json();
            $database->update('Student', 
                [
                    'name' => $post['name'],
                    'grade' => $post['grade'],
                    'gender' => $post['gender'],
                    'type' => $post['type'],
                ],
                [
                    'id' => $post['id'],
                ]
            );
            $err = $database->errorInfo;
            if($err == null) {
                $return = ['status' => 200, 'data' => null, 'message' => '學生更新成功'];
            } else {
                $return = ['status' => 400, 'data' => null, 'message' => '學生更新失敗!'];
            }
            json($return);
        });
    
        $router->post('/insert', function() use ($database) {
            $post = post_json();
            $database->insert('Student', 
                [
                    'name' => $post['name'],
                    'grade' => $post['grade'],
                    'gender' => $post['gender'],
                    'type' => $post['type'],
                ]
            );
            $err = $database->errorInfo;
            if($err == null) {
                $return = ['status' => 200, 'data' => null, 'message' => '學生新增成功'];
            } else {
                $return = ['status' => 400, 'data' => null, 'message' => '學生新增失敗!'];
            }
            json($return);
        });

        $router->post('/insert/xlsx', function() use ($database) {
            $post = post_json();
            $insert = [];
            foreach ($post as $key => $value) {
                $insert[] = [
                    'name' => $post[$key]['name'],
                    'grade' => $post[$key]['grade'],
                    'gender' => $post[$key]['gender'],
                    'type' => $post[$key]['type'],
                ];
            }
            // p($insert);exit;
            $database->insert('Student',$insert);
            $err = $database->errorInfo;
            if($err == null) {
                $return = ['status' => 200, 'data' => null, 'message' => '學生匯入成功'];
            } else {
                $return = ['status' => 400, 'data' => null, 'message' => '學生匯入失敗!'];
            }
            json($return);
        });
    
        $router->delete('/delete', function() use ($database) {
            $post = array();
            $post = post_json();
            $return = $database->delete('Student', ['id' => $post['id']]);
            if($return) {
                $return = ['status' => 200, 'data' => null, 'message' => '學生刪除成功'];
            } else {
                $return = ['status' => 400, 'data' => null, 'message' => '學生刪除失敗!'];
            }
            json($return);
        });
    });

});

// $router->before('GET|POST', '/u\-.*', function() { auth(); });


$router->set404(function() { header('HTTP/1.1 404 Not Found'); });
$router->run();
exit();