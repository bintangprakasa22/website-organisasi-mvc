<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 1100px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 20px; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 25px; }
        .stat-card { background: #2c3e50; color: white; padding: 15px; border-radius: 8px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        table th, table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background: #2c3e50; color: white; }
        .img-profile { width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid #ddd; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 12px; }
        .btn-add { background: #3498db; color: white; }
        .btn-edit { background: #f1c40f; color: black; }
        .btn-delete { background: #e74c3c; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>Panel Administrator</h1>
                <p>Halo, <b><?php echo htmlspecialchars($username); ?></b></p>
            </div>
            <a href="/organisasi_uts/auth/logout" style="color:red; font-weight:bold;">Logout</a>
        </div>

        <div class="stats-grid">
            <div class="stat-card"><h2><?php echo $stats['total_user']; ?></h2><p>Total Anggota</p></div>
            <div class="stat-card"><h2><?php echo $stats['aktif_user']; ?></h2><p>Aktif</p></div>
            <div class="stat-card"><h2><?php echo count($logs); ?></h2><p>Log Hari Ini</p></div>
        </div>

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
    <h3>Manajemen Anggota</h3>
    <div>
        <a href="/organisasi_uts/dashboard/export" class="btn" style="background: #27ae60; color: white; margin-right: 5px;">📥 Export Excel</a>
        
        <a href="/organisasi_uts/dashboard/tambah" class="btn btn-add">+ Tambah</a>
    </div>
</div>
        <table>
            <thead>
                <tr>
                    <th>Foto</th><th>Username</th><th>Email</th><th>Jabatan</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anggota as $row): ?>
                <tr>
                    <td><img src="/organisasi_uts/assets/uploads/<?php echo $row['profile_pic']; ?>" class="img-profile"></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['role_name']); ?></td>
                    <td><?php echo $row['is_active'] ? '✅ Aktif' : '❌ Non-Aktif'; ?></td>
                    <td>
                        <a href="/organisasi_uts/dashboard/edit/<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="/organisasi_uts/dashboard/hapus/<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>