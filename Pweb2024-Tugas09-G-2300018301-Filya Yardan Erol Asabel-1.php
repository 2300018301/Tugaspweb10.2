<!DOCTYPE html>
<html>
<head>
    <title>Konversi Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="submit"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 4px;
            text-align: center;
        }
        .error {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            text-align: center;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Konversi Nilai</h2>
        <form method="post" action="">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required><br>
            <label for="matkul">Matkul:</label>
            <input type="text" id="matkul" name="matkul" required><br>
            <label for="nilai">Masukkan Nilai:</label>
            <input type="text" id="nilai" name="nilai" required><br>
            <input type="submit" value="Konversi">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $matkul = $_POST['matkul'];
            $nilai = $_POST['nilai'];

            if (!is_numeric($nilai)) {
                echo "<div class='error'>Nilai harus berupa angka.</div>";
            } else {
                $nilai = floatval($nilai);

                function konversiNilai($nilai) {
                    if (($nilai >= 3.68 && $nilai <= 4.00) || ($nilai >= 80.00 && $nilai <= 100.00)) {
                        return "A";
                    } elseif (($nilai >= 3.34 && $nilai <= 3.67) || ($nilai >= 76.25 && $nilai <= 79.99)) {
                        return "A-";
                    } elseif (($nilai >= 3.01 && $nilai <= 3.33) || ($nilai >= 68.75 && $nilai <= 76.24)) {
                        return "B+";
                    } elseif (($nilai >= 2.68 && $nilai <= 3.00) || ($nilai >= 65.00 && $nilai <= 68.74)) {
                        return "B";
                    } elseif (($nilai >= 2.34 && $nilai <= 2.67) || ($nilai >= 62.50 && $nilai <= 64.99)) {
                        return "B-";
                    } elseif (($nilai >= 2.01 && $nilai <= 2.33) || ($nilai >= 57.50 && $nilai <= 62.49)) {
                        return "C+";
                    } elseif (($nilai >= 1.68 && $nilai <= 2.00) || ($nilai >= 55.00 && $nilai <= 57.49)) {
                        return "C";
                    } elseif (($nilai >= 1.34 && $nilai <= 1.67) || ($nilai >= 51.25 && $nilai <= 54.99)) {
                        return "C-";
                    } elseif (($nilai >= 1.01 && $nilai <= 1.33) || ($nilai >= 43.75 && $nilai <= 51.24)) {
                        return "D+";
                    } elseif (($nilai >= 0.67 && $nilai <= 1.00) || ($nilai >= 40.00 && $nilai <= 43.74)) {
                        return "D";
                    } elseif (($nilai >= 0.00 && $nilai <= 0.66) || ($nilai >= 0.00 && $nilai <= 39.99)) {
                        return "E";
                    } else {
                        return "Nilai tidak valid";
                    }
                }

                $nilaiHuruf = konversiNilai($nilai);

                // Output hasil konversi
                echo "<div class='result'>";
                echo "<strong>Nama:</strong> " . htmlspecialchars($nama) . "<br>";
                echo "<strong>NIM:</strong> " . htmlspecialchars($nim) . "<br>";
                echo "<strong>Matkul:</strong> " . htmlspecialchars($matkul) . "<br>";
                echo "<strong>Nilai Anda:</strong> " . $nilai . ", konversi ke nilai huruf adalah <strong>" . $nilaiHuruf . "</strong>.";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
