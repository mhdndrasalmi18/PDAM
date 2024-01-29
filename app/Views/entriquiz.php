<form action="quiz/simpan1" name="form" method="post"><center>
    <table border="5">
        <tr>
            <td>Kode Baju</td>
            <td><select name="kode" id="" onchange="a()">
                <option value="">Pilih</option>
                <option value="K001">K001</option>
                <option value="K002">K002</option>
                <option value="K003">K003</option>
                </select></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td><input type="text" name="jenis"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" onkeyup="b()"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input type="text" name="jumlah" onkeyup="b()"></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type="text" name="total" onkeyup="b()"></td>
        </tr>
        <tr>
            <td><input type="submit" name="Simpan"</td>
            <td><button onclick="window.location='/tampil';">Lihat</button></td>
        </tr>
        <script>
            function a(){
                var kode = document.form.kode.value;
                var jenis = document.form.jenis.value;

                if(kode == 'K001') {
                    document.form.jenis.value = "Koko"
                }else if(kode == 'K002'){
                    document.form.jenis.value = "Gaun"
                }else {
                    document.form.jenis.value = "Kaos"
                }
            }
            function b(){
                var hg = document.form.harga.value;
                var hm = document.form.jumlah.value;
                var tot = document.form.total.value;

                document.form.total.value = parseInt(hg) * parseInt(hm)
            }
            </script>
    </table>
        </center>
</form>
