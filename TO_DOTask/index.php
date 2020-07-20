
<?php

  $errors = "";

  //connect db
  $connect = mysqli_connect('localhost', 'root', '', 'todolist');

  if(isset($_POST['submit'])) {
    $list = $_POST['list'];
    if(empty($list)){
      // check text fill
      $errors = "กรุณากรอกข้อมูลรายการ";
    }else {
      // query db
      mysqli_query($connect, "INSERT INTO mylist (List) VALUES ('$list')");
      header('location: index.php');
    }
  }
  else if(mysqli_connect_error($connect)){
    echo 'connect failed';
  }

  //delete listTask
  if (isset($_GET['delete_list'])) {
    $ID = $_GET['delete_list'];
    mysqli_query($connect, "DELETE FROM mylist WHERE ID = $ID");
    header('location: index.php');
  }

  $list = mysqli_query($connect, "SELECT * FROM mylist");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> To-Do List Test </title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <div class="heading">
      <h2> CREATE YOUR LIST </h2>
      <h4> สร้างรายการที่ต้องทำของคุณ </h4>
    </div>

    <form action="index.php" method="post">
      <?php if (isset($errors)) { ?>
        <p> <?php echo $errors; ?> </p>
      <?php } ?>
      <input type="text" name="list" class="list_input">
      <button type="submit" class="list_btn" name="submit"> ADD YOUR LIST </button>
    </form>

    <table>
      <thread>
        <tr>
          <th> No. </th>
          <th> Your List </th>
          <th> </th>
        </tr>
      </thread>

      <tbody>

        <?php /*show mylist*/ $i = 1; while($row = mysqli_fetch_array($list)){ ?>
          <tr>
            <td> <?php echo $i;?> </td>
            <td class="listTask"> <?php echo $row['List'];?> </td>
            <td class="delete">
                <a href= "index.php?delete_list=<?php echo $row['ID'];?>"> DELETE </a>
            </td>
          </tr>
        <?php $i++; } ?>

      </tbody>

    </table>

  </body>
</html>
