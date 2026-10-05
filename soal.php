<?php
session_start();

$nama = "";
$whatsapp = "";
$email = "";
$matkul = "";
$motivasi = "";

$errorNama = "";
$errorWhatsapp = "";
$errorEmail = "";
$errorMatkul = "";
$errorMotivasi = "";

$mode = "form";


/* RESET FORM */
if (isset($_GET["reset"])) {
    unset($_SESSION["data_pendaftar"]);
    header("Location: soal.php");
    exit;
}


/* PROSES PENDAFTARAN */
if (isset($_POST["daftar"])) {

    $nama = trim($_POST["nama"] ?? "");
    $whatsapp = trim($_POST["whatsapp"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $matkul = trim($_POST["matkul"] ?? "");
    $motivasi = trim($_POST["motivasi"] ?? "");


    /* VALIDASI NAMA */
    if ($nama == "") {
        $errorNama = "Nama lengkap wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errorNama = "Nama hanya boleh berisi huruf dan spasi.";
    }


    /* VALIDASI WHATSAPP */
    if ($whatsapp == "") {
        $errorWhatsapp = "Nomor WhatsApp wajib diisi.";
    } elseif (!preg_match("/^[0-9]+$/", $whatsapp)) {
        $errorWhatsapp = "Nomor WhatsApp hanya boleh berisi angka.";
    } elseif (!preg_match("/^(0|62)[0-9]+$/", $whatsapp)) {
        $errorWhatsapp = "Nomor WhatsApp harus diawali dengan 0 atau 62.";
    }


    /* VALIDASI EMAIL */
    if ($email == "") {
        $errorEmail = "Email institusi wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Format email tidak valid.";
    }


    /* VALIDASI MATA KULIAH */
    if ($matkul == "") {
        $errorMatkul = "Mata kuliah praktikum wajib dipilih.";
    }


    /* VALIDASI MOTIVASI */
    if ($motivasi == "") {
        $errorMotivasi = "Motivasi wajib diisi.";
    }


    /* JIKA SEMUA VALID */
    if (
        $errorNama == "" &&
        $errorWhatsapp == "" &&
        $errorEmail == "" &&
        $errorMatkul == "" &&
        $errorMotivasi == ""
    ) {

        $nomorRegistrasi =
            "EAD-" . date("Ymd") . "-" . rand(1000, 9999);

        $_SESSION["data_pendaftar"] = [
            "nomor_registrasi" => $nomorRegistrasi,
            "nama" => $nama,
            "whatsapp" => $whatsapp,
            "email" => $email,
            "matkul" => $matkul,
            "motivasi" => $motivasi
        ];

        $mode = "id_card";
    }
}


/* LIHAT DATA PENDAFTAR */
if (isset($_POST["lihat_data"])) {

    if (isset($_SESSION["data_pendaftar"])) {
        $data = $_SESSION["data_pendaftar"];

        $mode = "id_card";
    }
}


/* KEMBALI KE FORM */
if (isset($_POST["kembali"])) {
    $mode = "form";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Asisten Praktikum</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<?php if ($mode == "form"): ?>

    <div class="header">

        <?php if (file_exists("logo.png")): ?>
            <img src="logo.png" class="logo" alt="Logo EAD">
        <?php endif; ?>

        <h1>Pendaftaran Asisten Praktikum</h1>

        <p>
            Laboratorium Enterprise Application Development
        </p>

    </div>


    <form method="POST">

        <!-- NAMA -->
        <div class="form-group">

            <label for="nama">
                Nama Lengkap
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                value="<?= htmlspecialchars($nama) ?>"
                placeholder="Masukkan nama lengkap">

            <?php if ($errorNama != ""): ?>
                <span class="error">
                    <?= htmlspecialchars($errorNama) ?>
                </span>
            <?php endif; ?>

        </div>


        <!-- WHATSAPP -->
        <div class="form-group">

            <label for="whatsapp">
                Nomor WhatsApp
            </label>

            <input
                type="text"
                id="whatsapp"
                name="whatsapp"
                value="<?= htmlspecialchars($whatsapp) ?>"
                placeholder="Contoh: 0812345678 / 62812345678">

            <?php if ($errorWhatsapp != ""): ?>
                <span class="error">
                    <?= htmlspecialchars($errorWhatsapp) ?>
                </span>
            <?php endif; ?>

        </div>


        <!-- EMAIL -->
        <div class="form-group">

            <label for="email">
                Email Institusi
            </label>

            <input
                type="text"
                id="email"
                name="email"
                value="<?= htmlspecialchars($email) ?>"
                placeholder="Masukkan email institusi">

            <?php if ($errorEmail != ""): ?>
                <span class="error">
                    <?= htmlspecialchars($errorEmail) ?>
                </span>
            <?php endif; ?>

        </div>


        <!-- MATA KULIAH -->
        <div class="form-group">

            <label for="matkul">
                Pilihan Mata Kuliah Praktikum
            </label>

            <select id="matkul" name="matkul">

                <option value="">
                    -- Pilih Mata Kuliah --
                </option>

                <option
                    value="Enterprise Application Development"
                    <?= $matkul == "Enterprise Application Development" ? "selected" : "" ?>>

                    Enterprise Application Development

                </option>

            </select>

            <?php if ($errorMatkul != ""): ?>
                <span class="error">
                    <?= htmlspecialchars($errorMatkul) ?>
                </span>
            <?php endif; ?>

        </div>


        <!-- MOTIVASI -->
        <div class="form-group">

            <label for="motivasi">
                Motivasi Mendaftar
            </label>

            <textarea
                id="motivasi"
                name="motivasi"
                placeholder="Tuliskan motivasi kamu..."><?= htmlspecialchars($motivasi) ?></textarea>

            <?php if ($errorMotivasi != ""): ?>
                <span class="error">
                    <?= htmlspecialchars($errorMotivasi) ?>
                </span>
            <?php endif; ?>

        </div>


        <button
            type="submit"
            name="daftar"
            class="button">

            Daftar Sekarang

        </button>

    </form>


    <!-- LIHAT DATA -->
    <form method="POST">

        <button
            type="submit"
            name="lihat_data"
            class="button-outline">

            Lihat Data Pendaftar

        </button>

    </form>


<?php elseif ($mode == "id_card"): ?>


    <?php if (isset($_SESSION["data_pendaftar"])): ?>

        <?php $data = $_SESSION["data_pendaftar"]; ?>

        <div class="header">

            <?php if (file_exists("logo.png")): ?>
                <img src="logo.png" class="logo" alt="Logo EAD">
            <?php endif; ?>

            <h1>Registrasi Berhasil</h1>

            <p>
                Data pendaftaran berhasil disimpan.
            </p>

        </div>


        <div class="success">
            ✓ Pendaftaran berhasil!
        </div>


        <div class="card">

            <div class="card-header">

                <h2>REGISTRATION CARD</h2>

                <p>
                    Laboratorium Enterprise Application Development
                </p>

            </div>


            <div class="card-body">

                <div class="registration-number">

                    Nomor Registrasi<br>

                    <?= htmlspecialchars($data["nomor_registrasi"]) ?>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Nama Lengkap
                    </div>

                    <div class="data-value">
                        <?= htmlspecialchars($data["nama"]) ?>
                    </div>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Nomor WhatsApp
                    </div>

                    <div class="data-value">
                        <?= htmlspecialchars($data["whatsapp"]) ?>
                    </div>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Email Institusi
                    </div>

                    <div class="data-value">
                        <?= htmlspecialchars($data["email"]) ?>
                    </div>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Mata Kuliah Praktikum
                    </div>

                    <div class="data-value">
                        <?= htmlspecialchars($data["matkul"]) ?>
                    </div>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Motivasi
                    </div>

                    <div class="data-value">
                        <?= nl2br(htmlspecialchars($data["motivasi"])) ?>
                    </div>

                </div>

            </div>

        </div>


        <form method="POST">

            <button
                type="submit"
                name="kembali"
                class="button-outline">

                Kembali ke Form

            </button>

        </form>

    <?php else: ?>

        <div class="empty-data">
            Belum ada data pendaftar.
        </div>

    <?php endif; ?>

<?php endif; ?>

</div>

</body>
</html>