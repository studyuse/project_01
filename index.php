<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生信息浏览</title>
    <style>
        table {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <center>
        <?php
        include 'menu.php';
        require 'conn.php';
        ?>
        <?php
        $sql = "SELECT * from stu";
        if (isset($_GET['select_content'])) {
            $select_content = $_GET['select_content'];
            $sql = "SELECT * from stu where stu_no like '%$select_content%' or stu_name like '%$select_content%' or gender like '%$select_content%' or telephone like '%$select_content%' or age like '%$select_content%' or college like '%$select_content%'";
        }
        $result = $pdo->query($sql);
        $stu_arr = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <form action="" method="GET">
            <input type="text" name="select_content" placeholder="请输入关键字查询" width="200">
            <input type="submit" value="查询">
        </form>
        <table border='1' width='800'>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>电话</th>
                <th>年龄</th>
                <th>学院</th>
                <th colspan="2">操作</th>
            </tr>
            <?php
            foreach ($stu_arr as $student) {
                echo "<tr>";
                echo "<td>{$student['stu_no']}</td>";
                echo "<td>{$student['stu_name']}</td>";
                echo "<td>{$student['gender']}</td>";
                echo "<td>{$student['telephone']}</td>";
                echo "<td>{$student['age']}</td>";
                echo "<td>{$student['college']}</td>";
                echo "<td><a href='update.php?stu_no={$student['stu_no']}'>修改</a></td>";
                echo "<td><a href='delete.php?stu_no={$student['stu_no']}'>删除</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>