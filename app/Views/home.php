<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Organisasi Digital</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        nav { background: #2c3e50; color: white; padding: 20px 10%; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 1000; }
        nav .logo { font-size: 24px; font-weight: bold; }
        nav a { color: white; text-decoration: none; margin-left: 20px; font-weight: 500; }
        .btn-login { background: #3498db; padding: 8px 20px; border-radius: 5px; transition: 0.3s; }
        .btn-login:hover { background: #2980b9; }
        
        .hero { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1500&q=80'); 
                height: 80vh; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center; padding: 0 20px; }
        .hero h1 { font-size: 50px; margin-bottom: 20px; }
        .hero p { font-size: 20px; max-width: 700px; margin-bottom: 30px; }
        
        .services { padding: 80px 10%; text-align: center; background: #fff; }
        .services h2 { margin-bottom: 50px; font-size: 32px; color: #2c3e50; }
        .card-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
        .card { padding: 30px; background: #f9f9f9; border-radius: 10px; transition: 0.3s; border-bottom: 4px solid #3498db; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .card h3 { margin-bottom: 15px; color: #2c3e50; }
        
        footer { background: #2c3e50; color: white; text-align: center; padding: 30px; margin-top: 50px; }
    </style>
</head>
<body>
    <nav>
        <div class="logo">ORGANISASI UTS</div>
        <div>
            <a href="#">Beranda</a>
            <a href="#">Tentang Kami</a>
            <a href="/organisasi_uts/auth" class="btn-login">Login Pengurus</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Membangun Masa Depan Digital</h1>
        <p>Solusi manajemen organisasi modern untuk efisiensi kerja yang lebih baik, terintegrasi, dan profesional.</p>
    </section>

    <section class="services">
        <h2>Layanan Kami</h2>
        <div class="card-container">
            <div class="card">
                <h3>Manajemen Data</h3>
                <p>Pengelolaan data anggota secara terpusat dan aman dalam sistem cloud database.</p>
            </div>
            <div class="card">
                <h3>Keamanan Tinggi</h3>
                <p>Sistem login terlindungi dengan enkripsi password standar industri keamanan tinggi.</p>
            </div>
            <div class="card">
                <h3>Dashboard Admin</h3>
                <p>Pantau semua aktivitas dan statistik organisasi dalam satu tampilan dashboard.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Organisasi UTS - Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>