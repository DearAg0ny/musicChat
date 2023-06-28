<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class SongsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $vid = $request['url'];
        parse_str( parse_url( $vid, PHP_URL_QUERY ), $my_array_of_vars );
        if(isset($my_array_of_vars['v'])){
            $vid = $my_array_of_vars['v'];
        }
        else{
            $error_msg = "Incorrect URL!";
            return redirect()->back()->with('status', 'Incorrect URL!');
        }
        $time = self::getYoutubeDuration($vid);

        $data = self::getYTdata($request['url']);

        Songs::create([
            'playlist_id'=>$id,
            'title'=>$data['title'],
            'duration'=>gmdate("H:i:s", $time),
            'url'=>$request['url']
        ]);
        return redirect()->back();
    }

    public function getYoutubeDuration($vid)
    {
        $videoDetails = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$vid."&part=contentDetails,statistics&key=AIzaSyB-SdWTfugIMh7KNlVGvpXKRejlLjGhLY0");
        $VidDuration = json_decode($videoDetails, true);
        foreach ($VidDuration['items'] as $vidTime)
        {
            $VidDuration = $vidTime['contentDetails']['duration'];
        }
        if(preg_match('/H/',$VidDuration)){
            $pattern='/PT(\d+)H(\d+)M(\d+)S/';
        }
        else{
            $pattern='/PT(\d+)M(\d+)S/';
        }
        preg_match($pattern,$VidDuration,$matches);
        if(isset($mathes[3])){
            $seconds=($matches[3]*60*60)+$matches[1]*60+$matches[2];
        }
        else{
            $seconds=$matches[1]*60+$matches[2];
        }
        return $seconds;
    }

    public function getYTdata($url)
    {
        $youtube = "https://www.youtube.com/oembed?url=". $url ."&format=json";

        $curl = curl_init($youtube);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $return = curl_exec($curl);
        curl_close($curl);
        return json_decode($return, true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSong($id)
    {
        DB::table('songs')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }
}
