
<?php 

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->

    <?php  include_once "public/_header.php" ?>

    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
       <div class="alert alert-danger" style="display:none">
        <strong id="msg">发生XXX错误</strong>
      </div> 
      <div class="row">
        <div class="col-md-4">
          <form id="data">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <!-- <p class="help-block">https://zce.me/category/<strong>slug</strong></p> -->
            </div>
            <div class="form-group">
              <label for="slug">类名</label>
              <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
              <!-- <p class="help-block">https://zce.me/category/<strong>slug</strong></p> -->
            </div>
            <div class="form-group">
              <!-- <button class="btn btn-primary" type="button">添加</button> -->
              <input  type="button" id="btn-add" value="添加" class="btn btn-primary">
                <input  style="display: none;" type="button" id="btn-edit" value="编辑完成" class="btn btn-primary">
                <input  style="display: none;" type="button" id="btn-cancel" value="取消编辑" class="btn btn-primary">
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>类名</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>

            <tbody>
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
  <?php $current_page="categories" ?>
  <!-- <div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.html"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="posts.html">所有文章</a></li>
          <li><a href="post-add.html">写文章</a></li>
          <li class="active"><a href="categories.html">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.html"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.html"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.html">导航菜单</a></li>
          <li><a href="slides.html">图片轮播</a></li>
          <li><a href="settings.html">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->
  <?php  include_once "public/_aside.php" ?>

  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
    $(function () {
          $.ajax({
              type: "post",
              url: "../api/_getCategoryData.php",
              dataType: "json",
              success: function (res) {
             //   console.log(res)
                if(res.code == 1 ){
                  var str= "";
                  var data = res.data;
                  $.each(data,function (i,val){
                    str+='<tr>\
                    <td class="text-center"> <input type="checkbox"></td>\
                    <td>'+val.name+'</td>\
                    <td>'+val.slug+'</td>\
                    <td>'+val.classname+'</td>\
                    <td class="text-center">\
                      <a href="javascript:;" data-category-id="'+val.id+'"  class="btn btn-info btn-xs" id="edit">编辑</a>\
                      <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
                    </td>\
                  </tr>'
                  });
               //  $(str).appendTo($('tbody'));
               $('tbody').append($(str));
                }
              }
          });
          //增加
          $('#btn-add').on('click',function () {
            console.log(111)
                var name = $('#name').val();
                console.log(name);
                var slug = $('#slug').val();
                var classname = $('#classname').val();
            if(name == ""){
              $('#msg').text('数据不能为空');
              $('.alert').show();
              return;
            } else {
              $('.alert').hide()
            }
            if(slug == ""){
              $('#msg').text('别名不能为空');
              $('.alert').show();
              return;
            } else {
              $('.alert').hide()
            }
            if(classname == ""){
              $('#msg').text('类名不能为空');
              $('.alert').show();
              return;
            } else {
              $('.alert').hide()
            }
                $.ajax({
                  type: "post",
                  url: "../api/_addCategory.php",
                  data: $('#data').serialize(),
                  dataType: "json",
                  success: function (res) {
                    console.log(res)
                    if(res.code == 1){
                      location.reload();
                    }

                  }
                });
          })
          //点击编辑
          $('tbody').on('click',"#edit",function () {
            var category = $(this).data('categoryId');
            console.log(category,888)
            $('#btn-edit').attr('data-categoryId',category)
            console.log(111);
            $('#btn-add').hide();
            $('#btn-edit').show();
            $('#btn-cancel').show();
            //取数据
            var name = $(this).parent('td').siblings().eq(1).text();
          //  console.log(name)
            var slug = $(this).parent('td').siblings().eq(2).text();
            var classname = $(this).parent('td').siblings().eq(3).text();
            //把数据放进去
            $('#name').val(name);
            $('#slug').val(slug);
            $('#classname').val(classname);
          })

          //点击完成编辑
          $('#btn-edit').on('click',function () {
            var category=$(this).attr("data-categoryId");
            console.log(category);
                var name = $('#name').val();
                var slug = $('#slug').val();
                var classname = $('#classname').val();
                console.log(name)
                if(name == ""){
              $('#msg').text('数据不能为空');
              $('.alert').show();
              return;
            } else {
              $('.alert').hide()
            }
            if(slug == ""){
              $('#msg').text('别名不能为空');
              $('.alert').show();
              return;
            } else {
              $('.alert').hide()
            }
            if(classname == ""){
              $('#msg').text('类名不能为空');
              $('.alert').show();
              return;
            } else {
              $('.alert').hide()
            }



                $.ajax({
                type: "post",
                url: "../api/_updateCategory.php",
                data: $('#data').serialize()+'&&'+'id'+'='+category,
                dataType: "json",
                success: function (res) {
                  console.log(res)
                  if(res.code == 1){
                     $('#btn-add').show();
                     $('#btn-edit').hide()
                     $('#btn-cancel').hide();
                     location.reload(true);
                  }
                }
              });
          })

         
    })
    
  </script>
</body>
</html>
