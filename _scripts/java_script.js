// JavaScript Document


/**
 *
 */
function ConfirmMatricula() {
  
  if ( confirm("Tem certeza que seus dados estão corretos?") ){
	  return true;
  }else{
	  return false;  
  }  	
}

/**
 * 
 */
function limpar(campo){
    if (campo.value == campo.defaultValue){
        campo.value = "";
        campo.style.color = "#000";
    }
}
 
function escrever(campo){
    if (campo.value == ""){
        campo.value = campo.defaultValue;
        campo.style.color = "#999";
    }
}


/**
 *
 */
function limparFormContato(){
    document.form1.txt_nome.value     = '';
    document.form1.txt_email.value    = '';
    document.form1.txt_assunto.value  = '';
    document.form1.txt_mensagem.value = '';
}


function openFoto(img){
	var janela = window.open('', 'Fotos do projeto Chance', 'width=725px, height=580px');
        janela.document.write("<img src='_imagens/_projeto/"+img+"'/>");
        janela.document.write("<p><input type='button' onclick='window.close()' value='FECHAR' /></p>");
}


/**
 * 
 * @param {type} URL
 * @returns {undefined}
 */
function novaJanela(URL){
	window.open(URL, '', 'top=200px, left=320px, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=500,height=250');
}

function enquete(URL){
	window.open(URL, '', 'top=200px, left=320px, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=500,height=250');
}



function Carregado() {
  carregando.style.display='none';
  imagem.style.display='block';
}






/////////Limpa campo de número no formulário de matrícula////////////*

function limpaNumero(){		
	with (document.forms.form_matricula){
		if ( txtsn.checked ){
			txtnumero.disabled = true;
			txtnumero.value = "";				
		}else{
			txtnumero.disabled = false;
			txtnumero.focus();
		}
	}
}


/////////Somente letras////////////*

function Onlychars(e)
{
        var tecla=new Number();
        if(window.event) {
                tecla = e.keyCode;
        }
        else if(e.which) {
                tecla = e.which;
        }
        else {
                return true;
        }
		
        if((tecla >= "48") && (tecla <= "57")){
                return false;
        }

}

/////////Validação de formulário///////////*

function valida_form() {
    with(document.forms[0]) {

        if (txtnome.value == '') {
        alert('Preencha o campo com seu nome');
        txtnome.focus();
        return false;
        }
        else if (txtemail.value == '') {
        alert('Preencha o campo com seu e-mail');
        txtemail.focus();
        return false;
        }
        else if (txtemail.value.indexOf('@') == -1 || txtemail.value.indexOf('.') == -1 || txtemail.value.length < 5) {
        alert('Preencha um e-mail válido');
        txtemail.focus();
        return false;
        }
        else if (txtassunto.value == '') {
        alert('Selecione o assunto');
        txtassunto.focus();
        return false;
        }
        else if (txtmsg.value == '') {
        alert('Preencha o campo com sua mensagem');
        txtmsg.focus();
        return false;
        }
        else {
        btenviar.value = 'Enviando ...';
        btenviar.disabled = true;
        document.form1.submit();
        }
    }
}




