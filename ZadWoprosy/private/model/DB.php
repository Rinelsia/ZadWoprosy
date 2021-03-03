<?php


class DB
{
    public static $connection;
	public static $quer='';
    public static $arr_result;

    static public function DB_Conect(){   
        
        // дома комп
		$server="localhost:3606";		
		$user = "root";
		$password= "Bujhm1992";
        $db_name = "testzad";
        

		if($connection = mysqli_connect($server, $user, $password, $db_name)){
            self::$connection = $connection;
            return $connection;
		} else{
            echo "Ошибка подключения";
        }
    }

//создания строки запроса на запись в таблицу бд

    public  function quering(){        
    // открываем доступ к базе данных
       $this->DB_Conect();
// получаем $_POST, и создаем строку запроса к базе данных
        foreach ($_POST as $key => $value) {
            $key = explode("-", $key);
            if ($key[0] == "text") {
               $text = $text."/-/".$value;
               $checked .="/-/";
            }elseif ($key[0]=="checkbox") {
                $checked =$checked.",".$value;
            }
            else{
                $checked = $checked.$value;
            }
        } 
        
        // отправка запроса на добавление в базу данных значения в таблицу
        if (count($_POST)!== 0) {
            self::$quer = "INSERT INTO tester (textest, val) VALUES ('$text', '$checked');";
            $this->QuerResult();
        }
        
        
        // отправка запроса на получение результата из базы данных
        self::$quer = "SELECT * FROM tester;";        
        $this->QuerResult();
        self::$quer = '';
        
        // закрываем подключение к базе данных, и очищаем $_POST
        array_splice($_POST, 0);
        mysqli_close(self::$connection);     
        
    }
    
    public function QuerResult(){
        $quer = self::$quer;
        $connection = self::$connection;
        $res = mysqli_multi_query($connection, $quer);
        
        if ($result = mysqli_store_result($connection)) {
            $j=0;
            do{
                # code...
                $j++;
                $i=0;
                while($row = mysqli_fetch_row($result)){
                    $i++;
                    $mas_db[$i] = $row;
                }
            mysqli_free_result($result);

            }while (mysqli_next_result($connection));
        }        
        // $row=mysqli_fetch_array($result);
        
        
        self::$arr_result = $mas_db;
        return $mas_db;
    }

}
?>