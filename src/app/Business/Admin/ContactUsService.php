<?php


namespace App\Business\Admin;

use App\Repository\ContactUsRepositoryInterface;

class ContactUsService implements ContactUsServiceInterface
{

    private $contact;
    public function __construct(ContactUsRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }

    public function getAll()
    {
        return $this->contact->getByPaginate();
    }

    public function show($id)
    {
        $contact = $this->contact->findById($id);
        $this->update($contact['id'], ['seen' => true]);
        return $contact;
    }

    public function update($id, $payload)
    {
        $this->contact->update($id, $payload);
    }
}
