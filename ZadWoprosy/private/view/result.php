    <section>
        <div class="container">
            <div class="wopros">
               <?php 
               		$result = $db_obj::$arr_result;
                    if ($result) {
                    	foreach ($result as $key => $value) {
	       				 	echo "<div class='krug'>$value[0]</div>";
	       				 	$ceck = explode("/-/", $value[1]);
	       				 	$otvet = explode("/-/", $value[2]);
	       				 	$long = count($ceck);
	       				 	var_dump($long);
	       				 	$i=1;
	       				 	while ($i<$long) {
	       				 		echo "<div class='col-10'>Вопрос $i:  $ceck[$i]<br></div><div class='offset-1'> Ответ: $otvet[$i]</div> ";
	       				 		$i++;
	       				 	}
       				 	
       				 	} 
                    }
       				
               ?> 
            </div>
        </div>
    </section>
</body>
</html>