<!DOCTYPE html>
<html>
<head>
    <title>For Berkalang</title>
</head>
<body>
<pre>
<script language="JavaScript">
    var baris, i, j;
    var nilai = prompt("Tinggi: ", 5);
    var tinggi = parseInt(nilai);

    if (!isNaN(tinggi)) {
        for (baris = 1; baris <= tinggi; baris++) {
            // buat sejumlah spasi
            for (i = 1; i <= tinggi - baris; i++) {
                document.write("&nbsp;"); // karakter spasi
            }
            // tampilkan
            for (j = 1; j < 2 * baris; j++) {
                document.write("*");
            }
            // pindah baris
            document.write("<br>");
        }
    } else {
        document.write("Masukkan nilai yang valid.");
    }
</script>
</pre>
</body>
</html>
