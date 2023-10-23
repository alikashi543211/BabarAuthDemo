<?php

namespace Insyghts\Authentication\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Insyghts\Authentication\Models\Contact;
use Insyghts\Authentication\Models\User;
use Insyghts\Authentication\Services\UserService;

class Helpers
{
    public static function addUser($username, $password)
    {

        if($username != '' && $password != ''){
            $password = Hash::make($password);
        }

        $user = new User();
        $user->username = $username;
        $user->password = $password;

        if($user->save()){
            return ['success' => true, 'message' => 'User created successfully!'];
        }
        return ['success' => false, 'message' => 'There is some error!'];
    }

    public static function bulkImportUser($contacts=[])
    {
        if(! count($contacts) > 0){
            $contacts = [
                0 => [
                    'system_contact_id' => 1,
                    'first_name' => 'Babar',
                    'last_name' => 'Aslam',
                    'mobile' => '123456790',
                    'email' => 'babar@gmail.com',
                    'designation' => 2,
                    'department' => 2,
                    'company_id' => 1,
                ],
                1 => [
                    'system_contact_id' => 1,
                    'first_name' => 'Muhammad',
                    'last_name' => 'Akhtar',
                    'mobile' => '123456789',
                    'email' => 'akhtar@gmail.com',
                    'designation' => 1,
                    'department' => 1,
                    'company_id' => 1, 
                ]
            ];
        }
        $users = [];
        if(count($contacts) > 0){
            foreach($contacts as $key => $contact){
                // $contacts[$key]['password'] = Hash::make($contacts['password']);
                if($contact_id = Contact::insertGetId($contact)){
                    $user = [];
                    $user['username'] = $contact['email'];
                    $user['password'] = Hash::make('password');
                    $user['contact_id'] = $contact_id;
                    array_push($users, $user);
                }
            }
            User::insert(
                $users
            );
        }
        echo '<pre>'; print_r('inserted'); exit;
    }

    public static function get_token()
    {
        $token = '';
        if(isset($_SERVER['HTTP_TOKEN'])){
            $token = $_SERVER['HTTP_TOKEN'];
        }
        return $token;
    }
}