<script>


var interval = 0; 

$(function()  
{  
    $('#crm').keypress(function()  
    {  
        // começa a contar o tempo  
        clearInterval(interval); 

        // 500ms após o usuário parar de digitar a função é chamada  
        interval = window.setTimeout(function(){
            // sua chamada ajax e demais códigos  
            
            // responseText.split("|")

	var dados;
        var crm = $('#crm').val();
        
    	$.ajax({
    	        url: "?controle=Medico&acao=Ajax&crm="+ crm,
    	        dataType: "html",
    	        success: function(response) {
    	            dados = response.responseText.split("|");
    	            alert(dados[2]);
    	        }
    	});
            
            
            
        }, 500);  
    });  
} 


$(function() {
    // valida o formulário
    $('#MedicoEditar').validate({
        // define regras para os campos
        rules: {
            crm: {
                required: true
            },
            nome: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            cpf: {
                required: true
            }
        },
        // define messages para cada campo
        messages: {
            crm: "Preencha o seu CRM",
            nome: "Preencha o seu nome",
            email: "Email invalido",
            cpf: "Preencha seu CPF"
        }
    });
});


</script>

<form action="" id="MedicoEditar" method="POST">
    <table >
        
        <tr>
            <td>
                CRM
            </td>
            <td>
                <input type="text" name="crm" placeholder="ex: 1234" id="crm" value="">
            </td>
        </tr>
        <tr>
            <td>
                Nome
            </td>
            <td>
                <input type="text" name="nome" placeholder="ex: Patrick Lobo" id="nome" value="">
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <input type="text" placeholder="ex: alguma@coisa.com" name="email" id="email">
            </td>
        </tr>
        <tr>
            <td>
                CPF
            </td>
            <td>
                <input type="text" placeholder="111.111.111-72" name="cpf" id="cpf">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                                <input type="submit" value="Salvar">

            </td>
        </tr>
    </table>
</form>