<?php
namespace Insyghts\Authentication\Services;

use Exception;
use Insyghts\Authentication\Helpers\Helpers;
use Insyghts\Authentication\Models\User;

class UserService{
    function __construct(User $user) {

        $this->user = $user;
        $this->token = Helpers::get_token();
    }

    public function login(array $input)
    {
      $response = [
        'success' => false,
        'data' => 'Invalid username or password',
      ];

      $Contact = new User();
      $this->user->login($input, $response);

      return $response;
    }

    public function checkToken($token)
    {
      $result = false;
      try{
        $result = $this->user->checkToken($token);
      }catch(Exception $e){
        $show = get_class($e) == "Illuminate\Database\QueryException" ? false : true;
        if($show){
          $result = false;
        }
      }finally{
        return $result;
      }
    }

    public function refreshToken()
    {
        $response = [
            'success' => false,
            'data' => 'There is some error',
        ];

        try{
            $result = $this->user->refreshToken($this->token, $response);

        }catch(Exception $e){
            $show = get_class($e) == "Illuminate\Database\QueryException" ? false : true;
            if($show){
              $response['data'] = $e->getMessage();
            }
        }finally{
            return $response;
        }
    }
}
