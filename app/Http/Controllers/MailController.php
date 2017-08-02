<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Contacts;

class MailController extends Controller
{
    public function mail()
    {
        session_start();
    	$subject = "Новая заявка";
    	
        $phone = Input::get('phone');

        if (Input::get('name')!= null)
    	{
    		$name = Input::get('name');
    		$mailsend = mail(Contacts::find(1)->mail, "$subject", "Имя: $name\nТелефон: $phone"); 
    	}
    	else
    	{
    	   	$mailsend = mail(Contacts::find(1)->mail, "$subject", "Телефон: $phone"); 
    	}   
        if($mailsend)
        {
            $_SESSION['sended'] = true;
            return redirect()->action('HomeController@index');
            exit;
        }
       
    }
    public function message()
    {
        session_start();
    	$subject = "Новое сообщение";
    	
        $name = Input::get('name');
        $phone = Input::get('phone');
        $text = Input::get('text');

    		
    	$mailsend = mail(Contacts::find(1)->mail, "$subject", "Имя: $name\nТелефон: $phone\nТекст: $text"); 
    	if($mailsend)
        {
            $_SESSION['sended'] = true;
            return redirect()->action('ContactsController@contacts');
            exit;
        }
    }

    public function feedback(Request $request)
    {
        session_start();
    	$subject = "Новый отзыв";
    	
        $name = Input::get('name');
        $city = Input::get('city');
        $text = Input::get('text');



        $to = array('',Contacts::find(1)->mail); // кому отправляем
        $subject = 'Новый отзыв!'; // Тема письма
        $from = array("$name", ""); // От кого отправляем 

        // Формируем заголовок 
        $random_hash = md5(date('r', time()));  
        $mime_boundary = "==Multipart_Boundary_x{$random_hash}x";  
        $headers  = 'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'Content-Type: multipart/mixed; boundary="'.$mime_boundary.'"' . "\r\n"; 
        $message = "--{$mime_boundary}\n" . 
            "Content-Type:text/html; charset=\"utf-8\"\n" . 
            "Content-Transfer-Encoding: 7bit\n\n";

        $message .= 'Имя:' .$name.'<br>Город: '.$city.'<br><br>Отзыв:'.$text.PHP_EOL;


        if($request->hasFile('img_path'))
        {
            $file = $request->file('img_path');
            $file->move(public_path() . '/images/feedback',$file->getClientOriginalName());
        
            $fileatt = public_path() .'/images/feedback/'.$file->getClientOriginalName(); // путь к файлу, который хотим отправить

        
            $fileatt_type = "application/octet-stream"; 
            $fileatt_name = 'photo.jpg';  // Имя файла, которое увидит получатель 

            // Читаем вложенный файл
            $file = fopen($fileatt,'rb'); 
            $data = fread($file,filesize($fileatt)); 
            fclose($file);  

            $data = chunk_split(base64_encode($data)); // Кодируем наш файлик 

            // Вкладываем файл в письмо 
            $message .= "--{$mime_boundary}\n" . 
                "Content-Type: {$fileatt_type};\n" . 
                " name=\"{$fileatt_name}\"\n" . 
                "Content-Transfer-Encoding: base64\n\n" . 
            $data . "\n\n" . 
            "--{$mime_boundary}\n"; 
            unset($data); 
            unset($file); 
            unset($fileatt); 
            unset($fileatt_type); 
            unset($fileatt_name); 
        }

        // отправляем письмо 
        $mailsend = mail($to[1], $subject, $message, $headers); 
    	if($mailsend)
        {
            $_SESSION['sended'] = true;
            return redirect()->action('HomeController@comments');
            exit;
        }	
    }
    public function user_dispatch()
    {
        session_start();
        $subject = "Запрос на рассылку!";
        
        $email = Input::get('email');

        $mailsend = mail(Contacts::find(1)->mail, "$subject", "Я хочу получать рассылку.\nМоя электронная почта: $email"); 

        if($mailsend)
        {
            $_SESSION['sended'] = true;
            return redirect()->action('HomeController@index');
            exit;
        }
    }
}