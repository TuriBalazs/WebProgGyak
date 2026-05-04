<?php
  include __DIR__ . '/../../db.php';
  $stmt = $pdo->prepare('SELECT * FROM munkaado Order by mhelyid');
  $stmt->execute();
  $users = $stmt->fetchAll();
?>
<<<<<<< Updated upstream
<div class="mb-4">    
  <a href="createuser" class="createbtn"><button class="btn btn-primary">Új felhasználó</button></a>
</a>
</div>
<div class="table-container">
  <table class="table table-bordered table-striped table-hover">    
    <thead class="table-dark">        
      <tr>            
        <th scope="col" width="100">ID</th>            
        <th scope="col">Név</th>            
        <th scope="col">Település</th>            
        <th scope="col" width="200">Műveletek</th>        
      </tr>    
    </thead>    
    <tbody>        
      <?php if (empty($users)): ?>        
        <tr>            
          <td colspan="4" class="text-center py-4 text-muted">Nincs adat a táblában

          </td>        
        </tr>        
        <?php else: ?>
          <?php foreach($users as $data): ?>            
          <tr>                
            <th scope="row" class="align-middle"><?= $data['mhelyid'] ?>
        </th>                
        <td class="align-middle"><?= htmlspecialchars($data['nev']) ?>
      </td>                
      <td class="align-middle"><?= htmlspecialchars($data['telepules']) ?>
    </td>               
     <td class="align-middle">                    
      <a href="?edituser&mhelyid=<?= $data['mhelyid'] ?>" class="btn btn-sm btn-outline-primary" title="Szerkesztés">   Szerkeszt  

      </a>                    
      <a href="?deleteuser&mhelyid=<?= $data['mhelyid'] ?>" class="btn btn-sm btn-outline-danger"  onclick="return confirm('Biztosan törölni szeretnéd?\n' + 'Név: <?= addslashes($data['nev']) ?>')" title="Törlés">  Töröl   
        
      </a>  
    </td>    
  </tr>    
    <?php endforeach; ?>   
    <?php endif; ?>    
=======
<a href="createuser" class="createbtn"><button class="btn btn-primary">Add User</button></a>
<table class="table table-bordered w-75">
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
>>>>>>> Stashed changes
  </tbody>
</table>
</div>