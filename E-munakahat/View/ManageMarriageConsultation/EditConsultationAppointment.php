<?php
require_once __DIR__ . '/../Business Services/Model/MarriageConsultationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/MarriageConsultationController.php';
require_once __DIR__ . '/../facade.php';

$model = new MarriageConsultationRecord();
$controllers = new MarriageConsultationController($model);
$facade = new formFacade($controllers);

class EditConsultationAppointment
{

    private $facade;

    public function __construct($facade)
    {
        $this->facade = $facade;
    }

    public function EditAppointment()
    {

$consultation_id = '';

if (isset($_GET['consultation_id'])) {
    $consultation_id = $_GET['consultation_id'];

    if(isset($_POST['editAppt']))
{
    $appointment_location = $_POST['appointment_location'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    if((empty($appointment_location)) || (empty($appointment_date))|| (empty($appointment_time)))
            {
                $alertMessage = "SILA ISI MAKLUMAT TEMUJANJI DENGAN LENGKAP. ";
            } else {
    
                $this->facade->EditAppointment($appointment_location, $appointment_date, $appointment_time, $consultation_id);
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
        <a href="CheckConsultationStatus.php">Khidmat Nasihat</a>
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
    <h2>PERMOHONAN TUKAR TEMUJANJI</h2>
    <table>
<form action="" method="POST">
    <label for="appointment_location">Pilih Lokasi:</label>
    <select name="appointment_location" id="location">
        <option value="Bilik Konsultasi 1">Bilik Konsultasi 1</option>
        <option value="Bilik Konsultasi 2">Bilik Konsultasi 2</option>
        <option value="Bilik Konsultasi 3">Bilik Konsultasi 3</option>
        
</select><br><br>
    <span>Tarikh Temujanji: <span class="required">*</span></span><input type="date" class="" name="appointment_date" value=""><br><br>
    <span>Masa Temujanji: <span class="required">*</span></span><input type="time" class="" name="appointment_time" value=""><br><br>


    <input type="submit" name="editAppt" value="HANTAR">
    </form>
    <form action="CheckConsultationStatus.php" method="post">
            <input class="button" type="submit" value="KEMBALI" name="back">
    </form>
    </table>

<div class="footer">
        <p>&copy; 2023 e-MUunakahat system. All rights reserved.</p>
    </div>
</body>
</html>
<?php
}
}

$form = new EditConsultationAppointment($facade);
$form->EditAppointment();