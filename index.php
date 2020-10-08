<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>สั่งซื้อ</title>

    <style>
        input {
            border: 1px solid #ccc;
            width: 200px;
            padding: 10px;
            margin: 5px 15px;
            border-radius: 5px;
        }

        .send {
            width: 220px;
        }
    </style>
</head>

<body background="back.png">

    <form align="center" action="linenotify.php" method="post">
        <input class='required' name='uid' placeholder='UID ในเกม' type='text'>
        <br>
        <input class='required' name='price' placeholder='จำนวนเงินที่โอนมา' type='text'>
        <br>
        <input class='required' name='link' placeholder='เลขอ้างอิง 5 ตัวหลัง' type='text'>
        <br>
        <input class='required' name='phone' placeholder='เบอร์โทรศัพท์' type='text'>
        <br>
        <input class='send' name="submit" type='submit' value='สั่งซื้อ'>

    </form>



</body>

</html>