<?php
require_once __DIR__ . '/../Business Services/Model/MarriageConsultationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/MarriageConsultationController.php';
require_once __DIR__ . '/../facade.php';

    $model = new MarriageConsultationRecord();
    $controllers = new MarriageConsultationController($model);
    $facade = new formFacade($controllers);

    class CheckConsultationStatus
    {

        private $facade;
        private $applicant;

        public function __construct($facade)
        {
            $this->facade = $facade;
        }
        public function searchIC()
        {

        if (isset($_GET['searchIC'])) {
        //$applicantIC = $_GET['applicantIC'];
        $applicantIC = isset($_GET['applicantIC']) ? $_GET['applicantIC']: '';

        if (isset($_GET['searchIC'])){

        $this->applicant = $this->facade->searchIC($applicantIC);
        
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
    <style>
        table{
            border-collapse: collapse;
            width: 50%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }


.title{
            padding: 10px;
            font-family:"lucida console", monospace;
            background-color: #16537e;
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
        /* CSS styles for the footer */
        .footer {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }
        </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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
    <h4>NO K/P atau Passport Kena Adu</h4>
    <form action="" method="">
    <span><span class="required"></span></span><input type="text" class="" name="applicantIC" value=""><br><br>

    <input type="submit" name="searchIC" value="SEMAK"><br><br>
</form>
<?php if (!$this->applicant): ?>
    <div class="alert alert-primary">
        SILA KLIK DAFTAR BARU <a href="MarriageConsultationForm.php" class="alert-link">DAFTAR BARU</a>  </div>
        <?php endif; ?>
<form action="ViewConsultationAppointment.php" method="GET">
    <table>
        <tr>
            <th>Nama Pengadu</th>
            <th>IC Pengadu</th>
            <th>Nama Pasangan Kena Adu</th>
            <th>IC Pasangan Kena Adu</th>
            <th>Status</th>
            <th>Operasi</th>
</tr>

    <?php if($this->applicant): ?> 
    <tr>
    <td><?php echo $this->applicant['applicant_name']; ?></td>
    <td><?php echo $this->applicant['applicant_ic']; ?></td>
    <td><?php echo $this->applicant['partner_name']; ?></td>
    <td><?php echo $this->applicant['partner_ic']; ?></td>
    <td><?php echo $this->applicant['appointment_status']; ?></td>
    <td><a href="ViewConsultationAppointment.php?applicant_ic=<?php echo $this->applicant['applicant_ic'] ?> ">SEMAK</a></td>
    </tr>
    <?php endif; ?>
</table>

    </form>

    <div class="footer">
        <p>&copy; 2023 e-MUunakahat system. All rights reserved.</p>
    </div>
</body>
</html>
<?php

    }
}

$form = new CheckConsultationStatus($facade);
$form->searchIC();
//$form->renderForm();
    


