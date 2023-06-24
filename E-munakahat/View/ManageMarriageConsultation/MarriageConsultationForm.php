
<?php
require_once __DIR__ . '/../Business Services/Model/MarriageConsultationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/MarriageConsultationController.php';
require_once __DIR__ . '/../facade.php';

$model = new MarriageConsultationRecord();
$controllers = new MarriageConsultationController($model);
$facade = new formFacade($controllers);

class MarriageConsultationForm
{

    private $facade;

    public function __construct($facade)
    {
        $this->facade = $facade;
    }
    public function submitForm()
    {
    if (isset($_POST['submitApplicant'])) {
        $partner_ic = $_POST['partner_ic'];
        $partner_name = $_POST['partner_name'];
        $partner_gender = $_POST['partner_gender'];
        $partner_age = $_POST['partner_age'];
        $partner_salary = $_POST['partner_salary'];
        $applicant_ic = $_POST['applicant_ic'];
        $applicant_name = $_POST['applicant_name'];
        $applicant_gender = $_POST['applicant_gender'];
        $applicant_age = $_POST['applicant_age'];
        $applicant_salary = $_POST['applicant_salary'];
        $consultation_purpose = $_POST['consultation_purpose'];

        if(empty($partner_ic) || (empty($partner_name)) || (empty($partner_gender))|| (empty($partner_age)) || (empty($partner_salary)) || (empty($applicant_ic)) || (empty($applicant_name)) || (empty($applicant_gender)) || (empty($applicant_age)) || (empty($applicant_salary)))
        {
            $alertMessage = "SILA ISI BORANG DENGAN LENGKAP. ";
        } else {

            $this->facade->submitForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender, $applicant_age, $applicant_salary, $consultation_purpose);
            $submitMessage = "BORANG BERJAYA DIHANTAR";
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
    
        <h2>Maklumat Pengadu</h2>
        <form action="" method="POST">
        <span>No KP Pemohon: <span class="required">*</span></span><input type="text" class="" name="applicant_ic" value=""><br><br>
        <span>Nama Pemohon: <span class="required">*</span></span><input type="text" class="" name="applicant_name" value=""><br><br>
        <span>Jantina Pemohon: <span class="required">*</span></span><input type="text" class="" name="applicant_gender" value=""><br><br>
        <span>Umur Pemohon: <span class="required">*</span></span><input type="text" class="" name="applicant_age" value=""><br><br>
        <span>Gaji Pemohon: <span class="required">*</span></span><input type="text" class="" name="applicant_salary" value=""><br><br>
    
        <h2>Maklumat Pasangan</h2>
        <span>No KP Pasangan: <span class="required">*</span></span><input type="text" class="" name="partner_ic" value=""><br><br>
        <span>Nama Pasangan: <span class="required">*</span></span><input type="text" class="" name="partner_name" value=""><br><br>
        <span>Jantina Pasangan: <span class="required">*</span></span><input type="text" class="" name="partner_gender" value=""><br><br>
        <span>Umur Pasangan: <span class="required">*</span></span><input type="text" class="" name="partner_age" value=""><br><br>
        <span>Gaji Pasangan: <span class="required">*</span></span><input type="text" class="" name="partner_salary" value=""><br><br><br><br>
    
        <label for="consultation_purpose">Maklumat Aduan:</label>
        <select name="consultation_purpose" id="consultation_purpose">
            <option value="Khidmat Nasihat">Khidmat Nasihat</option>
            <option value="Perceraian">Perceraian</option>
            <option value="Wali Enggan">Wali Enggan</option>
    </select><br><br>
        <input type="submit" name="submitApplicant" value="HANTAR">
    
    </form>
    <form action="CheckConsultationStatus.php" method="post">
            <input class="button" type="submit" value="KEMBALI" name="back">
    </form>
    
    
    <div class="footer">
            <p>&copy; 2023 e-MUunakahat system. All rights reserved.</p>
        </div>
    </body>
    </html>
    <?php
}

}

$form = new MarriageConsultationForm($facade);
$form->submitForm();
//$form->renderForm();


