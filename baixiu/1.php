<?php
            $con = mysqli_connect('localhost','root','root','bd-baixiu');
            $sql =     ;
            $res = mysqli_query($con,$sql);
            $arr3 = [];
             while($row= mysqli_fetch_assoc($res)){
               $arr3[] =$row;
             }
?>