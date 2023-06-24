<?php
require_once __DIR__ . '/../Business Services/Model/MarriageConsultationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/MarriageConsultationController.php';
require_once __DIR__ . '/../facade.php';

$model = new MarriageConsultationRecord();
$controllers = new MarriageConsultationController($model);
$facade = new formFacade($controllers);

class ViewConsultationList
{

    private $facade;
    private $applicantList;

    public function __construct($facade)
    {
        $this->facade = $facade;
    }

    public function viewApplicant()
    {
        $this->applicantList = $this->facade->viewApplicant();
        

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
        
            <form action="ApproveMarriageConsultation.php" method="GET">
            <table class="table">
                <thead class = "table-info">
                <tr>
                    <th>Nama Pengadu</th>
                    <th>IC Pengadu</th>
                    <th>Nama Pasangan</th>
                    <th>IC Pasangan</th>
                    <th>Operasi</th>
        </tr>
        </thead
        
        <?php foreach ($this->applicantList as $applicant):  ?>
        <tr>
            <td><?php echo $applicant['applicant_name']; ?></td>
            <td><?php echo $applicant['applicant_ic']; ?></td>
            <td><?php echo $applicant['partner_name']; ?></td>
            <td><?php echo $applicant['partner_ic']; ?></td>
            <td><a href="ApproveMarriageConsultation.php?applicant_ic=<?php echo $applicant['applicant_ic'] ?> ">SEMAK</a></td>
            </tr>
            <?php endforeach; ?>
        
        </table>
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

$form = new ViewConsultationList($facade);
$form->viewApplicant();
//$form->renderForm();

