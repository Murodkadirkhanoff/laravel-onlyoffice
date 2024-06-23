<?php

namespace App\Repositories\OnlyOffice;

interface OnlyOfficeRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(array $documentData);
    public function update($id, array $documentData);
    public function delete($id);
}
