<center>
    <h2><b>Form Pembayaran </b></h2>
</center>
<form action="Home/save" name="form" method="post">
    <center>
        <table border="1">
            <tr>
                <td>Bakso</td>
                <td><input type="text" name="bakso" oninput="b()" placeholder="Rp 12000"></td>
            </tr>
            <tr>
                <td>Siomay</td>
                <td><input type="text" name="siomay" oninput="b()" placeholder="Rp 12000"></td>
            </tr>
            <tr>
                <td>Mie Ayam</td>
                <td><input type="text" name="mie" oninput="b()" placeholder="Rp 12000"></td>

            </tr>
            <tr>
                <td>Teh Es</td>
                <td><input type="text" name="teh" oninput="b()" placeholder="Rp 12000"></td>

            </tr>
            <tr>
                <td>Member</td>
                <td><select name="member" id="" onchange="b()">
                        <option value="">Pilih</option>
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select></td>
            </tr>
            <tr>
                <td>Total</td>
                <td><input type="text" name="total"></td>
            </tr>
            <script>
            function b() {
                var bakso = (document.form.bakso.value) * 10000;
                var siomay = (document.form.siomay.value) * 12000;
                var mie = (document.form.mie.value) * 12000;
                var teh = (document.form.teh.value) * 4000;
                tot = bakso + siomay + mie + teh;
                var member = document.form.member.value;
                if (member == 'Ya') {
                    diskon = 0.20 * tot;
                } else if (member == 'Tidak') {
                    diskon = 0;
                }

                document.form.total.value = tot - diskon;
            }
            </script>
        </table><br>
        <input type="submit" name="Simpan">
        <input type="reset" name="Reset">
    </center>
</form>