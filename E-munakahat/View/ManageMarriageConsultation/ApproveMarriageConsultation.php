<?php

require_once __DIR__ . '/../Business Services/Model/MarriageConsultationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/MarriageConsultationController.php';
require_once __DIR__ . '/../facade.php';

$model = new MarriageConsultationRecord();
$controllers = new MarriageConsultationController($model);
$facade = new formFacade($controllers);

class ApproveMarriageConsultation
{
    private $facade;
    private $applicantDetail;
    private $applicantIC;

    public function __construct($facade)
    {
        $this->facade = $facade;
    }

    public function viewDetail()
    {
        $applicantIC = '';

        if (isset($_GET['applicant_ic'])) {
        $applicantIC = $_GET['applicant_ic'];
        $this->applicantIC = $applicantIC;

        $this->applicantDetail = $this->facade->viewDetail($applicantIC);

        if (isset($_POST['submitStatus']))
        {
        
        $advisor_name = $_POST['advisor_name'];
        $appointment_location = $_POST['appointment_location'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];
        $appointment_status = $_POST['appointment_status'];
    
        if(empty($advisor_name) || (empty($appointment_location)) || (empty($appointment_date))|| (empty($appointment_time)) || (empty($appointment_status)) )
            {
                $alertMessage = "SILA ISI MAKLUMAT DENGAN LENGKAP. ";
            } else {
    
                $this->facade->apptDetail($advisor_name, $appointment_location, $appointment_date, $appointment_time, $appointment_status, $applicantIC);
                $submitMessage = "MAKLUMAT BERJAYA DIHANTAR";
    }
    
    }


        }
        
        
        

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .title{
            padding: 10px;
            font-family:"lucida console", monospace;
            background-color: #6DA740;
            color: #f2f2f2;
        }
        
        .body{
            background-color:#cfe2f3;
        }

        /* CSS styles for the navigation bar */
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

    </style>
</head>

<body>
<div class="title">
        <h1><b>e-Munakahat</b></h1>
        <h2>SISTEM MAKLUMAT PERKAHWINAN PAHANG</H2>
    </div>

    <div class="navbar">
        <a href="#">Profil</a>
        <a href="">Kursus Perkahwinan</a>
        <a href="#">Permohonan Perkahwinan</a>
        <a href="#">Pendaftaran Perkahwinan</a>
        <a href="#">Khidmat Nasihat</a>
        <a href="#">Insentif</a>
        <!-- <a href="#">Salinan Document</a>
        <a href="#">Pembetulan Dokumen</a> -->
    </div>

    <?php if (isset($alertMessage)): ?>
    <div class = "alert alert-danger">
        <?php echo $alertMessage;?>
    </div>
    <?php endif; ?>

    <?php if(isset($submitMessage)): ?>
    <div class = "alert alert-primary">
        <?php echo $submitMessage;?>
    </div>
    <?php endif; ?>

<h2>Maklumat Pemohon</h2>

    <td>No KP Pemohon: </td>
    <?php echo $this->applicantDetail['applicant_ic'] ?><br><br></td>
    <td>Nama Pemohon: </td>
    <td><?php echo $this->applicantDetail['applicant_name'] ?><br><br></td>
    <td>Jantina Pemohon: </td>
    <td><?php echo $this->applicantDetail['applicant_gender'] ?><br><br></td>
    <td>Umur Pemohon: </td>
    <td><?php echo $this->applicantDetail['applicant_age'] ?><br><br></td>
    <td>Gaji Pemohon: </td>
    <td><?php echo $this->applicantDetail['applicant_salary'] ?><br><br></td>
    
    <h2>Maklumat Pasangan</h2>
    <td>No KP Pasangan: </td>
    <td><?php echo $this->applicantDetail['partner_ic'] ?><br><br></td>
    <td>Nama Pasangan: </td>
    <td><?php echo $this->applicantDetail['partner_name'] ?><br><br></td>
    <td>Jantina Pasangan: </td>
    <td><?php echo $this->applicantDetail['partner_gender'] ?><br><br></td>
    <td>Umur Pasangan: </td>
    <td><?php echo $this->applicantDetail['partner_age'] ?><br><br></td>
    <td>Gaji Pasangan: 
    <td><?php echo $this->applicantDetail['partner_salary'] ?><br><br></td>

    <td>Tujuan Pengaduan:</td>
    <td><?php echo $this->applicantDetail['consultation_purpose'] ?><br><br></td>
    
    <form action="" method="POST">
   
    <h2>Maklumat TemuJanji</h2>
    <label for="advisor_name">Pilih Penasihat:</label>
    <select name="advisor_name" id="advisor">
        <option value="Halimah binti Yaakob">Halimah binti Yaakob</option>
        <option value="Siti Mariam binti Hasan">Siti Mariam binti Hasan</option>
        <option value="Yusuf binti Jamaludin">Yusuf binti Jamaludin</option>
        <option value="-">-</option>
</select><br><br>

    <label for="appointment_location">Pilih Lokasi:</label>
    <select name="appointment_location" id="location">
        <option value="Bilik Konsultasi 1">Bilik Konsultasi 1</option>
        <option value="Bilik Konsultasi 2">Bilik Konsultasi 2</option>
        <option value="Bilik Konsultasi 3">Bilik Konsultasi 3</option>
        <option value="-">-</option>
</select><br><br>
    <span>Tarikh Temujanji: <span class="required">*</span></span><input type="date" class="" name="appointment_date" value=""><br><br>
    <span>Masa Temujanji: <span class="required">*</span></span><input type="time" class="" name="appointment_time" value=""><br><br>

    <label for="appointment_status">Status Permohonan:</label>
    <select name="appointment_status" id="status">
        <option value="Berjaya">Berjaya</option>
        <option value="Tidak Berjaya">Tidak berjaya</option>
</select><br><br>

    <input type="submit" name="submitStatus" value="HANTAR">
   

</form>
<form action="ViewConsultationList.php" method="post">
            <input class="button" type="submit" value="KEMBALI" name="back">
    </form>
</body>

<footer>
    <div class="footer">
    <p>&copy; 2023 e-MUunakahat system. All rights reserved.</p>
    </div>
    </footer>
</html>
<?php

}

}

$form = new ApproveMarriageConsultation($facade);
$form->viewDetail();
//$form->apptDetail();
//$form->renderForm();

