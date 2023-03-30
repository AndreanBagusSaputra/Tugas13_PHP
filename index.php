<?php
    $ar_prodi = ["SI" => "Sistem Informasi", "TI" => "Teknik Informatika", "Ilkom" => "Ilmu Komputer", "TE" => "Teknik Elektron"];
    $ar_skill = ["HTML" => 10, "CSS" => 10, "Javascript" => 20, "RWD Bootstrap" => 20, "PHP" => 30, "MySQL" => 30, "Laravel" => 40];
    $domisili = ["Jakarta", "Bandung", "Bekasi", "Malang", "Surabaya", "Lainnya"];
?>

<fieldset style="background-color:aqua">
    <legend>Form Registrasi Kelompok Belajar</legend>

    <table>
        <thead>
            <tr>
                <td>Form Registrasi</td>
            </tr>
        </thead>
        <tbody>
            <form method="POST">
                <tr>
                    <td>NIM</td>
                    <td>
                        <input type="text" name="nim">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" name="nama">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="jk" value="laki-laki">Laki-laki &nbsp;
                        <input type="radio" name="jk" value="perempuan">Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>
                        <select name="prodi">
                            <?php
                                foreach($ar_prodi as $prodi => $v){
                                    ?>
                                    <option value="<?= $prodi?>"><?= $v ?></option>
                            <?php } ?>
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Skil Programing</td>
                    <td>
                        <?php
                            foreach($ar_skill as $skill => $s){
                        ?>    
                            <input type="checkbox" name="skill[]" value="<?= $skill ?>"><?= $skill ?>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td>
                        <select name="domisili">
                            <?php
                                foreach($domisili as $d){
                                    ?>
                                    <option value="<?= $d ?>"><?= $d ?></option>
                            <?php } ?>
                            ?>
                        </select>
                    </td>
                </tr>
                <tfoot>
                    <tr>
                        <th colspan="2">
                            <button name="proses">Submit</button>
                        </th>
                    </tr>
                </tfoot>
            </form>
        </tbody>
    </table>
</fieldset>

<?php
    if(isset($_POST['proses'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $prodi = $_POST['prodi'];
        $skill = $_POST['skill'];
        $domisili = $_POST['domisili'];
    }


    $total = array_reduce($skill, function($acc, $skill) use ($ar_skill) {
        if (isset($ar_skill[$skill])) {
          $acc += $ar_skill[$skill];
        }
        return $acc;
      }, 0);

    function skor($total){
        if ($total >= 100 && $total <= 150) {
            return "Sangat Baik";
        } elseif ($total >= 60 && $total <= 100) {
            return "Baik";
        } elseif ($total >= 40 && $total <= 60) {
            return "Cukup";
        } elseif ($total >= 0 && $total <= 40) {
            return "Kurang";
        } else {
            return "Tidak Memadai";
        }
    }


   
?>

NIM : <?= $nim ?><br>
Nama : <?= $nama ?><br>
jenis Kelamin : <?= $jk ?><br>
Program Studi : <?= $prodi ?><br>
Skill : 
<?php 
    foreach($skill as $s){
?>
    <?= $s ?> ,
<?php } ?> <br>
Domisili : <?= $domisili ?> <br>

Total : <?= $total ?><br>

kategori Skill : <?= skor($total) ?>
