<?php

class Model
{
    public $con="";
    public function __construct()
    {
        $this->con = new mysqli("localhost","root","","farm_db");
    }
    public function SelectAll($tbl) // badha mate query na lakhvi pade mate $tbl as a parameter pass karyu
    {
        $sql = "select * from $tbl";
        $q = $this->con->query($sql); // query execute
        while($f=$q->fetch_object())
        {
            $result[] = $f;
        }
        return $result;
    }
    public function InsertData($tbl,$data)
    {
        // insert data tablename(name,password..)values('','',...)
        $key = array_keys($data);
        $dk = implode(",",$key); // convert array to string alag kare keys
        $val = array_values($data);
        $dv = implode("','",$val);

        $sql = "insert into $tbl ($dk) values ('$dv')";
        // echo $sql;exit; // check work or not
        $a = $this->con->query($sql);
        return $a;

    }
    function Select_Where($tbl,$where)
    {
        //select * from TBL where name=this and password=this where 1=1
        $key = array_keys($where);
        $val = array_values($where);
        $sql = "select * from $tbl where 1=1";
        $i=0;
        foreach($where as $w)
        {
            $sql.=" and $key[$i] = '$val[$i]'";
            $i++;
        }
        // echo $sql;exit;
        $q = $this->con->query($sql);
        return $q;
    }
    public function Join_Two($tbl,$tb2,$on) // badha mate query na lakhvi pade mate $tbl as a parameter pass karyu
    {
        $sql = "select * from $tbl JOIN $tb2 ON $on";
        $q = $this->con->query($sql); // query execute
        while($f=$q->fetch_object())
        {
            $result[] = $f;
        }
        return $result;
    }
    
}


?>