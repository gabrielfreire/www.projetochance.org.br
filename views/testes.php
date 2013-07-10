<html>
<head>

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">

//Variáveis globais
var _loadTimer	= setInterval(__loadAnima,18);
var _loadPos	= 0;
var _loadDir	= 2;
var _loadLen	= 0;

//Anima a barra de progresso
function __loadAnima(){
	var elem = document.getElementById("barra_progresso");
	if(elem != null){
		if (_loadPos==0) _loadLen += _loadDir;
		if (_loadLen>32 || _loadPos>79) _loadPos += _loadDir;
		if (_loadPos>79) _loadLen -= _loadDir;
		if (_loadPos>79 && _loadLen==0) _loadPos=0;
		elem.style.left		= _loadPos;
		elem.style.width	= _loadLen;
	}
}

//Esconde o carregador
function __loadEsconde(){
	this.clearInterval(_loadTimer);
	var objLoader				= document.getElementById("carregador_pai");
	objLoader.style.display		="none";
	objLoader.style.visibility	="hidden";
}


</script>


<style>

#barra_progresso
{
    FONT-SIZE: 1px;
    LEFT: 0px;
    WIDTH: 1px;
    POSITION: relative;
    TOP: 1px;
    HEIGHT: 5px;
    BACKGROUND-COLOR: #006400
}
#carregador_pai
{
    WIDTH: 100%;
    POSITION: absolute;
    TOP: 40%;
    TEXT-ALIGN: center
}
#carregador_fundo
{
    FONT-SIZE: 1px;
    LEFT: 8px;
    WIDTH: 113px;
    POSITION: relative;
    TOP: 8px;
    HEIGHT: 7px;
    BACKGROUND-COLOR: #ebebe4
}
#carregador
{
    BORDER-RIGHT: #6a6a6a 1px solid;
    PADDING-RIGHT: 0px;
    BORDER-TOP: #6a6a6a 1px solid;
    DISPLAY: block;
    PADDING-LEFT: 0px;
    FONT-SIZE: 11px;
    Z-INDEX: 2;
    PADDING-BOTTOM: 16px;
    MARGIN: 0px auto;
    BORDER-LEFT: #6a6a6a 1px solid;
    WIDTH: 130px;
    COLOR: #000000;
    PADDING-TOP: 10px;
    BORDER-BOTTOM: #6a6a6a 1px solid;
    FONT-FAMILY: Tahoma, Helvetica, sans;
    BACKGROUND-COLOR: #ffffff;
    TEXT-ALIGN: left
}

</style>

</head>


<body onLoad="__loadEsconde();">


<div id="carregador_pai">
<div id="carregador">
		<div align="center">Aguarde carregando ...</div>
		<div id="carregador_fundo"><div id="barra_progresso"> </div></div>
	</div>
</div>

</body>

</html>