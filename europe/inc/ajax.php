<?php 
/** 
 * Тут будут хранится все ajax-запросы
 */


/**
 * Отправка обратной связи в телеграмм
 */
add_action( 'wp_ajax_send_modal_leed', 'send_modal_leed' );
add_action( 'wp_ajax_nopriv_send_modal_leed', 'send_modal_leed' );

function send_modal_leed(){
    $res = ['success' => true];

    $url = 'https://api.telegram.org/bot6681287357:AAG2v9iKhXAo6tW54B3rgHYNkI7tb8QoS-U/sendMessage?chat_id=-1002191799458&parse_mode=html&text=';

    $nonce = isset($_POST['nonce']) ? $_POST['nonce'] : null;

    if(!wp_verify_nonce($nonce, 'send_leed')){
        $res['success'] = false;
        echo json_encode($res);
        die();
    }

    $name  = isset($_POST['name'])  ? $_POST['name']  : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    $str = "<b>Новая заявка!</b>%0A<b>Имя:</b>" . urlencode($name) . "%0A<b>Почта:</b>" . urlencode($email) . "%0A";

    $res['url'] = $url.$str;
    $res['data'] = file_get_contents($url.$str);

    
    echo json_encode($res);
    die();
}
