<?php

class formFacade
{
    private $formController;
   

    public function __construct(MarriageConsultationController $formController)
    {
        $this->formController = $formController;
        
    }

    //from MarriageConsultationForm to controller
    public function submitForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $consultation_purpose)
    {
        $this->formController->sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $consultation_purpose);
    }

    //from sendAllApplicant to viewApplicant in ViewCnsultationList class
    public function viewApplicant()
    {
        return $this->formController->sendAllApplicant();
        
    }

    //seacrh ic 
    public function searchIC($applicantIC)
    {
        $this->formController->searchIC($applicantIC);
        return $this->formController->searchIC($applicantIC);    
    }

    //send applicant detail to ApproveMarriageConsultation
    public function viewDetail($applicantIC)
    {
       // $this->formController->viewDetail($applicantIC);
        return $this->formController->viewDetail($applicantIC);
    }

    //send all the appt detail from ApproveMarriageConsultation to controller
    public function apptDetail($advisor_name, $appointment_location, $appointment_date, $appointment_time, $appointment_status, $applicantIC)
    {
        $this->formController->apptDetail($advisor_name, $appointment_location, $appointment_date, $appointment_time, $appointment_status, $applicantIC);
    }

    //send appt detail to ViewConsultationAppointment
    public function viewAppt($applicantIC)
    {
       //$this->formController->viewDetail($applicantIC);
        return $this->formController->viewAppt($applicantIC);
    }
    
    public function EditAppointment($appointment_location, $appointment_date, $appointment_time, $consultation_id)
    {
        $this->formController->EditAppointment($appointment_location, $appointment_date, $appointment_time, $consultation_id);
    }
    
}

?>