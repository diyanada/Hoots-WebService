<?php 
class reprt_view{
	public function result_table($sql){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	try {
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if( $conn === false ) {
     	die("Database Connection fail!");
	}
		$result = sqlsrv_prepare( $conn, $sql );
		if( $result === false ) {
		  die("Database Connection fail!");
	  }
		$i=0;
		$return_val = "<table id='report_table'><tr>";
		foreach( sqlsrv_field_metadata( $result ) as $field ) 
		{
		$return_val .= "<th>".$this->field_nam($field['Name'])."</th>";
		$i += 1;
		}
		$return_val .= "</tr>";
		
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
		
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
		{
		$return_val .= "<tr>";
		for ($x = 0; $x < $i; $x++) {
		$return_val .= "<td>".$row[$x]."</td>";
		}
		$return_val .= "</tr>";
		}
		
		$return_val .= "<table>";
		$return_val = "<p>Quary returned rows : ". sqlsrv_num_rows( $result ) .".</p>".$return_val;
		return $return_val;
		
	} catch (Exception $e) {
    	$return_val = 'Caught exception: '.  $e->getMessage(). "\n";
	}
		
return $return_val;
	
	}
	
	public function field_nam($name){
		$return_val = str_replace("_"," ",$name);
		$return_val = strtolower($return_val);
		$return_val = ucwords($return_val);
		
		return $return_val;
	}
	
	public function result_thumb($sql, $catid = ""){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if( $conn === false ) {
     	die("Database Connection fail!");
	}
		$result = sqlsrv_query( $conn, $sql );
		if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  while($row = sqlsrv_fetch_array($result))
  		{
		echo "<div class=\"div_box\">
				<img class=\"img\" src=\"../img/no-image-thumb.png\"/>
				<br />Name :- ".$row['NAME']."
				<br />Set Name :- ".$row['SET_NAME']."
				<br /><button type=\"button\" onclick=\"addfunction('".$row['ID']."', '".$catid."')\">Add</button>
				</div>";
  		}
	  
	  
	  
	  }
}
?>