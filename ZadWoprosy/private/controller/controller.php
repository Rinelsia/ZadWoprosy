<?php
// use database;
class UrlJson 
{
    
    public function UrlJsonControl()
    {

        // читает из адресной строки браузера
        $uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $uri=trim($uri, '/') ? : "index";
        
        // создаем адресный массив
        $uri_arr = explode('/', $uri);
        $leng = count($uri_arr);        
        
        // читает из файла json и переводит в объект формат         
        $file_json=file_get_contents("private/controller/url.json");
        $obj_json=json_decode($file_json);
        
        // подключение баз данных. Файлы находятся в разделе модель
        require_once "private/model/DB.php";       
        $db_obj = new DB;
        $db_obj->quering();
        
        // $arr_dbs = $db_obj->bdConnect();
        // $arr_tabl = $db_obj->ShowTable();
        //запускаем функцию для отправки запроса в db. 
        
        // $db_upr= new CreateDB;
        // $SelectDb = $db_upr->DbCreate();
        
        // цикл просчета уровня глубины адреса и запуска подключения файлов, в соответствии с массивом адреса
        // на странице возможно только одно подменю
        for($i=0; $i<$leng; $i++){
            
           // здесь i это глубина
            $uri=$uri_arr[$i];
            $arr_json=$obj_json->$uri;            
            if (isset($arr_json) & gettype($arr_json)==="object"){
                foreach ($arr_json as $key => $value){
                    if(gettype($value)==="string"){
                        include_once $value;// подключение файла, адрес из файла json                       
                    } else if(gettype($value)=="object"){
                        $temp_val = $value;// временная переменная используется только здесь
                    }
                }                
            } else {
                include_once $arr_json;
            }            
           $obj_json = $temp_val;
        }
        
    }
}
?>