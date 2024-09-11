<?php

// make:model



namespace App\Models;

use CodeIgniter\Model;

class NoticiaModel extends Model
{
    protected $table            = 'noticias'; //<--- único atributo obrigatório
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;  // <-- deletar com segurança
    protected $protectFields    = true;
    protected $allowedFields    = ['titulo','descricao','autor'];   // <---- compos que podem sofrer edição

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;  //<-- importante
    protected $dateFormat    = 'datetime'; //*
    protected $createdField  = 'created_at'; //*
    protected $updatedField  = 'updated_at'; //*
    protected $deletedField  = 'deleted_at'; //*

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


}
