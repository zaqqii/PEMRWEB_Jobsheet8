
//langkah 3
//<?php
//// Lokasi penyimpanan file yang diunggah
//$targetDirectory = "documents/";
//
//// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
//if (!file_exists($targetDirectory)) {
//    mkdir($targetDirectory, 0777, true);
//}
//
//// Ekstensi gambar yang diperbolehkan
//$allowedExtensions = array("jpg", "jpeg", "png", "gif");
//
//if (!empty($_FILES['files']['name'][0])) {
//    $totalFiles = count($_FILES['files']['name']);
//
//    // Loop semua file yang diunggah
//    for ($i = 0; $i < $totalFiles; $i++) {
//        $fileName = $_FILES['files']['name'][$i];
//        $targetFile = $targetDirectory . $fileName;
//        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
//
//        // Cek apakah file gambar
//        if (in_array($fileType, $allowedExtensions)) {
//            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
//                echo "File $fileName berhasil diunggah.<br>";
//                // ✅ Tampilkan thumbnail gambar
//                echo "<img src='$targetFile' width='200' style='height:auto; margin:5px;'>";
//            } else {
//                echo "Gagal mengunggah file $fileName.<br>";
//            }
//        } else {
//            echo "File $fileName bukan gambar yang diizinkan.<br>";
//        }
//    }
//} else {
//    echo "Tidak ada file yang diunggah.";
//}
//?>

<?php
$targetDirectory = "documents/";

// Buat folder jika belum ada
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Format gambar yang diizinkan
$allowedExtensions = array("jpg", "jpeg", "png", "gif");

if (!empty($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . $fileName;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName bukan gambar yang diizinkan.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
