<?php
  $link = mysqli_connect('127.0.0.1','root','root','kaoshi');

  $page_num = 2;
  $p = empty($_GET['p'])?1:$_GET['p'];
  $limit = ($p-1)*$page_num;
  $sql2 = "select * from students limit $limit,$page_num";
  $res2 = mysqli_query($link,$sql2);
  $arr2 = mysqli_fetch_all($res2,1);

  $count = "select count(*) as num from students";
  $res3 = mysqli_query($link,$count);
  $arr3 = mysqli_fetch_assoc($res3);
  $count_num = $arr3['num'];
  $page_count = ceil($count_num/$page_num);
  $str = "";
  for($i=1;$i<=$page_count;$i++){
      $str .= "<a href='list_students.php?p=$i'>$i</a> &nbsp;&nbsp;";
  }

//   $sql = "select * from students";
//   $res = mysqli_query($link,$sql);
//   $arr = mysqli_fetch_all($res,1);
//   print_r($arr)
?>

<table border="1">
    <tr>
        <td>学生姓名</td>
        <td>班级</td>
        <td>照片</td>
        <td>学生简介</td>
        <td>操作</td>
    </tr>
    <?php foreach($arr2 as $k=>$v){ ?>
    <tr>
        <td><?php echo $v['stu_name']; ?></td>
        <td><?php echo $v['stu_class']; ?></td>
        <td><img src="<?php echo $v['stu_photo']; ?>" width="50px" height="50px" alt=""></td>
        <td><?php echo $v['stu_jieshao']; ?></td>
        <td>
            <a href="delete.php">删除</a>
            <a href="update.php">修改</a>
        </td>
    </tr>
    <?php } ?>
</table>
<?php echo $str; ?>