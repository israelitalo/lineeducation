//Verifica o onChange no html para disparar esta função.
function mudouOpcao() {
    var campoFuncionario = CampoNomeFuncionario();
    //Se eu digitar um valor no campo, o alert exibe o valor digitado.
    var valor = "Ítalo";
    ////var novoValor = campoFuncionario.createTextNode(valor);
    //O código ignora completamente a alteração do valor feito pela função alterar valor.
    alterarValor(campoFuncionario, valor);
    //Alert é exibido, poré, vazio.
    alert(campoFuncionario.value);
}

//Pegando campo que irá mostrar o nome do funcionário.
function CampoNomeFuncionario() {
    var campo = parent.document.getElementById('funcionario');
    return campo;
}

//Já tentei alterar usando o campo.value(); valueOf() e todos são ignorados.
function alterarValor(campo, valor) {
    return campo.inputElement.value = valor;
}

function setarValor() {
    var campo = document.getElementById('funcionario');
    campo.value("Teste");
}