



 <?php
  include_once './config.php';
  include_once "./function.php";
  $categoryId = $_GET['categoryId'];
  
  $con=connect();
  $sql = "SELECT p.id,p.title,p.feature,p.created,p.content,p.views,p.likes,c.`name`,u.`nickname`,
  (SELECT  COUNT(id) FROM  comments WHERE post_id=p.id) AS commentsCount    
  FROM  posts p
  LEFT JOIN categories c ON p.category_id=c.id
  LEFT JOIN users u ON u.id=p.user_id
  WHERE p.category_id= $categoryId
  ORDER BY p.created DESC
  LIMIT 20";

  header("Content-Type:text/html;charset=utf-8");


  $arr2 =query($con,$sql);

  


?>


<!DOCTYPE php>
<php lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <?php include_once 'public/_header.php' ?>
    <?php include_once 'public/_aside.php' ?>

    <div class="content">
      <div class="panel new">
        <h3><?php echo $arr2[0]['name'] ?></h3>

         <?php foreach ($arr2 as $value): ?>
            <div class="entry">
              <div class="head">
                <span class="sort"><?php echo $value['name'] ?></span>
                <a href="detail.php?postId=<?php echo $value['id']  ?> "><?php echo $value['title'] ?> </a>
              </div>
              <div class="main">
                <p class="info"><?php echo  $value['nickname'] ?> 发表于<?php echo  $value['created'] ?>  </p>
                <p class="brief"> <?php echo  $value['content'] ?> </p>
                <p class="extra">
                  <span class="reading">阅读(<?php echo  $value['views'] ?>)</span>
                  <span class="comment">评论(<?php echo  $value['commentsCount'] ?>)</span>
                  <a href="javascript:;" class="like">
                    <i class="fa fa-thumbs-up"></i>
                    <span>赞(<?php echo  $value['likes'] ?>)</span>
                  </a>
                  <a href="javascript:;" class="tags">
                    分类：<span><?php echo  $value['name'] ?></span>
                  </a>
                </p>
                <a href="javascript:;" class="thumb">
                  <img src="static/uploads/hots_2.jpg" alt="">
                </a>
              </div>
            </div>
        <?php endforeach ?>

        <div class="loadmore">
            <span class="btn">加载更多</span>
        </div>
        <!--
        
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="static/assets/vendors/jquery/jquery.min.js"></script>
  <script>
    $(function () {
      var currentPage = 1;
      $('.loadmore .btn').on('click',function () {
        //console.log(111);
         var categoryId = location.search.split('=')[1];
         currentPage++;
         $.ajax({
           type: "post",
           url: "api/_getMore.php",
           data: {
             currentPage:currentPage,
             categoryId:categoryId,
             pageSize:100,
           },
           
           success: function (res) {
             //console.log(res);
             if(res.code == 1){
               var data = res.data;
                 $.each(data,function (index,val) {
                    var str = `<div class="entry"> 
                    
                                             <div class="head"> 
                                                 <a href="detail.php?postId=${val.id}">${val.title}</a>
                                             </div> 
                                             <div class="main"> 
                                                 <p class="info">${val['nickname']} 发表于${val['created']} </p>
                                                 <p class="brief">${val['nickname']}</p>
                                                 <p class="extra"> 
                                                     <span class="reading">阅读(${val['nickname']})</span> 
                                                     <span class="comment">评论(${val['commentCount']})</span>
                                                     <a href="javascript:;" class="like"> 
                                                         <i class="fa fa-thumbs-up"></i> 
                                                         <span>赞(${val['likes']})</span>
                                                   </a>
                                                     <a href="javascript:;" class="tags"> 
                                                         分类：<span>${val['title']}</span> 
                                                   </a>
                                                 </p> 
                                               <a href="javascript:;" class="thumb"> 
                                                    <img src="static/uploads/hots_2.jpg" alt=""> 
                                                </a> 
                                            </div> 
                                            <div class="content-detail">${val['content']} </div>
                                        </div>`;

                        var entry = $(str);
                        entry.insertBefore('.loadmore');

                      var maxPage = Math.ceil(res.pageCount/100);
                      console.log(maxPage);
                      console.log(currentPage);
                      if(currentPage == maxPage){
                        $('.loadmore .btn').hide();
                      }
                 })
             }
           }
         });
      })
    })
  </script>
</body>
</php>