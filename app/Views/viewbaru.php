<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
</head>
<body>
<form name="form1" action="#" style="font-family:calibri; background-color: blanchedalmond;">
    <b><center style="color:red">INPUT DATA NILAI</center></b></b>
    <table border="0" style="color:rgb(29, 76, 215)"><b>
    <tr>
    <td>Nilai Tugas </td>
    <td><input type="text" size="6" name="ntugas" id="harga"/></td></tr>
    <tr>
    <td>Nilai UTS </td>
    <td><input type="text" size="6" name="nuts" id="harga"/></td></tr>
    <tr>
    <td>Nilai UAS</td>
    <td><input type="text" name="nuas" oninput="nilaiakhir()"/></td></tr>
    <td>Nilai Akhir</td>
    <td><input type="text" size="6" name="nakhir" disabled="true"/></td></tr>
    </table>
    <input type="submit" value="SIMPAN"/>
    <input type="reset" value="BATAL"/>
   </form>
   <script language="JavaScript" type="text/javascript">
    function nilaiakhir(){
        var a = eval(document.form1.ntugas.value);
        var b = eval(document.form1.nuts.value);
        var c = eval(document.form1.nuas.value);
        var d =(a + b + c)/3;
        document.form1.nakhir.value = d;
    }
   //-->
   </script> 
</body>

</html>