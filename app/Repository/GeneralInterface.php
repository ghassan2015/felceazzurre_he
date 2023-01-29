<?php

namespace App\Repository;

interface GeneralInterface
{
    public function Index();
    public function getAllModel($request);


    public function Create();
    public function Store($request);
    public function Edit($id);
    public function Update($request);
    public function Delete($request);
    public function UpadteState($request);
}
