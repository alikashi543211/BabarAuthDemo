<?php
namespace Insyghts\Authentication\Services;

use Insyghts\Authentication\LoginUser;
use Insyghts\Authentication\Models\Contact;

class ContactService{


    function __construct(Contact $contact, LoginUser $loginUser) {

        $this->contact = $contact;
        $this->loginUser = $loginUser;

    }


      public function allContacts()
      {
        $response = [
            'success' => false,
            'data' => 'Erorr',
        ];
        $Contact = new Contact();
        $this->contact->Contacts($response);
        return $response;

      }

      public function single($id)
      {
        $response = [
            'success' => false,
            'data' => 'Erorr',
        ];
        $Contact = new Contact();
        $this->contact->single($id , $response);
        return $response;

      }

      public function store(array $input)
      {
        $response = [
            'success' => false,
            'data' => 'Erorr',
        ];
        $Contact = new Contact();
        $this->contact->store($input, $response);
        return $response;

      }

      public function update(array $data , $id)
      {
        $response = [
            'success' => false,
            'data' => 'Erorr',
        ];
        $Contact = new Contact();
        $this->contact->ConttactUpdate($data , $id , $response);
        return $response;
      }

      public function delete($id)
      {
        $response = [
            'success' => false,
            'data' => 'Erorr',
        ];
        $Contact = new Contact();
        $this->contact->delete_contact($id, $response);
        return $response;
      }



}
