


<?php
    include_once "../config.php";
    include_once "../function.php";
    session_start();
    $user_id = $_SESSION["user_id"];
    $con =connect();
    $sql = "select * from users where id = {$user_id}";
    $res = query($con,$sql);
    $response = ["code"=> 0 ,"msg"=> "操作失败"];
    if($res){
        $response["code"]=1;
        $response["msg"]="操作成功";
        $response["avatar"]=$res[0]['avatar'];
        $response["nickname"]=$res[0]['nickname'];
    }
    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

?>