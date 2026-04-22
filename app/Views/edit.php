<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 450px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        .btn-save { width: 100%; background: #27ae60; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Anggota</h2>
        <form action="/organisasi_uts/dashboard/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            
            <div class="form-group" style="text-align: center;">
                <img src="/organisasi_uts/assets/uploads/<?php echo $user['profile_pic']; ?>" width="100" height="100" style="border-radius: 50%; object-fit: cover; margin-bottom: 10px;">
                <input type="file" name="profile_pic" accept="image/*">
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <select name="role_id">
                    <?php foreach($roles as $role): ?>
                        <option value="<?php echo $role['id']; ?>" <?php echo ($user['role_id'] == $role['id']) ? 'selected' : ''; ?>>
                            <?php echo $role['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="is_active">
                    <option value="1" <?php echo ($user['is_active'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?php echo ($user['is_active'] == 0) ? 'selected' : ''; ?>>Non-Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn-save">Simpan Perubahan</button>
        </form>
        <br><a href="/organisasi_uts/dashboard" style="text-decoration:none; color:grey;">&larr; Batal</a>
    </div>
</body>
</html>