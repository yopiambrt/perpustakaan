<?php

class ModelAnggota
{

    public $nis;
    public $nama;
    public $tp_lahir;
    public $tgl_lahir;
    public $jk;
    public $no_hp;
    public $email;
    public $kelas;
    public $alamat;

    public function add_data($data)
    {
        require('koneksi.php');
        if (isset($_POST['tombol'])) {
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $tp_lahir = $_POST['tp_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jk = $_POST['jk'];
            $no_hp = $_POST['no_hp'];
            $email = $_POST['email'];
            $kelas = $_POST['kelas'];
            $alamat = $_POST['alamat'];

            $sql = "INSERT INTO anggota 
                    VALUES 
                    ('no','$nis','$nama','$tp_lahir','$tgl_lahir','$jk','$no_hp','$email','$kelas','$alamat')";

            $query = mysqli_query($koneksi, $sql);
            if ($query == 1) {
                echo "<script>
                        window.alert('Data Berhasil Ditambahkan');
					</script>";
            }
            if ($query == 1) {

                "<script> window.location('mahasiswa.php') </script>";
            } else {
                echo "<center>Data Gagal Diinput Ke Database</center></br>";
                echo mysqli_error($koneksi);
            }
        }
    }

    public function deleteAgt()
    {
        require('koneksi.php');
        $no = $_GET['no'];
        $query = "DELETE FROM anggota WHERE no = '$no'";
        $sql = mysqli_query($koneksi, $query);
    }

    public function updatedata($no)
    {
        require('koneksi.php');
        if (isset($_POST['tombol'])) {

            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $tp_lahir = $_POST['tp_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jk = $_POST['jk'];
            $no_hp = $_POST['no_hp'];
            $email = $_POST['email'];
            $kelas = $_POST['kelas'];
            $alamat = $_POST['alamat'];

            $sql = mysqli_query($koneksi, "UPDATE anggota SET
                                            nis = '$nis',
                                            nama = '$nama',
                                            tp_lahir = '$tp_lahir',
                                            tgl_lahir = '$tgl_lahir',
                                            jk = '$jk',
                                            no_hp = '$no_hp',
                                            email = '$email',
                                            kelas = '$kelas',
                                            alamat = '$alamat'
                                        WHERE no = '$no'");

            if ($sql == 1) {
                echo "<script>window.alert('Data Berhasil Diubah');
            window.location('http://localhost/pemweblan/UTS/anggota.php?target=list')</script>";
            }
        }
    }
}
