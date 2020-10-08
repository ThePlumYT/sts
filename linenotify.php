<!DOCTYPE html>
<html>

<head>
    <title>ยืนยันการสั่งซื้อ</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


</head>

<body background="back.png">
    <?php

    $header = "ออเดอร์ของท่าน";
    $uid = $_POST['uid'];
    $price = $_POST['price'];
    $link = $_POST['link'];
    $phone = $_POST['phone'];

    $str = $header .
        "\n" . "UID : " . $uid .
        "\n" . "เงิน : " . $price .
        "\n" . "ลิ้ง : " . $link .
        "\n" . "เบอร์ : " . $phone;


    define('LINE_API', "https://notify-api.line.me/api/notify");

    $token = "AHyqErXFataS5tbm9NVD2i7hjbubL7ghsNU2Io6i8Ln"; //ใส่Token ที่copy เอาไว้

    $succesful = "สั่งซื้อเสร็จสิ้้น";
    $res = notify_message($str, $token);
    function notify_message($message, $token)
    {
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . $token . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            ),
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API, FALSE, $context);
        $res = json_decode($result);
        
    }
    //https://havespirit.blogspot.com/2017/02/line-notify-php.html
    //https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f

    ?>
    <script>
        setTimeout(function() {
            swal({
                title: "สั่งซื้อเสร็จสิ้น",
                text: "รอดำเนินการ 15-30นาที",
                type: "success"
            }, function() {
                window.location = "https://www.saitoushop.xyz/"; //หน้าที่ต้องการให้กระโดดไป
            });
        }, 1000);
    </script>


</body>

</html>