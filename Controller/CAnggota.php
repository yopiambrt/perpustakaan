<?php

require_once('Model/Model_anggota.php');
require_once('Template/form.php');

class CAnggota
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

    public function inputForm(){
        require ('view/display.php');

        echo "<center><h2>Tambah Anggota</h2>";
        $formAgt = new Form("", "Tambah Anggota");
        $formAgt->addField("nis", "NIS Siswa");
        $formAgt->addField("nama", "Nama Siswa");
        $formAgt->addField("tp_lahir", "Tempat Lahir");
        $formAgt->addDate("tgl_lahir", "Tamggal Lahir");

        $formAgt->addRadio("jk", "Jenis Kelamin", "radio", array(
            array("indeks" => 0, "value" => "&nbsp; Laki-Laki"),
            array("indeks" => 1, "value" => "&nbsp; Perempuan")
        ));

        $formAgt->addField("no_hp", "No. HP");
        $formAgt->addField("email", "Email");

        $formAgt->addSelect(
            "kelas",
            "Kelas",
            "select",
            array(
                array('indeks' => ' ', 'value' => ' '),
                array('indeks' => 'MIPA', 'value' => 'MIPA'),
                array('indeks' => 'Sosial', 'value' => 'Sosial'),
                array('indeks' => 'Bahasa', 'value' => 'Bahasa')
            ),
            array('indeks' => 'selected')
        );

        $formAgt->addField("alamat", "Alamat");

        if (isset($_POST['tombol'])) {
            $formAgt->getForm();
            $data['nis'] = $_POST['nis'];
            $data['nama'] = $_POST['nama'];
            $data['tp_lahir'] = $_POST['tp_lahir'];
            $data['tgl_lahir'] = $_POST['tgl_lahir'];
            $data['jk'] = $_POST['jk'];
            $data['no_hp'] = $no_hp['tgl_lahir'];
            $data['email'] = $_POST['email'];
            $data['kelas'] = $_POST['kelas'];
            $data['alamat'] = $_POST['alamat'];
            
            $ModelAnggota = new ModelAnggota();
            $ModelAnggota->add_data($data);

            $this->cetakdata();

            echo "</center>";
        } else {
            $data = $formAgt->displayForm();

            require('view/Anggota_input.php');
            
        }
    }

    public function updateForm()
    {
        require('koneksi.php');
        $no = $_GET['no'];
        $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE no='$no'");
        while ($res = mysqli_fetch_array($result)) :

        require ('view/display.php');

        echo "<center><h2>Edit Data</h2>";
        $formAgt = new Form("", "Update Data");
        $formAgt->addField("nis", "NIS Siswa", "text", $res['nis']);
        $formAgt->addField("nama", "Nama Siswa", "text", $res['nama']);
        $formAgt->addField("tp_lahir", "Tempat Lahir", "text", $res['tp_lahir']);
        $formAgt->addDate("tgl_lahir", "Tamggal Lahir", "date", $res['tgl_lahir']);

        $formAgt->addRadio("jk", "Jenis Kelamin", "radio", array(
            array("indeks" => 0, "value" => "&nbsp;Laki-Laki"),
            array("indeks" => 1, "value" => "&nbsp;Perempuan")),
            array(array($res['jk'] => 'selected'))
        );

        $formAgt->addField("no_hp", "No. HP", "text", $res['no_hp']);
        $formAgt->addField("email", "Email", "text", $res['email']);

        $formAgt->addSelect(
            "kelas",
            "Kelas",
            "select",
            array(
                array('indeks' => ' ', 'value' => ' '),
                array('indeks' => 'MIPA', 'value' => 'MIPA'),
                array('indeks' => 'Sosial', 'value' => 'Sosial'),
                array('indeks' => 'Bahasa', 'value' => 'Bahasa')),
                array(array($res['kelas'] => 'selected'))
              
        );

        $formAgt->addField("alamat", "Alamat", "text", $res['alamat']);

    endwhile;

        if (isset($_POST['tombol'])) {
            $formAgt->getForm();

            $data['nis'] = $_POST['nis'];
            $data['nama'] = $_POST['nama'];
            $data['tp_lahir'] = $_POST['tp_lahir'];
            $data['tgl_lahir'] = $_POST['tgl_lahir'];
            $data['jk'] = $_POST['jk'];
            $data['no_hp'] = $no_hp['tgl_lahir'];
            $data['email'] = $_POST['email'];
            $data['kelas'] = $_POST['kelas'];
            $data['alamat'] = $_POST['alamat'];

            $ModelAnggota = new ModelAnggota();
            $ModelAnggota->updatedata($no);

            $this->cetakdata();
        } else {
            $data = $formAgt->displayForm();

            require('view/Anggota_edit.php');
            
        }
    }

    public function cetakdata()
    {
        require('koneksi.php');
        require ('view/display.php');

        $ModelAnggota = new ModelAnggota();

        $data =
            "
            <h2><center>Data Anggota Perpustakaan</center></h2>
    
            <table class ='table table'>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th><center>Aksi</center></th>
                </tr>
        ";

        $sql = mysqli_query($koneksi,"SELECT * from anggota");
        while ($z = mysqli_fetch_array($sql)) {
            $data .= "<tr>";
            $data .= "<td>" . $z['nis'] . "</td>";
            $data .= "<td>" . $z['nama'] . "</td>";
            $data .= "<td>" . $z['tp_lahir'] . "</td>";
            $data .= "<td>" . date('d-m-Y', strtotime($z["tgl_lahir"])) . "</td>";
            $data .= "<td>" . $z['jk'] . "</td>";
            $data .= "<td>" . $z['no_hp'] . "</td>";
            $data .= "<td>" . $z['email'] . "</td>";
            $data .= "<td>" . $z['kelas'] . "</td>";
            $data .= "<td>" . $z['alamat'] . "</td>";

            $data .= "<td>
                
						<a href='anggota.php?target=edit&no=" . $z['no'] . "' class='badge badge-primary badge-pill ml-1'>Edit</a></button>
						<a href='anggota.php?target=delete&no=" . $z['no'] . "' class='badge badge-danger badge-pill ml-1' onclick='return confirm();'>Delete</a>
							
					</td>";

            $data .= "</tr>";
        } 

        require('view/View_anggota.php');
    }


    function deleteForm($no)
    {
        $deleteAgt = new ModelAnggota();
        $deleteAgt->deleteAgt($no);
        $this->cetakdata();
    }

}
?>