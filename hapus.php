

<?php
require 'function.php';
var_dump($_GET["nama"]);

if ( hapus($_GET["nama"]) > 0 ) {
  echo "
    <script>
      alert('data berhasil dihapus')
      document.location.href = 'tampil_data.php'
    </script>
  ";
} else {
  echo "
    <script>
      alert('data gagal dihapus')
      document.location.href = 'tampil_data.php'
    </script>
  ";
}


?>