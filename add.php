<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生信息添加</title>
</head>
<body>
    <center>
        <?php
        include 'menu.php';
        require 'conn.php';
        ?>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $stu_no = $_POST['stu_no'];
            $stu_name = $_POST['stu_name'];
            $gender = $_POST['gender'];
            $telephone = $_POST['telephone'];
            $age = $_POST['age'];
            $college = $_POST['college'];
            $sql = "INSERT into stu(stu_no,stu_name,gender,telephone,age,college) values ('$stu_no','$stu_name','$gender','$telephone','$age','$college')";
            $result = $pdo->exec($sql);
            if($result > 0) {
                header('location:index.php');
            } else {
                die('添加失败');
            }
        }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>学号：</td>
                    <td><input type="text" name="stu_no" /></td>
                </tr>
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="stu_name" /></td>
                </tr>
                <tr>
                    <td>性别：</td>
                    <td>
                        男<input type="radio" name="gender" value="男" checked>
                        女<input type="radio" name="gender" value="女">
                    </td>
                </tr>
                <tr>
                    <td>电话：</td>
                    <td><input type="text" name="telephone" /></td>
                </tr>
                <tr>
                    <td>年龄：</td>
                    <td><input type="text" name="age" /></td>
                </tr>
                <tr>
                    <td>学院：</td>
                    <td><input type="text" name="college" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit">
                        <input type="reset" name="reset">
                    </td>
                </tr>
            </table>
        </form>
        
    </center>
</body>
</html>