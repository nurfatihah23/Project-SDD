<?php
require_once __DIR__ . '/../Business Services/Model/MarriageConsultationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/MarriageConsultationController.php';
require_once __DIR__ . '/../facade.php';

$model = new MarriageConsultationRecord();
$controllers = new MarriageConsultationController($model);
$facade = new formFacade($controllers);

class ViewConsultationAppointment
{
    private $facade;
    private $apptDetail;

    public function __construct($facade)
    {
        $this->facade = $facade;
    }

    public function viewAppt()
    {
        $applicantIC = '';

    if (isset($_GET['applicant_ic'])) {
    $applicantIC = $_GET['applicant_ic'];

    //$facade->viewAppt($applicantIC);
   
    }
    $this->apptDetail = $this->facade->viewAppt($applicantIC);

    


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
    
    <h2>Maklumat Pemohon</h2>
    
    <table>
        <tr>
            <td>No KP Pemohon: </td>
            <td><?php echo $this->apptDetail['applicant_ic'] ?></td>
        </tr>
    
        <tr>
            <td>Nama Pemohon: </td>
            <td><?php echo $this->apptDetail['applicant_name'] ?></td>
        </tr>
    
        <tr>
            <td>Jantina Pemohon: </td>
            <td><?php echo $this->apptDetail['applicant_gender'] ?></td>
        </tr>
    
        <tr>
            <td>Umur Pemohon: </td>
            <td><?php echo $this->apptDetail['applicant_age'] ?></td>
        </tr>
    
        <tr>
            <td>Gaji Pemohon: </td>
            <td><?php echo $this->apptDetail['applicant_salary'] ?></td>
        </tr>
    
    </table>
    
    <h2>Maklumat Pasangan</h2>
    
    <table>
        <tr>
            <td>No KP Pasangan: </td>
            <td><?php echo $this->apptDetail['partner_ic'] ?></td>
        </tr>
    
        <tr>
            <td>Nama Pasangan: </td>
            <td><?php echo $this->apptDetail['partner_name'] ?></td>
        </tr>
    
        <tr>
            <td>Jantina Pasangan: </td>
            <td><?php echo $this->apptDetail['partner_gender'] ?></td>
        </tr>
    
        <tr>
            <td>Umur Pasangan: </td>
            <td><?php echo $this->apptDetail['partner_age'] ?></td>
        </tr>
    
        <tr>
            <td>Gaji Pasangan: </td>
            <td><?php echo $this->apptDetail['partner_salary'] ?></td>
        </tr>
    </table>
    
    <h2>Maklumat Temujanji</h2>
    
    <table>
    
        <tr>
            <td>ID Pengaduan: </td>
            <td><?php echo $this->apptDetail['consultation_id'] ?></td>
        </tr>
    
        <tr>
            <td>Tujuan Pengaduan: </td>
            <td><?php echo $this->apptDetail['consultation_purpose'] ?></td>
        </tr>
    
        <tr>
            <td>Nama Penasihat: </td>
            <td><?php echo $this->apptDetail['advisor_name'] ?></td>
        </tr>
    
        <tr>
            <td>Lokasi Temujanji: </td>
            <td><?php echo $this->apptDetail['appointment_location'] ?></td>
        </tr>
    
        <tr>
            <td>Tarikh Temujanji: </td>
            <td><?php echo $this->apptDetail['appointment_date'] ?></td>
        </tr>
    
        <tr>
            <td>Masa Temujanji: </td>
            <td><?php echo $this->apptDetail['appointment_time'] ?></td>
        </tr>
    
        <tr>
            <td>Status:  </td>
            <td><?php echo $this->apptDetail['appointment_status'] ?></td>
        </tr>
    
        <tr>
            <td>Operasi:  </td>
            <td><a href="EditConsultationAppointment.php?consultation_id=<?php echo $this->apptDetail['consultation_id'] ?> ">UBAH TEMUJANJI</a></td>
        </tr>
        
    </table><br><br>
    
    
    <button id="printAppt">CETAK</button>
    <script>
                document.getElementById('printAppt').addEventListener('click', function()
                {
                    window.print();
                }
            );
            </script>
    
    <form action="CheckConsultationStatus.php" method="post">
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

$form = new ViewConsultationAppointment($facade);
$form->viewAppt();
//$form->renderForm();



    