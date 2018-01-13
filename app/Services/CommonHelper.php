<?php
namespace App\Services;
/**
 * Created by PhpStorm.
 * User: macp
 * Date: 2017/9/27
 * Time: 15:25
 */
class CommonHelper
{
    public static function curl_get($url, $header=[])
    {
        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_URL, $url);
        if($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $contents = curl_exec($ch);
        curl_close($ch);
        return  $contents;
    }

    public static function  curl_post($url,$data=[],$header=[])
    {
        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_URL, $url);
        if($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $contents = curl_exec($ch);
        curl_close($ch);
        return  $contents;
    }

    /**
     * 生成文件名称
     * @author macp
     * @param string $extension 文件名称
     */
    public static function generateFileName($extension) {
        return md5(mt_rand(000000, 999999) . time()) . '.' . $extension;
    }

    /**
     * 上传文件
     * @param file $file
     * @return mixed
     */
    public static function uploadFile($file, $dir = 'uploads')
    {
        // 存储地址
        $src = $dir . DIRECTORY_SEPARATOR . date('Ymd', time());
        // 生成文件名称
        $filename = static::generateFileName($file->getClientOriginalExtension());
        $path = $file->storeAs($src, $filename, 'local');

        return $path;
    }
}