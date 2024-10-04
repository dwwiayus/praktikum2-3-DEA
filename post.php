<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Post Baru </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1> Kirim Post Baru Di sini </h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="title"> Judul: </label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="body"> Isi Konten: </label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>

        <?php
        // pengecekan form submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $title = $_POST['title'];
            $body = $_POST['body'];

            // Data yang akan dikirimkan
            $postData = [
                'title' => $title,
                'body' => $body,
                'userId' => 1,
            ];

            // URL API
            $url = 'https://jsonplaceholder.typicode.com/posts';

            // Inisialisasi cURL
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Eksekusi cURL dan ambil hasilnya
            $response = curl_exec($ch);
            curl_close($ch);

            // Tampilkan respon dari API
            echo "<div class='mt-4'><h5>Respon dari API:</h5><pre>" . htmlspecialchars($response) . "</pre></div>";
        }
        ?>
    </div>
</body>
</html>