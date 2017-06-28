<?php
if($_POST["funcion"]=="Calcula")
{
	$result;
	switch($_POST["fun"])
	{
		case 1:
		$result = $_POST["n1"] / $_POST["n2"];
		break;
		case 2:
		$result = $_POST["n1"] * $_POST["n2"];
		break;
		case 3:
		$result = $_POST["n1"] - $_POST["n2"];
		break;
		case 4:
		$result = $_POST["n1"] + $_POST["n2"];
		break; 
		case 5:
		$result = (($_POST["n2"] / 100)* $_POST["n1"]);
		break; 
	}
	echo $result;
	exit();
}
if($_POST["funcion"]=="opuesto")
{
	$num = $_POST["n2"];
	$num2=(-1); 
	$result = $num *  $num2;
	echo $result;
	exit();
}

if($_POST["funcion"]=="borradoTotal")
{
	$result = 0;
	echo $result;
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Calculadora</title> 
<link rel="stylesheet" type="text/css" href="calculadora.css" />
</head>
<body>
<br />
<br />
<br />
<center>
<div class="calculadora">
<form action="#" name="calculadora" id="calculadora">
<br />
<input type="text" id="textoPantalla" value="0"/>
<p>
<input type="button" value="AC" id="fun" idf="borradoTotal"  />
<input type="button" value="+/-" id="fun" idf="opuesto"/>
<input type="button" value="%" id="fun" idf="5"/>
<input type="button" class="naranja" value="/" id="fun" idf="1"  />
</p>
<p>
<input type="button" value="7" onclick="numero('7')" />
<input type="button" value="8" onclick="numero('8')" />
<input type="button" value="9" onclick="numero('9')" />
<input type="button" class="naranja" value="*" id="fun" idf="2"/>
</p>
<p>
<input type="button" value="4" onclick="numero('4')" />
<input type="button" value="5" onclick="numero('5')" />
<input type="button" value="6" onclick="numero('6')" />
<input type="button" class="naranja" value="-" id="fun" idf="3"/>
</p>
<p>
<input type="button" value="1" onclick="numero('1')" />
<input type="button" value="2" onclick="numero('2')" />
<input type="button" value="3" onclick="numero('3')" />
<input type="button" class="naranja" value="+" id="fun" idf="4"/>
</p>
<p>
<input type="button" class="largo" value="0" onclick="numero('0')" />
<input type="button" value="." onclick="numero('.')" />
<input type="button" class="naranja" value="=" id="fun" idf="Calcula"/>
</p>
</form>
</div>
</center>
</body>
</html>
<script src="jquery/jquery.min.js" charset="UTF-8">
</script>
<script>
var fun = 0;//funcion a realizar
var aux=0;//valor auxiliar
var borr=0;
function numero(val) 
{
	if(borr!=0)
	{
		document.calculadora.textoPantalla.value='';borr=0;
	}
	num=val;
	nump=document.calculadora.textoPantalla.value;
	if(nump=='0'&& num!='.')
	{
		document.calculadora.textoPantalla.value='';
	}
	document.calculadora.textoPantalla.value=(document.calculadora.textoPantalla.value).concat(num);
} 
$(document).ready(function(e) 
{
	$(document).on("click","#fun",function()
	{
		var funct = $(this).attr("idf");
		if(funct==0||funct==1||funct==2||funct==3||funct==4||funct==5)
		{
			aux=parseFloat(document.calculadora.textoPantalla.value);
			fun = funct;
			borr=1
		}
		else
		{
		if(funct=="Calcula"){borr=0;}
		$.ajax
		({type: "POST",
			url: "<?=$_SERVER['PHP_SELF']?>",
			data: ({funcion : funct, n2: $ ("#textoPantalla").val(),n1:aux,fun:fun}),dataType: "html",async:false,
			success: function(msg){$("#textoPantalla").val(msg);}
		});	
		}

	});
});
</script>
