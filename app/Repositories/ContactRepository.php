<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    protected $entity;

    public function __construct(Contact $contact)
    {
        $this->entity = $contact;
    }

    public function getContacts()
    {
        return $this->entity->get();
    }

    public function getContactById($id)
    {
        return $this->entity->findOrFail($id);
    }

    public function createNewContact(array $data)
    {
        return $this->entity->create($data);
    }

    public function updateContactById($id, array $data)
    {
        $contact = $this->entity->findOrFail($id);

        return $contact->update($data);
    }

    public function deleteContactById($id)
    {
        $contact = $this->entity->findOrFail($id);

        return $contact->delete();
    }
}
