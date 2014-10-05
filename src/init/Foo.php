<?php namespace init;

class Foo
{
    public static function bar()
    {
        return 'bar';
    }

    public static function createTodo($todo)
    {
	$query=mysql_query("insert into TODOTABLE SET TODO='$todo'") or die(mysql_error());

	//insert query to the database

	if($query){

	//if successful query

	return $todo . "inserted";

	}else{
	
        return "failed";	
	}
    }

    public static function listAllTodos()
    {
	$query=mysql_query("select ID, TODO FROM TODOTABLE;") or die(mysql_error());

	if($query){
		$num=mysql_num_rows($query);
		$i = 0;
		$array = array(); //Notice our array is empty
		if($num>0){ //check if more than 0 record found
			while($row=mysql_fetch_array($query)){
				extract($row);

				$array[$i][0] = $ID;
				$array[$i][1] = $TODO;
				$i++;
			}
		}
        return json_encode($array);	
	}else{	
        return "failed";	
	}
    }

    public static function getTodo($id)
    {
	$query=mysql_query("select TODO FROM TODOTABLE WHERE ID = '$id';") or die(mysql_error());

	if($query){
		$num=mysql_num_rows($query);
		if($num==1){
			while($row=mysql_fetch_array($query)){
				extract($row);
				return $TODO;
			}
		}else{
			return "$id does not exist.";
		}
	}else{	
		return "$id does not exist.";
	}
    }

    public static function updateTodo($id, $todo)
    {
	$query=mysql_query("UPDATE TODOTABLE SET TODO='$todo' WHERE ID = '$id';") or die(mysql_error());

	if($query){

	//if successful query

	return $todo . "updated";

	}else{
	
        return "failed";	
	}
    }


}

