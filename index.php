<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Produk</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f4f4f4;
    }

    h2 {
      color: #333;
      margin-bottom: 15px;
      border-bottom: 2px solid #ccc;
      padding-bottom: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: white;
      border-radius: 8px;
      overflow: hidden;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 12px 15px;
      text-align: left;
      transition: background-color 0.3s ease;
    }

    th {
      background: #4facfe;
      color: white;
      text-transform: uppercase;
      font-size: 14px;
      width: 15%;
    }

    td:last-child {
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f0f8ff;
    }

    .action-btn {
      padding: 6px 10px;
      margin: 2px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.2s;
    }

    .edit-btn {
      background-color: #f39c12;
      color: white;
    }

    .edit-btn:hover {
      background-color: #e67e22;
    }

    .delete-btn {
      background-color: #e74c3c;
      color: white;
    }

    .delete-btn:hover {
      background-color: #c0392b;
    }

    .add-btn{
      display: inline-block;
      margin-bottom: 15px;
      padding: 10px 15px;
      background-color: #2730aeff;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h2>Daftar Produk</h2>

  <a href="/form_tambah_produk.php" class="add-btn">Tambah Produk</a>

  <table>
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Jenis Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('koneksi.php');
      $query = "SELECT * FROM produk ORDER BY id_produk DESC";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id_produk'];
          $nama = $row['nama_produk'];
          $jenis = $row['jenis_produk'];
          $harga = $row['harga'];
          $stok = $row['stok'];
          echo "<tr>
                    <td>$nama</td>
                    <td>$jenis</td>
                    <td>Rp $harga</td>
                    <td>$stok</td>
                    <td>
                        <a href=\"form_update_produk.php?id=$id\" class=\"action-btn edit-btn\">Edit</a>
                        <a href=\"hapus_produk.php?id_produk=$id\" 
                           class=\"action-btn delete-btn\"
                           onclick=\"return confirm('Apakah Anda yakin ingin menghapus produk ini?');\">Delete</a>
                    </td>
                </tr>";
        }
      } else {
        echo "tidak ada data";
      }
      ?>
    </tbody>
  </table>

</body>

</html>