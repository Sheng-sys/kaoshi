<?php

   $username = $_POST['username'];
   $pwd = $_POST['pwd'];

//    print_r($_POST);

   $link = mysqli_connect('127.0.0.1','root','root','kaoshi');
   $sql = "select * from user where username = '$username'";
//    print_r($sql);
   $res = mysqli_query($link,$sql);
//    var_dump($res);
   $arr = mysqli_fetch_assoc($res);
//    print_r($arr);exit;

   if($username == $arr['username']){
       if($pwd == $arr['pwd']){
           $response = [
              'erron' => 0,
              'mgs' => '恭喜了登陆成功!'
           ];
       }
   }else{
        $response = [
            'erron' => 40004,
            'mgs' => '用户名或密码错误!'
        ];
   }

   echo json_encode($response);
?>