<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Anggota_Organisasi.xls");
?>
<h2>Daftar Anggota Organisasi</h2>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($anggota as $row): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['role_name']; ?></td>
            <td><?php echo $row['is_active'] ? 'Aktif' : 'Non-Aktif'; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>