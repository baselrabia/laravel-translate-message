<?php

use Illuminate\Support\Facades\Log;

 
/**
 * Translate the given message.
 *
 * @param  string|null  $key
 * @param  array  $replace
 * @param  string|null  $locale
 * @return string|array|null
 */
function __t($key = null, $replace = [], $locale = null)
{
    $segments = explode('.', $key);

    if (is_null($key) || count($segments) != 2) {

        return $key;
    }

    $group = $segments[0];
    $sourceText = $segments[1];

    $trans = __($key, $replace, $locale);

    //set the Langs 

    $sourceLang = 'en'; // auto 

    $targetLang =  $locale ?? app()->getLocale() ?? 'ar';
    $locale = $targetLang;


    $langPath = app()->langPath();
    $localeFileCheck = $langPath . '/' . $locale . '/' . $group . '.php';
    
    try {
        $transfilecheck = include($localeFileCheck);
        $TransCheckExist = array_key_exists($sourceText, $transfilecheck);    
    } catch (\Throwable $th) {
        $TransCheckExist = false;
    }


    if ($trans != $key && $TransCheckExist) {
        return $trans;
    }
    


    try {

        //call the google tranlate to get trans word with curl call
        $client = new GuzzleHttp\Client();

        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl="
        . $sourceLang . "&tl=" . $targetLang . "&dt=t&q=" . $sourceText;


        $res = $client->request('GET', $url);
        $status = $res->getStatusCode();
        // "200"
        $header =  $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
        $body =  $res->getBody();

        if ($status != 200) {
            throw new Exception("Error in google translate api call");
        }

        $body = json_decode($body, true);
        $translatedText = $body[0][0][0];


        //write result tranlation to the language file in laravel
        $langPath = app()->langPath();

        $EnFile['Path'] = $langPath . '/en/' . $group . '.php';
        $localeFile['Path'] = $langPath . '/' . $locale . '/' . $group . '.php';
        $EnFile['Msg'] = "'" . $sourceText . "'" . "=>" . "'" . $sourceText . "'" . ",";
        $localeFile['Msg']  = "'" . $sourceText . "'" . "=>" . "'" . $translatedText . "'" . ",";



        $transFiles = [$localeFile];
        if ($locale != "en") {
            $transFiles[] = $EnFile;
        }


        foreach ($transFiles as $file) {

            $path = $file['Path'];
            $msg = $file['Msg'];

            $parts = explode('/', $path);
            $file = array_pop($parts);

            $dir = '';
            foreach ($parts as $part) {
                if (!is_dir($dir .= "/$part")) mkdir($dir);
            }

            $path = "$dir/$file";
            if (!file_exists($path)) {
                $dummyContent = "<?php  return [  ];";           // Some simple example content.
                file_put_contents($path, $dummyContent);     // Save our content to the file.
            }

            //wite to the en file
            $FileContent = file_get_contents($path);

            //find "];"
            $startpos = strpos($FileContent, "[");
            $endpos = strpos($FileContent, "];") ;

             

            $NewFileContent = "<?php  return [" . " " .PHP_EOL;
            $NewFileContent .= substr($FileContent, $startpos +1 , $endpos - ($startpos + 1));
            $NewFileContent .= PHP_EOL . " " . $msg . " " . PHP_EOL;
            $NewFileContent .= PHP_EOL . " " . "];";


            file_put_contents($path, $NewFileContent);

        }

        return $translatedText;  

    } catch (Exception $e) {
        Log::error("Error in translate the word : " . $key  . " ", ['Message' =>  $e->getMessage()]);
        return $trans;
    }
}

/**
 * Translate the given message With three underscores.
 *
 * @param  string|null  $key
 * @param  array  $replace
 * @param  string|null  $locale
 * @return string|array|null
 */
function ___($key = null, $replace = [], $locale = null)
{
    return __t($key, $replace, $locale);
}
