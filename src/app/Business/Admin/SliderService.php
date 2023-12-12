<?php


namespace App\Business\Admin;



use App\Repository\SliderRepositoryInterface;

class SliderService implements SliderServiceInterface
{
    private $slider;
    public function __construct(SliderRepositoryInterface $slider)
    {
        $this->slider = $slider;
    }

    public function updateSlider($id,$payload)
    {
        return $this->slider->update($id,$payload);
    }

    public function getSliders()
    {
        return $this->slider->getSlidersWithSearch();
    }

    public function storeSlider($payload)
    {
        return $this->slider->create($payload);
    }

    public function deleteSlider($id)
    {
        return $this->slider->deleteById($id);
    }
}
