

<?php

    function checkLogin() {
        session_start();
        if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] == 1){
            header('location:login.php');
        }
    }



    function connect () {
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
        return $con;
    }

    function query($connect,$sql) {
        $res = mysqli_query($connect,$sql);
        return fetch($res);
    }

    function fetch($res) {
        $arr=[];
        while($row = mysqli_fetch_assoc($res)){
            
            $arr[] = $row;
        }
        return $arr;
    }

    // function insert($connect,$tables,$arr) {
    //     $keys=array_keys($arr);
    //     $values=array_values($arr);
    //     $sqlAdd="insert into $tables (".implode(',',$keys).") values ('".implode("','",$values)."')";
    //     $insertData = mysqli_query($connect,$sqlAdd);
    //     return  $insertData;
    // }
    
?>