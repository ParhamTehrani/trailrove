<?php


namespace App\Business\Admin;


interface ContactUsServiceInterface
{
    public function getAll();

    public function show($id);

    public function update($id,$payload);
}
