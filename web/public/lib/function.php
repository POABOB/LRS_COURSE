<?php
if ( ! defined('PPP')) exit('非法入口');

// show msg like var_dump
function p($var)
{
	if (is_bool($var)) {
		var_dump($var);
	} else if (is_null($var)) {
		var_dump(NULL);
	} else {
		echo "<pre>".print_r($var, true)."</pre>";
	}
}

//返回 json格式資料
function json($array)
{
    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
}

//獲取 json
function post_json()
{
	$json = file_get_contents('php://input');
	return json_decode($json, true);
}


//像是 js的 find()
function array_find(array $array, callable $callback) {
    foreach ($array as $key => $value) {
        if ($callback($value, $key, $array)) {
            return $value;
        }
    }
}

function public_url($string = '/')
{
	if(strlen($string) != 1) {
		if((substr($string, 0, 1)) != '/') {
			$string = '/'.$string;
		}
	}
	return DIRNAME . $string;
}

function returnJson($name)
{
    $res= file_get_contents($name);
    header('Content-Type: application/json; charset=utf-8');
    print_r($res);
}

function get($name = 'token')
{
	return isset($_GET[$name]) ? $_GET[$name] : "";
}

function auth($token = null) 
{
    if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
        if($_SESSION['token'] == $token) {
            return true;
        } else {
            $_SESSION['token'] = null;
        }
    }
    return false;
}

function check_reset_token($name = '/') 
{
    $name = public_url('/');
    if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "X-Real-IP: " . $_SERVER['REMOTE_ADDR'] . "\r\n"
            ]
        ];
        $context = stream_context_create($opts);
        $result = json_decode(file_get_contents(BASEURL.'/user/me?token=' . $_SESSION['token'], false, $context), true);
        //token過期
        if($result["result"] != 0) {
            $_SESSION['token'] = '';
            header('location: ' . $name);
            exit();
        }
    } else {
        header('location: ' . $name);
        exit();
    }
}

// function auth()
// {
//     if (!isset($_SESSION['token']) || empty($_SESSION['token'])) {
//         logout();
//     } else {
//         //驗證API
//         $opts = [
//             "http" => [
//                 "method" => "GET",
//                 "header" => "X-Real-IP: " . $_SERVER['REMOTE_ADDR'] . "\r\n"
//             ]
//         ];
//         $context = stream_context_create($opts);
//         $result = json_decode(file_get_contents(BASEURL.'/user/me?token=' . $_SESSION['token'], false, $context), true);
//         //token過期
//         if($result["result"] != 0) {
//             logout();
//         }
//     }
// }
function login()
{
    ///登入API
    // $opts = [
    //     "http" => [
    //         "method" => "GET",
    //         "header" => "X-Real-IP: $_SERVER['REMOTE_ADDR']\r\n"
    //     ]
    // ];

    // DOCS: https://www.php.net/manual/en/function.stream-context-create.php
    // $context = stream_context_create($opts);

    //$res = file_get_contents(BASEURL.'/EmsAPI/user/login?account=' . $_GET['account'] . '&psw=' . $_GET['password'], false, $context);
	$res = file_get_contents(BASEURL.'/EmsAPI/user/login?account=' . $_GET['account'] . '&psw=' . $_GET['password']);

    //$res = file_get_contents(BASEURL.'/user/login?account=' . $_GET['account'] . '&psw=' . $_GET['password']);
    $result = json_decode($res, true);

    //token過期
    if($result["result"] == 0) {
        $_SESSION['token'] = $result['token'];
        //$_SESSION['account'] = $_GET['account'];

        $new_role = '';
        if ($result['roles'][0] == "Admins"){
            $new_role = '150'/* $result['role'] */;
        }
        elseif ($result['roles'][0] =="學校管理者") {
            $new_role = '100'/* $result['role'] */;
        }
        elseif ($result['roles'][0] =="學校管理者") {
            $new_role = '50'/* $result['role'] */;
        }
        $_SESSION['info'] = array(
            'role' => $new_role/* $result['role'] */,
            'name' => $result['name'],
            'attrs' => $result['attrs']
        );
    }
    header('Content-Type: application/json; charset=utf-8');
    print_r($res);
    exit(); 
}

function open_login($name = '/a/status-overview')
{
    //token過期
    if($_GET["result"] == 0) {
        $result = json_decode(file_get_contents(BASEURL.'/user/me?token=' . $_GET['token']), true);
        $_SESSION['token'] = $_GET['token'];

        $new_role = '';
        if ($result['roles'][0] == "Admins"){
            $new_role = '150'/* $result['role'] */;
        }
        elseif ($result['roles'][0] =="學校管理者") {
            $new_role = '100'/* $result['role'] */;
        }
        elseif ($result['roles'][0] =="學校管理者") {
            $new_role = '50'/* $result['role'] */;
        }
        $_SESSION['info'] = array(
            'role' => $new_role/* $result['role'] */,
            'name' => $result['name'],
            'attrs' => $result['attrs']
        );



        // $_SESSION['account'] = $_GET['account'];
        /*$_SESSION['info'] = array( */
            /* 'role' => '150'/* $result['role'] */
            /*'name' => $result['name'],
            'attrs' => $result['attrs']
        )*/;
        header('location: '  . public_url($name) );
    } else {
        header('location: '  . public_url('/') );
    }
    exit();
}

// function login()
// {
//     $opts = [
//         "http" => [
//             "method" => "GET",
//             "header" => "X-Real-IP: " . $_SERVER['REMOTE_ADDR'] . "\r\n"
//         ]
//     ];
//     $context = stream_context_create($opts);
//     $res = file_get_contents(BASEURL.'/user/login?account=' . $_GET['account'] . '&psw=' . $_GET['password'], false, $context);
//     $result = json_decode($res, true);

//     //token過期
//     if($result["result"] == 0) {
//         $_SESSION['token'] = $result['token'];
//         $_SESSION['account'] = $_GET['account'];
//         $_SESSION['info'] = array(
//             'role' => $result['role'],
//             'name' => $result['name'],
//             'attrs' => $result['attrs']
//         );
//     }
//     header('Content-Type: application/json; charset=utf-8');
//     print_r($res);
//     exit(); 
// }

// function open_login($name = '/a/status-overview')
// {
//     //token過期
//     if($_GET["result"] == 0) {
//         $opts = [
//             "http" => [
//                 "method" => "GET",
//                 "header" => "X-Real-IP: " . $_SERVER['REMOTE_ADDR'] . "\r\n"
//             ]
//         ];
//         $context = stream_context_create($opts);
//         $result = json_decode(file_get_contents(BASEURL.'/user/me?token=' . $_GET['token'], false, $context), true);
//         $_SESSION['token'] = $_GET['token'];
//         // $_SESSION['account'] = $_GET['account'];
//         $_SESSION['info'] = array(
//             'role' => $result['role'],
//             'name' => $result['name'],
//             'attrs' => $result['attrs']
//         );
//         header('location: '  . public_url($name) );
//     } else {
//         header('location: '  . public_url('/') );
//     }
//     exit();
// }

function logout()
{
    $_SESSION['token'] = '';
    header('location: '  . DIRNAME );
    exit(); 
}
