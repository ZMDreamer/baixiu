

<?php
    require_once "../config.php";
    require_once "../function.php";

    $name = $_POST["name"];
    $connect = connect();
    $sql="select count(*) as  count from categories where name = '{$name}'";
    $countResult = query($connect,$sql);


    $count=$countResult[0]['count'];
    $response = ["code"=>0,"msg"=>"操作失败"];

    if($count>0){
        $response["msg"] = "分类名称已经存在，不能重复添加";
    }else{
        $keys=array_keys($_POST);
        $values=array_values($_POST);
        $sqlAdd="insert into categories (".implode(',',$keys).") values ('".implode("','",$values)."')";
        $addResult=mysqli_query($connect,$sqlAdd);

        if($addResult){
            $response["code"]=1;
            $response["msg"]="操作成功";
        };
    };
    
    header("Content-Type:application/json;charset=utf-8");
    
    echo  json_encode($response);

?>