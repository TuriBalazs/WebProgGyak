<?php
  include 'db_connect.php';
  $stmt = $connect->prepare('SELECT * FROM munkaado Order by mhelyid');
  $stmt->execute();
?>
<a href="createuser" class="createbtn"><button class="btn btn-primary">Add User</button></a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>mhelyid</th>
      <th>nev</th>
      <th>telepules</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
      <th><?php echo $data['mhelyid']; ?></th>
      <th><?php echo $data['nev']; ?></th>
      <td><?php echo $data['telepules']; ?></td>
      <td>
        <?php
            echo '<a href="edituser?mhelyid='.$data['mhelyid'].'"><button class="btn btn-primary">Edit</button></a> ';
            echo '<a href="deleteuser?mhelyid='.$data['mhelyid'].'"><button class="btn btn-danger">Delete</button></a>';
        ?>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>