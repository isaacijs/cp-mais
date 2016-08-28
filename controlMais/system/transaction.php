<?php
require_once '../_app/Config.inc.php';
$sendDate = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($sendDate and isset($sendDate['sendNewTransaction'])):
    $movement = new Transaction;
    var_dump($movement);
endif;
?>
<h1>Transação Financeira</h1>
<form method="POST" action="">
    <div class="" id="form_movement_description">
        <label for="movement_description">Descrição: </label>
        <input type="text" name="" id="movement_description"/>
    </div>

    <div class="" id="form_movement_value">
        <label for="movement_value">Valor: </label>
        <input type="text" name="movement_value" id="movement_value"/>
    </div>

    <div class="" id="form_movement_date">
        <label for="movement_date">Data: </label>
        <input type="date" name="movement_date" id="movement_date"/>
    </div>

    <div class="" id="form_movement_type">
        <label for="movement_type">Tipo de Transação: </label>
        <select name="movement_type" id="movement_type">
            <option value="1">Entrada</option>
            <option value="0">Saída</option>
        </select>
    </div>

    <div class="" id="form_movement_categoryId">
        <label for="movement_categoryId">Categoria da Despesa: </label>
        <input type="text" name="movement_categoryId" id="movement_categoryId"/>
    </div>

    <div class="" id="form_movement_expenseType">
        <label for="movement_expenseType">Tipo de Despesa: </label>
        <select name="movement_expenseType" id="movement_expenseType">
            <option value="0">Fixa</option>
            <option value="1">Variável</option>
        </select>
    </div>

    <div class="movement_expected" id="form_movement_expected">
        <label for="movement_expected">Transação Prevista: </label>
        <select name="movement_expected" id="movement_expected">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </div>

    <div class="movement_expected" id="form_movement_typePayment">
        <label for="movement_typePayment">Forma de Pagamento: </label>
        <select name="movement_typePayment" id="movement_typePayment">
            <option value="0">À vista</option>
            <option value="1">A prazo</option>
        </select>
    </div>

    <div class="" id="form_movement_billed">
        <label for="">Faturada: </label>
        <select name="movement_billed" id="movement_billed">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </div>

    <div class="" id="form_movement_walletId">
        <label for="">Carteira: </label>
        <input type="text" name="movement_walletId" id="movement_walletId"/>
    </div>

    <div class="" id="form_sendForm">
        <input type="submit" name="sendNewTransaction" id="sendNewTransaction"/>
    </div>
</form>