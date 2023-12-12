<?php


namespace App\Business\Admin;


interface SliderServiceInterface
{
    public function getSliders();

    public function storeSlider($payload);

    public function updateSlider($id,$payload);

    public function deleteSlider($id);
}
