<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生信息更新</title>
</head>
<body>
    <center>
        <?php
        include 'menu.php';
        require 'conn.php';
        ?>
        <h2>学生信息修改</h2>
        <?php
        $stu_no = $_GET['stu_no'];
        $sql_select = "SELECT * from stu where stu_no = '$stu_no'";
        $result_select = $pdo->query($sql_select);
        $stu_select = $result_select->fetch(PDO::FETCH_ASSOC);
        // print_r($stu_select);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $stu_name = $_POST['stu_name'];
            $gender = $_POST['gender'];
            $telephone = $_POST['telephone'];
            $age = $_POST['age'];
            $college = $_POST['college'];
            // print_r($_POST);
            $sql = "UPDATE stu set stu_name='$stu_name',gender='$gender',telephone='$telephone',age='$age',college='$college' where stu_no='$stu_no'";
            $result = $pdo->exec($sql);
            if($result > 0) {
                header('location:index.php');
            } else {
                die('修改失败');
            }
        }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>学号：</td>
                    <td><input type="text" name="stu_no" value="<?php echo $stu_select['stu_no'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="stu_name" value="<?php echo $stu_select['stu_name'] ?>" /></td>
                </tr>
                <tr>
                    <td>性别：</td>
                    <td>
                        男<input type="radio" name="gender" value="男" 
                        <?php if($stu_select['gender'] == '男') echo 'checked' ?>>
                        女<input type="radio" name="gender" value="女" 
                        <?php if($stu_select['gender'] == '女') echo 'checked' ?>>
                    </td>
                </tr>
                <tr>
                    <td>电话：</td>
                    <td><input type="text" name="telephone" value="<?php echo $stu_select['telephone'] ?>" /></td>
                </tr>
                <tr>
                    <td>年龄：</td>
                    <td><input type="text" name="age" value="<?php echo $stu_select['age'] ?>" /></td>
                </tr>
                <tr>
                    <td>学院：</td>
                    <td><input type="text" name="college" value="<?php echo $stu_select['college'] ?>" /></td>
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