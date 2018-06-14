<?php
    include_once "../config.php";
    include_once "../function.php";

 
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $classname = $_POST['classname'];
    $id = $_POST['id'];

    $connect =  connect();
    $sql= "UPDATE categories  SET NAME='$name',slug='$slug',classname='$classname'  WHERE id = $id";
    $result = mysqli_query($connect,$sql);
    $result=mysqli_query($connect,$sql);
    $response=["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response["code"]=1;
        $response["msg"]="操作成功";
    };
    
     header("Content-Type:application/json;charset=utf-8");
     echo  json_encode($response);

?>

