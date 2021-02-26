<?php

   $stu_name = $_POST['stu_name'];
   $stu_class = $_POST['stu_class'];
   $stu_jieshao = $_POST['stu_jieshao'];
   $stu_time = date('y-m-d h:i:s',time());

   if(empty($stu_name)){
       echo "学生姓名不能为空!";exit;
   }

   if(empty($stu_jieshao)){
       echo "学生介绍不能为空!";exit;
   }
   
   $stu_photo = $_FILES['stu_photo'];
//    var_dump($stu_photo);
   $path = "./images".$stu_photo['name'];
   $res = move_uploaded_file($stu_photo['tmp_name'],$path);

   $link = mysqli_connect('127.0.0.1','root','root','kaoshi');
   $sql = "insert into students (stu_name,stu_class,stu_photo,stu_jieshao,stu_time) values ('$stu_name','$stu_class','$path','$stu_jieshao','$stu_time')";
   $res = mysqli_query($link,$sql);

   if($res){
       echo "添加成功";
       header("refresh:2,url='list_students.php'");
   }else{
       echo "添加失败";
       header("refresh:2,url='students.html'");
   }
   
?>