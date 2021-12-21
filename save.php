<?php

include('db.php');

if (isset($_POST['save'])) {
  $tanggal = $_POST['tanggal'];
  $keterangan = $_POST['keterangan'];
  $ref = $_POST['ref'];
  $debit = $_POST['debit'];
  $kredit = $_POST['kredit'];
  $query = "INSERT INTO transaksi(tanggal, keterangan,ref,debit,kredit) VALUES ('$tanggal', '$keterangan', '$ref', '$debit', '$kredit')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Transaction Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
