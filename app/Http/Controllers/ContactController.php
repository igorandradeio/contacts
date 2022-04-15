<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;

class ContactController extends Controller
{

    protected $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->repository->getContacts();

        return view('website.home.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->repository->getContactById($id);

        return view('admin.contact.edit', compact('contact'));
    }
}
