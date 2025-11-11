<?php 
require('koneksi.php');
$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE id_produk = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Input Produk</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .form-container {
        background: white;
        width: 350px;
        padding: 25px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }

      .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: 600;
      }

      .form-group {
        margin-bottom: 15px;
      }

      label {
        display: block;
        margin-bottom: 6px;
        color: #555;
        font-size: 14px;
        font-weight: 500;
      }

      input[type="text"],
      input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
      }

      input:focus {
        border-color: #4facfe;
        outline: none;
        box-shadow: 0 0 5px rgba(79, 172, 254, 0.4);
      }

      button {
        width: 100%;
        padding: 10px;
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      button:hover {
        background: linear-gradient(135deg, #00f2fe, #4facfe);
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <h2>Input Produk</h2>
      <form action="input_produk.php" method="POST">
        <div class="form-group">
            <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
          <label for="nama_produk">Nama Produk</label>
          <input
            type="text"
            id="nama_produk"
            name="nama_produk"
            placeholder="Masukkan nama produk"
            value="<?php echo $data['nama_produk']; ?>"
            required
          />
        </div>
        <div class="form-group">
          <label for="jenis_produk">Jenis Produk</label>
          <input
            type="text"
            id="jenis_produk"
            name="jenis_produk"
            placeholder="Masukkan jenis produk (cth: Pakaian, Makanan)"
            value="<?php echo $data['jenis_produk']; ?>"
            required
          />
        </div>
        
        <div class="form-group">
          <label for="harga">Harga (Rp)</label>
          <input
            type="number"
            id="harga"
            name="harga"
            placeholder="Masukkan harga barang"
            required
            value="<?php echo $data['harga']; ?>"
          />
        </div>

        <div class="form-group">
          <label for="stok">Stok</label>
          <input
            type="number"
            id="stok"
            name="stok"
            placeholder="Masukkan jumlah stok"
            value="<?php echo $data['stok']; ?>"
            required
          />
        </div>

        <button type="submit" name="submit">Simpan Perubahan</button>
      </form>
    </div>
  </body>
</html>
