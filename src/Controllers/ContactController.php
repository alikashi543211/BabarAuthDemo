<?php

namespace Insyghts\Authentication\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Insyghts\Authentication\Middleware\myAuth;
use Insyghts\Authentication\Models\Contact;
use Insyghts\Authentication\Services\ContactService;

class ContactController extends Controller
{

    public function __construct(ContactService $ContactService)
    {
        $this->middleware(myAuth::class);
        $this->contactService = $ContactService;
    }

    public function contacts(Request $request)
    {

        $Contact = new Contact();
        $result = $this->contactService->allContacts();

        return response()->json($result);

    }

    public function single($id)
    {
        $Contact = new Contact();
        $result = $this->contactService->single($id);

        return response()->json($result);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'system_contact_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'department' => 'required',
            'company_id' => 'required',

        ]);

        $input = $request->input();
        $result = $this->contactService->store($input);

        return response()->json($result);

    }

    public function update(Request $request ,$id)
    {
        $this->validate($request, [
            'system_contact_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'designation' => 'required',
            'department' => 'required',
            'company_id' => 'required',

        ]);
        $input = $request->input();
        $result = $this->contactService->update($input ,$id);

        return response()->json($result);

    }


    public function delete($id)
    {
        $Contact = new Contact();
        $result = $this->contactService->delete($id);

        return response()->json($result);

    }







}
