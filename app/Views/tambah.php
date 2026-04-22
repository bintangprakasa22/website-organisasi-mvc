<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - Organisasi</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-top: 0; margin-bottom: 25px;}
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 14px; color: #34495e; }
        .form-group input, .form-group select { width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; box-sizing: border-box; font-size: 14px; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #3498db; }
        .btn-simpan { width: 100%; background: #2ecc71; color: white; padding: 12px; border: none; border-radius: 5px; font-weight: bold; font-size: 15px; cursor: pointer; margin-top: 10px; }
        .btn-simpan:hover { background: #27ae60; }
        .btn-kembali { display: inline-block; margin-top: 15px; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .btn-kembali:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Anggota Baru</h2>
        <form action="/organisasi_uts/dashboard/simpan" method="POST">
            
            <div class="form-group">
                <label>Jabatan (Role)</label>
                <select name="role_id" required>
                    <option value="">-- Pilih Jabatan --</option>
                    <?php foreach($roles as $role): ?>
                        <option value="<?php echo $role['id']; ?>"><?php echo htmlspecialchars($role['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required autocomplete="off">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required autocomplete="off">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-simpan">Simpan Anggota</button>
        </form>
        <a href="/organisasi_uts/dashboard" class="btn-kembali">&larr; Kembali ke Dashboard</a>
    </div>
</body>
</html>