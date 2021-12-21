<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <label for="tanggal" class="col-form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
          </div>
          <div class="form-group">
          <label for="keterangan" class="col-form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
          </div>
          <div class="form-group">
          <label for="ref" class="col-form-label">Refr</label>
            <input type="text" name="ref" class="form-control">
          </div>
          <div class="form-group">
          <label for="debit" class="col-form-label">Debit</label>
            <input type="number" name="debit" class="form-control">
          </div>
          <div class="form-group">
          <label for="kredit" class="col-form-label">Kredit</label>
            <input type="number" name="kredit" class="form-control">
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Save Transaction">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Refr</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM transaksi";
          $result = mysqli_query($conn, $query);    
          $no=1;
          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $no++?> </td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['keterangan']; ?></td>
            <td><?php echo $row['ref']; ?></td>
            <td><?php echo "Rp. ".$row['debit']; ?></td>
            <td><?php echo "Rp. ".$row['kredit']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
