<?php
require_once '../_app/Config.inc.php';
$sendDate = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($sendDate and isset($sendDate['sendNewTransaction'])):
    $movement = new Transaction;
    var_dump($movement);
endif;
?>
<h1>Carteiras Financeiras</h1>
<form method="POST" action="">
    <div class="" id="form_wallet_description">
        <label for="wallet_description">Descrição: </label>
        <input type="text" name="" id="wallet_description"/>
    </div>

    <div class="" id="form_bankAccount">
        <label for="bankAccount">Vincular a uma conta bancária: </label>
        <select name="bankAccount" id="bankAccount">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
    </div>

    <div class="" id="form_wallet_bankAccount">
        <label for="wallet_bankAccount">Conta Bancária: </label>
        <input type="date" name="wallet_bankAccount" id="wallet_bankAccount"/>
    </div>

    <div class="" id="form_wallet_type">
        <label for="wallet_type">Tipo de Carteira: </label>
        <input type="text" name="wallet_type" id="wallet_type"/>
    </div>

    <div class="" id="form_wallet_valueTarget">
        <label for="wallet_valueTarget">Meta a ser atingida: </label>
        <input type="text" name="wallet_valueTarget" id="wallet_valueTarget"/>
    </div>

    <div class="" id="form_wallet_startDate">
        <label for="wallet_startDate">Data inicial: </label>
        <input type="text" name="wallet_startDate" id="wallet_startDate"/>
    </div>

    <div class="" id="form_wallet_finalDate">
        <label for="wallet_finalDate">Data final: </label>
        <input type="text" name="wallet_finalDate" id="wallet_finalDate"/>
    </div>
    
    <div class="" id="form_wallet_sharedUsers">
        <label for="wallet_sharedUsers">Compartinhar carteira com: </label>
        <input type="text" name="wallet_sharedUsers" id="wallet_sharedUsers"/>
    </div>
    
    <div class="" id="form_sendForm">
        <input type="submit" name="sendNewTransaction" id="sendNewTransaction"/>
    </div>
</form>