<center>
    <h2> Tampil Data Baju</h2>
    <hr>
    <table border="1">
        <tr>
            <td>Kode Baju</td>
            <td>Jenis</td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Total</td>
        </tr>
        <?php
        foreach ($bajudok as $data ): ?>
        <tr>
            <td><?=$data['kodebaju'] ?></td>
            <td><?=$data['jenis'] ?></td>
            <td><?=$data['harga'] ?></td>
            <td><?=$data['jumlah'] ?></td>
            <td><?=$data['total'] ?></td>
        </tr>
        <?php
        endforeach;
        ?> 
    </table>
    <button onclick="window.location='/quiz';">Kembali</button>
</center>