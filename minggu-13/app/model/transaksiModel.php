<?php
class TransaksiModel
{
    public $idTranscation = null;
    public $idUser;
    public $idMember;
    public $nominal;
    public $image;
    public $type;
    function __construct(int $idTranscation, int $idUser, int $idMember, int $nominal, string $image, string $type)
    {
        $this->idTranscation = $idTranscation;
        $this->idUser = $idUser;
        $this->idMember = $idMember;
        $this->nominal = $nominal;
        $this->image = $image;
        $this->type = $type;
    }

    static function init(int $idUser, int $idMember, int $nominal, string $image, string $type)
    {
        $model = new TransaksiModel('NULL', $idUser, $idMember, $nominal, $image, $type);
        return $model;
    }

    function getInsertQuery()
    {
        return "INSERT INTO transaction VALUES (DEFAULT, '$this->idUser','$this->idMember', '$this->nominal', '$this->image', '$this->type');";
    }

    function getSelectOneQuery()
    {
        return "SELECT * FROM transaction WHERE id_transaction = '$this->idTranscation'";
    }
    function getSelectAllQuery()
    {
        return "SELECT * FROM transaction";
    }
};
