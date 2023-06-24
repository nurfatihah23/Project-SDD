<?php

class MarriageConsultationController
{
    private $model;

    public function __construct (MarriageConsultationRecord $model)
    {
        $this->model = $model;
    }

    //to send form from MarriageConsultationForm to model
    public function sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $consultation_purpose)
    {
        $this->model->sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender, $applicant_age, $applicant_salary, $consultation_purpose);
    }

        //send all applicant info from database to ViewConsultationList class
    public function sendAllApplicant()
    {
        return $this->model->viewAllApplication();
    }

    //
    /*/public function submitId($applicant_ic)
    {
        $this->model->submitId($applicant_ic);
    }*/

    //
    /*public function sendAppInfo($applicant_ic)
    {
        return $this->model->submitId($applicant_ic);
    }*/


    //searh applicant ic number and send the information back to CheckConsultationStatus
    public function searchIC($applicantIC)
    {
        $this->model->searchIC($applicantIC);
        return $this->model->searchIC($applicantIC);
    }


    //retrieve applicant data from database to be viewed by JAIP staff in ApproveMarriageConsultation 
    public function viewDetail($applicantIC)
    {
       // $this->model->viewDetail($applicantIC);
        return $this->model->viewDetail($applicantIC);
    }

    //send the appointment detail from ApproveMarriageConsultation to model
    public function apptDetail($advisor_name, $consultation_location, $consultation_date, $consultation_time, $consultation_status, $applicantIC)
    {
        $this->model->apptDetail($advisor_name, $consultation_location, $consultation_date, $consultation_time, $consultation_status, $applicantIC);
    }


    //send the appointment detail from model to ViewConsultationAppointment
    public function viewAppt($applicantIC)
    {
       //$this->model->viewDetail($applicantIC);
        return $this->model->viewAppt($applicantIC);
    }

    public function EditAppointment($appointment_location, $appointment_date, $appointment_time, $consultation_id)
    {
        $this->model->EditAppointment($appointment_location, $appointment_date, $appointment_time, $consultation_id);
    }
}



    



?>