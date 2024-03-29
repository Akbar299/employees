<?php
include_once (__DIR__ . "/DB.php");
class EmployeesPilihan{
    private $table_name='employees';
    private $db = null;
    public  $employee_id = null;
    private $first_name = null;
    private $last_name = null;
    private $email = null;
    private $phone_number = null;
    private $hire_date = null;
    private $job_id = null;
    private $salary = null;
    private $commision_pct = null;
    private $manager_id = null;
    private $department = null;

    function __construct(){
        if ($this->db ==  null){
            $conn = new DB();
            $this->db = $conn->db;
        }
    }

    function setValue($employee_id,$first_name,$last_name,$email,$phone_number,$hire_date,$job_id,$salary,$commision_pct,$manager_id,$department){
        // $this();
        $this->employee_id = $employee_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->hire_date = $hire_date;
        $this->job_id = $job_id;
        $this->salary = $salary;
        $this->commission_pct = $commision_pct;
        $this->manager_id = $manager_id;
        $this->department = $department;
        // echo "KOneksi";

    }

    //fungsi delete data
    function deleteValue($employee_id,$first_name,$last_name,$email,$phone_number,$hire_date,$job_id,$salary,$commision_pct,$manager_id,$department){
        // $this();
        $this->employee_id = $employee_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->hire_date = $hire_date;
        $this->job_id = $job_id;
        $this->salary = $salary;
        $this->commission_pct = $commision_pct;
        $this->manager_id = $manager_id;
        $this->department = $department;
        // echo "KOneksi";

    }


    ///fungsi pennyimpanan data berhasil atau tidak
    function create(){
        $count =  count($this->getEmployeesPilihan($this->employee_id));
        if ($count>0) {
            http_response_code(503);
            return array('msg' => "Data sudah ada, tidak berhasil disimpan");
        } elseif ($this->employee_id==null){
            http_response_code(503);
            return array('msg' => "Kode tidak boleh kosong, tidak berhasil disimpan");
        } else{
            $kueri = "INSERT INTO ".$this->table_name." SET ";
            $kueri .= "employee_id='".$this->employee_id."',";
            $kueri .= "first_name='".$this->first_name."',";
            $kueri .= "last_name='".$this->last_name."',";
            $kueri .= "email='".$this->email."',";
            $kueri .= "phone_number='".$this->phone_number."',";
            $kueri .= "hire_date='".$this->hire_date."',";
            $kueri .= "job_id='".$this->job_id."',";
            $kueri .= "salary='".$this->salary."',";
            $kueri .= "commision_pct='".$this->commision_pct."',";
            $kueri .= "manager_id='".$this->manager_id."',";
            $kueri .= "department='".$this->department."'";
            $hasil = $this->db->query($kueri);
            if ($hasil) {
                http_response_code(201);
                return array('msg' => 'Data Berhasil disimpan');
            } else {
                http_response_code(503);
                return array('msg' => 'Data Gagal disimpan '.$this->db->error);
            }

        }
    }

    ///fungsi delete data
    function delete(){
            $kueri = "DELETE FROM ".$this->table_name." WHERE employee_id='".$this->employee_id."'";
            $hasil = $this->db->query($kueri);
            if ($hasil) {
                http_response_code(201);
                return array('msg' => 'Data Berhasil dihapus');
            } else {
                http_response_code(503);
                return array('msg' => 'Data Gagal dihapus '.$this->db->error);
            }

        }
    

        function getAll(){
            // return "test";
            $kueri = "SELECT * FROM ".$this->table_name." ORDER BY employee_id";
            $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
            $data = array();
            while ($row = $hasil->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
    function getEmployeesPilihan($kode){
        // return "test";
        $kueri = "SELECT * FROM ".$this->table_name;
        $kueri .=" WHERE employee_id='".$kode."'";
        $hasil = $this->db->query($kueri) or die ("Error ".$this->db->connect_error);
        $data = array();
        while ($row = $hasil->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }

}