<?php
class MemberModel
{
    public $idMember = 'null';
    public string $firstName;
    public string $lastName;
    public string $kota;
    public string $provinsi;
    public string $kodePos;
    public string $kelas;

    function __construct($idMember, $firstName, $lastName, $kota, $provinsi, $kodePos, $kelas)
    {
        $this->idMember = $idMember;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->kota = $kota;
        $this->provinsi = $provinsi;
        $this->kodePos = $kodePos;
        $this->kelas = $kelas;
    }

    static function init($firstName, $lastName, $kota, $provinsi, $kodePos, $kelas)
    {
        $model = new MemberModel('NULL', $firstName, $lastName, $kota, $provinsi, $kodePos, $kelas);
        return $model;
    }

    function getInsertQuery()
    {
        return "INSERT INTO member VALUES (DEFAULT, '$this->firstName', '$this->lastName', '$this->kota','$this->provinsi','$this->kodePos', '$this->kelas');";
    }

    static function getSelectOneQuery($kelas)
    {
        $sql = "SELECT id_transaction, first_name, kelas, nominal from member right join transactions"
            . "on member.id_member = transactions.id_user where kelas $kelas";
        return $sql;
    }

    static function getSelectAllQuery()
    {
        return "SELECT * FROM member";
    }
};
