<?php

/**
 * Transaction.class [ MODEL TRANSACTION ]
 */
class Transaction {

    private $Data;
    private $User;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'ctrl_movement';

    /**
     * <b>Cadastrar Usuário:</b> Envelope os dados de um usuário em um array atribuitivo e execute esse método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->checkData();

        if ($this->Result):
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar Usuário:</b> Envelope os dados em uma array atribuitivo e informe o id de um
     * usuário para atualiza-lo no sistema!
     * @param INT $UserId = Id do usuário
     * @param ARRAY $Data = Atribuitivo
     */
//    public function ExeUpdate($UserId, array $Data) {
//        $this->User = (int) $UserId;
//        $this->Data = $Data;
//        $this->Update();
//    }


    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Verifica os dados digitados no formulário
    private function checkData() {
        if (in_array('', $this->Data)):
            $this->Error = "Existem campos em branco. Favor preencha todos os campos!";
            $this->Result = false;
        endif;
    }

    //Cadasrtra Usuário!
    private function Create() {
        $Create = new Create;

        date_default_timezone_set('America/Sao_Paulo');
        $this->Data['movement_dateRegistration'] = date('Y-m-d H:i:s');

        $Create->ExeCreate(self::Entity, $this->Data);

        if ($Create->getResult()):
            $this->Error = "Movimentação cadastra com sucesso";
            $this->Result = $Create->getResult();
        endif;
    }

    //Atualiza Usuário!
//    private function Update() {
//        $Update = new Update;
//
//        if (isset($this->Data['user_password'])):
//            $this->Data['user_password'] = base64_encode($this->Data['user_password']);
//        endif;
//
//        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE user_id = :id", "id={$this->User}");
//        if ($Update->getResult()):
//            if (isset($this->Data['user_name'])):
//                $this->Error = "O usuário <b>{$this->Data['user_name']}</b> foi atualizado com sucesso!";
//            endif;
//            $this->Result = true;
//        endif;
//    }

    //Remove Usuário
//    private function Delete() {
//        $Delete = new Delete;
//        $Delete->ExeDelete(self::Entity, "WHERE user_id = :id", "id={$this->User}");
//        if ($Delete->getResult()):
//            $this->Error = ["Usuário removido com sucesso do sistema!", WS_ACCEPT];
//            $this->Result = true;
//        endif;
//    }

}
