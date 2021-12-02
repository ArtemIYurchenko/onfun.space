<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    const client_id = '/*удалил*/'; // ID приложения
    const client_secret = '/*удалил*/'; // Защищённый ключ
    const redirect_uri = 'http://onfun.space/vk-auth'; // Адрес сайта

public function login_e(LoginRequest $request){
        
		
		
		
			$email=$request['email'];
			$password=$request['password'];
			
			
			
			if (Auth::attempt(['email' => $email, 'password' => $password]))
		{
			$user = user::where('email', $email)->first();
			
			Auth::login($user,true);
			return redirect('/');
		}else{
			$request->session()->flash('alert-success', 'Неверный логин или пароль!');
						return redirect('/login');
		}
	    
	}
	

	public function reg_e(LoginRequest $request){
        
			$userInfo= array(
			'email'=>$request['email'],
			'first_name'=>$request['username'],
			'photo_200_orig'=>$request['avatar'],
			'password'=>$request['password']
			
			
			);
			
                $user = user::where('email', $userInfo['email'])->first();
				
                if(Auth::guest()){
                    if (!is_null($user)){ 
						
						$request->session()->flash('alert-success', 'Такая почта уже занята!');
						return redirect('/reg');
						
                    } else { 
                        $user = user::create([
                            'username' => $userInfo['first_name'],
                            'avatar' => $userInfo['photo_200_orig'],
							'password'=>bcrypt($userInfo['password']),
                            'email' => $userInfo['email'],
                            'ip' => $_SERVER['REMOTE_ADDR']
                        ]); 
						
						Auth::login($user,true);
				 		return redirect('/');
                    } 
					
                }
	}


    public function login(){
        $url = 'http://oauth.vk.com/authorize';

        $params = array(
            'client_id'     => self::client_id,
            'redirect_uri'  => self::redirect_uri,
            'response_type' => 'code'
        );
 
        return redirect($url . '?' . urldecode(http_build_query($params)));
    }

    public function auth(Request $request){
        if($request->get('code') || !Auth::guest()){
            $result = false;
            $params = array(
                'client_id' => self::client_id,
                'client_secret' => self::client_secret,
                'code' => $request->get('code'),
                'redirect_uri' => self::redirect_uri
            );

            $token = json_decode(@file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

            if (isset($token['access_token'])) {
                $params = array(
                    'uids'         => $token['user_id'],
                    'fields'       => 'photo_200_orig',
                    'access_token' => $token['access_token'],
                    'v' => '5.107'  
                ); 

                $userInfo = json_decode(@file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['response'][0]['id'])) {
                    $userInfo = $userInfo['response'][0];
                    $result = true;
                }
            }
            if ($result) {
                $user = User::where('vid', $userInfo['id'])->first();
                if(Auth::guest()){
                    if (!is_null($user)){
                        User::where('vid', $userInfo['id'])->update([
                            'username' => $userInfo['first_name'] . ' '. $userInfo['last_name'],
                            'avatar' => $userInfo['photo_200_orig'],
                            'ip' => $_SERVER['REMOTE_ADDR']
                        ]);
                    } else {
                        $user = User::create([
                            'username' => $userInfo['first_name'] . ' '. $userInfo['last_name'],
                            'avatar' => $userInfo['photo_200_orig'],
                            'vid' => $userInfo['id'],
                            'ip' => $_SERVER['REMOTE_ADDR']
                        ]);
                    }
                    Auth::login($user, true);
                    return redirect('/');
                }
            } else {
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }
	public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
