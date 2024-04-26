<?php      
      
    $username = $_POST['firstName'];  
    $password = $_POST['password'];  
      
 $con = new mysqli('localhost','root','','test');


        $sql = "select *from registration where firstName = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
header("Location: http://localhost/e%20ration%20shop/qn.html");
        }  
        else{  
echo ("<script LANGUAGE='JavaScript'>
   
    window.location.href='http://localhost/e%20ration%20shop/login.html';
    </script>");
}
            
?>  
