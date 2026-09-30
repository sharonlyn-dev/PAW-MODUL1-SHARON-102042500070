<?php
$produk = [
    [
        "nama" => "Laptop ASUS Vivobook",
        "kategori" => "Laptop",
        "harga" => 8500000,
        "stok" => 5
    ],
    [
        "nama" => "Mouse Logitech M331",
        "kategori" => "Aksesoris",
        "harga" => 350000,
        "stok" => 12
    ],
    [
        "nama" => "Keyboard Mechanical RGB",
        "kategori" => "Aksesoris",
        "harga" => 650000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming HyperX",
        "kategori" => "Audio",
        "harga" => 950000,
        "stok" => 7
    ],
    [
        "nama" => "Webcam Full HD",
        "kategori" => "Kamera",
        "harga" => 550000,
        "stok" => 3
    ],
    [
        "nama" => "Power Bank 20.000 mAh",
        "kategori" => "Aksesoris",
        "harga" => 450000,
        "stok" => 0
    ]
];

$jumlahProduk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            color: #222;
            line-height: 1.6;
        }

        /* Navbar */
        .navbar {
            background-color: #5b4bdb;
            color: white;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, #5b4bdb, #8175ed);
            color: white;
            text-align: center;
            padding: 70px 20px;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 18px;
        }

        /* Informasi produk */
        .info {
            text-align: center;
            padding: 35px 20px 15px;
        }

        .info h2 {
            color: #333;
        }

        .jumlah {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 18px;
            background-color: #e9e6ff;
            color: #5b4bdb;
            border-radius: 20px;
            font-weight: bold;
        }

        /* Katalog */
        .katalog {
            width: 84%;
            max-width: 1200px;
            margin: 25px auto 60px;

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        /* Card */
        .card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .icon {
            width: 70px;
            height: 70px;
            background-color: #eeeaff;
            color: #5b4bdb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 18px;
        }

        .card h3 {
            margin-bottom: 8px;
            color: #333;
        }

        .kategori {
            color: #777;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .harga {
            color: #5b4bdb;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .stok {
            font-size: 14px;
            margin-bottom: 18px;
        }

        .tersedia {
            color: #159447;
            font-weight: bold;
        }

        .habis {
            color: #d63031;
            font-weight: bold;
        }

        .btn {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #5b4bdb;
            color: white;
            padding: 11px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn:hover {
            background-color: #4637c4;
        }

        .btn-disabled {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #ccc;
            color: #777;
            padding: 11px;
            border-radius: 8px;
            cursor: not-allowed;
        }

        /* Footer */
        footer {
            background-color: #29263d;
            color: white;
            text-align: center;
            padding: 25px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .katalog {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                gap: 10px;
            }

            .nav-menu {
                gap: 15px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .katalog {
                width: 90%;
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">Cia Store</div>

        <ul class="nav-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#katalog">Katalog</a></li>
            <li><a href="#footer">Kontak</a></li>
        </ul>
    </header>

    <!-- Hero -->
    <section class="hero">
        <h1>Selamat Datang di Cia Store</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi pilihan.</p>
    </section>

    <!-- Informasi jumlah produk -->
    <section class="info">
        <h2>Katalog Produk</h2>

        <div class="jumlah">
            <?= $jumlahProduk ?> Produk Tersedia di Katalog
        </div>
    </section>

    <!-- Katalog Produk -->
    <main class="katalog" id="katalog">

        <?php foreach ($produk as $item): ?>

            <div class="card">

                <div class="icon">💻</div>

                <h3><?= htmlspecialchars($item["nama"]) ?></h3>

                <div class="kategori">
                    Kategori: <?= htmlspecialchars($item["kategori"]) ?>
                </div>

                <div class="harga">
                    Rp <?= number_format($item["harga"], 0, ",", ".") ?>
                </div>

                <div class="stok">
                    Stok: <?= $item["stok"] ?> |
                    
                    <?php if ($item["stok"] > 0): ?>
                        <span class="tersedia">Tersedia</span>
                    <?php else: ?>
                        <span class="habis">Stok Habis</span>
                    <?php endif; ?>
                </div>

                <?php if ($item["stok"] > 0): ?>
                    <a href="#" class="btn">Beli Sekarang</a>
                <?php else: ?>
                    <span class="btn-disabled">Tidak Tersedia</span>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </main>

    <!-- Footer -->
    <footer id="footer">
        <p>&copy; 2026 Cia Store. All Rights Reserved.</p>
        <p>Website Katalog Produk - PHP Native</p>
    </footer>

</body>
</html>
