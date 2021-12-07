<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script>
    var invocation = new XMLHttpRequest();
    var url = 'http://www.obstgut-auf-der-heide.de/';

    function callOtherDomain(){
        if(invocation) {
            invocation.open('GET', url, true);
            invocation.withCredentials = true;
            invocation.onreadystatechange = handler;
            invocation.send(); 
        }
    }

    $(document).on('click','#buscar', function(){
        var cep = $("#cep").val();
        $.ajax({
            type: "get",
            url: "https://viacep.com.br/ws/"+cep+"/json/",
            success: function(data){
                var conteudo = '';
                conteudo += "<p>Logradouro: "+data.logradouro+"</p>";
                conteudo += "<p>Bairro: "+data.bairro+"</p>";
                conteudo += "<p>Cidade: "+data.localidade+"</p>";
                conteudo += "<p>Estado: "+data.uf+"</p>";
                conteudo += "<p>DDD: "+data.ddd+"</p>";

                $("#dados").append(conteudo);
            }
        });
    });
</script>

<div class="formRow">
    <label for="">Cep:</label>
    <input type="text" id="cep">
    <button id="buscar" class="formBtn">Buscar</button>
</div>

<div class="formRow">
    <div class="formResult">
        <div id="dados"></div>
    </div>
</div>

<style>
    .formRow,
    .formRow input,
    .formRow label{
        display: flex;
        outline: none;
        gap: 10px;
        margin: 5px 0;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .formRow input{
        border: none;
        box-shadow: 3px 3px;
        background: rgb(238, 238, 238);
        padding: 5px 15px;
    }
    .formRow label{
        font-weight: bolder;
    }
    .formBtn{
        border: none;
        padding: 10px 5px;
        box-shadow: 3px 3px;
        font-weight: bolder;
    }
    .formBtn:hover{
        background: rgb(209, 209, 209);
    }
    .formBtn:active{
        background: rgb(196, 196, 196);
    }
    .formResult{
        font-size: 15px;
        background: rgb(238, 238, 238);
        padding: 5px;
        box-shadow: 3px 3px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>