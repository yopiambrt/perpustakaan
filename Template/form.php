<?php
class Form{
	var $fields = array();
	var $action;
	var $submit = "";
	var $jumField=0;

	function __construct($action="", $submit="Submit"){
		$this->action = $action;
		$this->submit = $submit;
	}

	function displayForm(){
		require ('view/display.php');
		echo "<div>";
		echo"<form action='".$this->action."' method='post'>";
		echo"<table>";
		for($i=0;$i<$this->jumField;$i++){
			if ($this->fields[$i]['type'] == 'radio' || $this->fields[$i]['type'] == 'checkbox') {
					echo "<tr>
						<td align='left'>".$this->fields[$i]['label']."</td>";
					echo "<td>";
					foreach ($this->fields[$i]['value'] as $data) {
						if (!empty($this->fields[$i]['option'])) {
							foreach ($this->fields[$i]['option'] as $opt) {
								if (array_key_exists($data['indeks'], $opt)) {
									echo "<input type='".$this->fields[$i]['type']."' name='".$this->fields[$i]['name']."' value='".$data['value']."' ";
									if ($opt[$data['indeks']] == 'checked') {
										echo $opt[$data['indeks']]."='".$opt[$data['indeks']]."' ";
									}
									if ($this->fields[$i]['target'] == 'detail') {
										echo "disabled='disabled'";
									}
									echo ">";
									echo "<label>".$data['value']."</label>";
									echo "<br>";
								} else {
									echo "<input type='".$this->fields[$i]['type']."' name='".$this->fields[$i]['name']."' value='".$data['value']."' ";
									if ($this->fields[$i]['target'] == 'detail') {
										echo "disabled='disabled'";
									}
									echo ">";
									echo "<label>".$data['value']."</label>";
									echo "<br>";
								}
							}
						} else {
							echo "<input type='".$this->fields[$i]['type']."' name='".$this->fields[$i]['name']."' value='".$data['value']."' ";
							if ($this->fields[$i]['target'] == 'detail') {
								echo "disabled='disabled'";
							}
							echo ">";
							echo "<label>".$data['value']."</label>";
							echo "<br>";
						}
					}
					echo "</td></tr>";
				} else if ($this->fields[$i]['type'] == 'select') {
					echo "<tr>
						<td align='left'>".$this->fields[$i]['label']."</td>";
					echo "<td>";
					echo "<select name='".$this->fields[$i]['name']."'>";
					foreach ($this->fields[$i]['value'] as $data) {
						foreach ($this->fields[$i]['option'] as $opt) {
							if (is_array($opt) && array_key_exists($data['indeks'], $opt)) {
								echo "<option value='".$data['value']."' ";
								if ($opt[$data['indeks']] == 'selected') {
									echo $opt[$data['indeks']]."='".$opt[$data['indeks']]."' ";
								}
								if ($this->fields[$i]['target'] == 'detail') {
									echo "disabled='disabled'";
								}
								echo ">".$data['value']."</option>";
								echo "<br>";
							} else {
								echo "<option value='".$data['value']."' ";
								if ($this->fields[$i]['target'] == 'detail') {
									echo "disabled='disabled'";
								}
								echo ">".$data['value']."</option>";
								echo "<br>";
							}
						}
					}
					echo "</td></tr>";
				} else if ($this->fields[$i]['type'] == 'textarea') {
					echo "<tr>
						<td align='left'>".$this->fields[$i]['label']."</td>";
					echo "<td>";
					echo "<textarea name='".$this->fields[$i]['name']."' placeholder='".$this->fields[$i]['placeholder']."' ";
					if ($this->fields[$i]['target'] == 'detail') {
						echo "disabled='disabled'";
					}
					echo ">".$this->fields[$i]['value']."</textarea>";
					echo "</td></tr>";
				} else {
					echo"<tr>
						<td align='left'>".$this->fields[$i]['label']."</td>";
					echo"<td><input type='".$this->fields[$i]['type']."' name='".$this->fields[$i]['name']."' ".$this->fields[$i]['option']."='".$this->fields[$i]['option']."' value='".$this->fields[$i]['value']."'></td>
				    	</tr>";
				}	

	}
	echo "<tr><td>
			<button type='submit' name='tombol' class='btn-sm btn-success fa fa-sign-in'>
				<a href='http://localhost/pemweblan/UTS/anggota.php?target=list' class='text-white'style='text-decoration: none;'>". $this->submit ."</a>
			</button>
		</td></tr>";
	echo "</table>";
	echo "</div>";
	}

	function addField($name,$label,$type = 'text',$value = '',$option = ''){
		$this->fields[$this->jumField]['name']=$name;
		$this->fields[$this->jumField]['label']=$label;
		$this->fields[$this->jumField]['type']=$type;
		$this->fields[$this->jumField]['value']=$value;
		$this->fields[$this->jumField]['option']=$option;
		$this->jumField++;
	}

	function addSelect($name,$label,$type = 'select',$value = array(),$option = array(),$target = ''){
		$this->fields[$this->jumField]['name']=$name;
		$this->fields[$this->jumField]['label']=$label;
		$this->fields[$this->jumField]['type']=$type;
		$this->fields[$this->jumField]['value']=$value;
		$this->fields[$this->jumField]['option']=$option;
		$this->fields[$this->jumField]['target']=$target;
		$this->jumField++;	
	}

	function addDate($name, $label, $type = 'date',$value = '',$option = ''){
		$this->fields[$this->jumField]['name']=$name;
		$this->fields[$this->jumField]['label']=$label;
		$this->fields[$this->jumField]['type']=$type;
		$this->fields[$this->jumField]['value']=$value;
		$this->fields[$this->jumField]['option']=$option;
		$this->jumField++;
	}

	function addRadio($name,$label,$type = 'radio',$value = array(),$option = array(),$target = ''){
		$this->fields[$this->jumField]['name']=$name;
		$this->fields[$this->jumField]['label']=$label;
		$this->fields[$this->jumField]['type']=$type;
		$this->fields[$this->jumField]['value']=$value;
		$this->fields[$this->jumField]['option']=$option;
		$this->fields[$this->jumField]['target']=$target;
		$this->jumField++;	
	}

// function addTextarea($name,$label,$placeholder='',$value='',$target = ''){
//     $this->fields[$this->jumField]['name']=$name;
//     $this->fields[$this->jumField]['label']=$label;
//     $this->fields[$this->jumField]['type']='textarea';
//     $this->fields[$this->jumField]['placeholder']=$placeholder;
//     $this->fields[$this->jumField]['value']=$value;
//     $this->fields[$this->jumField]['target']=$target;
//     $this->jumField++;	
// }


// function addPassword($name, $label, $type = 'password',$value = '',$option = ''){
//     $this->fields[$this->jumField]['name']=$name;
//     $this->fields[$this->jumField]['label']=$label;
//     $this->fields[$this->jumField]['type']=$type;
//     $this->fields[$this->jumField]['value']=$value;
//     $this->fields[$this->jumField]['option']=$option;
//     $this->jumField++;
// }

// function addCheckbox($name,$label,$type = 'checkbox',$value = array(),$option = array(),$target = ''){
//     $this->fields[$this->jumField]['name']=$name;
//     $this->fields[$this->jumField]['label']=$label;
//     $this->fields[$this->jumField]['type']=$type;
//     $this->fields[$this->jumField]['value']=$value;
//     $this->fields[$this->jumField]['option']=$option;
//     $this->fields[$this->jumField]['target']=$target;
//     $this->jumField++;	
// }

	function getForm(){
		for($i=0;$i<$this->jumField;$i++){
			$this->fields[$i]['value']=$_POST[$this->fields[$i]['name']];
		}
	}

	function cetakForm(){
		for($i=0;$i<$this->jumField;$i++){
			echo $this->fields[$i]['label']. " : ".$this->fields[$i]['value']. "<br>";
		}
	}
}

error_reporting(E_ALL ^ E_NOTICE);

?>