<?php
include("db.php");
$tanggal = '';
$keterangan= '';
$ref= '';
$debit= '';
$kredit= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM transaksi WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $tanggal = $row['tanggal'];
    $keterangan = $row['keterangan'];
    $ref = $row['ref'];
    $debit = $row['debit'];
    $kredit = $row['kredit'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $tanggal = $_POST['tanggal'];
  $keterangan = $_POST['keterangan'];
  $ref = $_POST['ref'];
  $debit = $_POST['debit'];
  $kredit = $_POST['kredit'];

  $query = "UPDATE transaksi set tanggal = '$tanggal', keterangan = '$keterangan', ref = '$ref', debit = '$debit', kredit = '$kredit' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Transaction Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="tanggal" type="date" class="form-control" value="<?php echo $tanggal; ?>" placeholder="Update Tanggal">
        </div>
        <div class="form-group">
          <input name="keterangan" type="text" class="form-control" value="<?php echo $keterangan; ?>" placeholder="Update Keterangan">
        </div>
        <div class="form-group">
          <input name="ref" type="text" class="form-control" value="<?php echo $ref; ?>" >
        </div>
        <div class="form-group">
          <input name="debit" type="text" class="form-control" value="<?php echo $debit; ?>" placeholder="Update Kredit">
        </div>
        <div class="form-group">
          <input name="kredit" type="text" class="form-control" value="<?php echo $kredit; ?>" placeholder="Update Debit">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
