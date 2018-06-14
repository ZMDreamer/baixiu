
<?php
    $con =mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
    $sql = "SELECT * FROM categories WHERE id!=1";
    $res = mysqli_query($con,$sql);

    $arr=[];
    while($row=mysqli_fetch_assoc($res)){
        $arr[]=$row;
    }

?>



<div class="header">
      <h1 class="logo"><a href="index.php"><img src="static/assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
      <?php foreach($arr as  $key =>$value ):?>
            <li><a href="../list.php?categoryId=<?php echo $value['id'] ?>"><i class="fa <?php echo $value['classname'] ?>"></i><?php echo $value['name'] ?></a></li>
        <?php endforeach?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
          </form>
      </div>
      <div class="slink">
        <a href="javescript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
        
   </div>