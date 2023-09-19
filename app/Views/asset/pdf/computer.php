<table>
    <thead>
        <tr>
            <th>Nomor Asset</th>
            <th>Device ID</th>
            <th>User Login</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($computers as $computer) : ?>
            <tr>
                <td><?= $computer['asset_number'] ?></td>
                <td><?= $computer['device_id'] ?></td>
                <td><?= $computer['login_user'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>