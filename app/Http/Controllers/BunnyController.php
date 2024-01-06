<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BunnyController extends Controller
{


    public function index()
    {
        return view('upload');
    }


    public function upload(Request $request)
    {
        $auth_key = $request->auth_key;
        $video_path = $request->video_path->getClientOriginalName(); 
        $library_id = $request->library_id; 
        $video_name = $request->video_name;
        
        $base_url = "https://video.bunnycdn.com/library/";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $base_url . $library_id . "/videos");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("title" => $video_name)));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "AccessKey: " . $auth_key,
            "Content-Type: application/json"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        if ($response !== false) {
            
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $base_url . $library_id . "/videos/" . json_decode($response)->guid);
            curl_setopt($ch, CURLOPT_PUT, 1);
            curl_setopt($ch, CURLOPT_INFILE, fopen($video_path, "rb"));
            curl_setopt($ch, CURLOPT_INFILESIZE, filesize($video_path));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "AccessKey: " . $auth_key
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);

            curl_close($ch);

            if ($response !== false) {
            return true;
            }
        }

        return false;
    }


    public function createLibrary(Request $request)
    {
        $auth_key = $request->auth_key;
        $library_name = $request->library_name;
        $base_url = "https://api.bunny.net/videolibrary/";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $base_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'Name' => $library_name
            ]),
            CURLOPT_HTTPHEADER => [
                "AccessKey: " . $auth_key,
                "accept: application/json",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }


    public function deleteLibrary(Request $request)
    {
        $auth_key = $request->auth_key;
        $library_id = $request->library_id;
        $base_url = "https://api.bunny.net/videolibrary/" . $library_id;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $base_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
              "AccessKey: " . $auth_key,
              "accept: application/json"
            ],
          ]);
          
        $response = curl_exec($curl);
        $err = curl_error($curl);
          
        curl_close($curl);
          
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

    }


    public function delete(Request $request)
    {
        $auth_key = $request->auth_key;
        $library_Id = $request->library_Id;
        $video_id = $request->video_id; 
        
        $base_url = "https://video.bunnycdn.com/library/" . $library_Id . "/videos/"  . $video_id;
       
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $base_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
              "AccessKey: " . $auth_key,
              "accept: application/json"
            ],
          ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
}