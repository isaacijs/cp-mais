<?php

/**
 * Login.class [ MODEL ]
 * Responável por autenticar, validar, e checar usuário do sistema de login!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Login {

    private $Level;
    private $Email;
    private $Senha;
    private $Error;
    private $Result;

    /**
     * <b>Informar Level:</b> Informe o nível de acesso mínimo para a área a ser protegida.
     * @param INT $Level = Nível mínimo para acesso
     */

    /**
     * <b>Efetuar Login:</b> Envelope um array atribuitivo com índices STRING user [email], STRING pass.
     * Ao passar este array na ExeLogin() os dados são verificados e o login é feito!
     * @param ARRAY $UserData = user [email], pass
     */
    public function ExeLogin(array $UserData) {
        $this->Email = (string) strip_tags(trim($UserData['user_login']));
        $this->Senha = (string) strip_tags(trim($UserData['user_password']));
        $this->setLogin();
    }

    /**
     * <b>Verificar Login:</b> Executando um getResult é possível verificar se foi ou não efetuado
     * o acesso com os dados.
     * @return BOOL $Var = true para login e false para erro
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /**
     * <b>Checar Login:</b> Execute esse método para verificar a sessão USERLOGIN e revalidar o acesso
     * para proteger telas restritas.
     * @return BOLEAM $login = Retorna true ou mata a sessão e retorna false!
     */
    public function CheckLogin($Level) {
        if ($Level > -1):
            $this->Level = $Level;
            if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['user_type'] != $this->Level):

                return false;
            else:
                return true;
            endif;
        else:
            if (empty($_SESSION['userlogin'])):
                unset($_SESSION['userlogin']);
                return false;
            else:
                return true;
            endif;
        endif;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida os dados e armazena os erros caso existam. Executa o login!
    private function setLogin() {
        if (!$this->Email || !$this->Senha):
            $this->Error = '<h4>Informe seu E-mail e senha!</h4>';
            $this->Result = false;
        elseif (!$this->getUser()):
            $this->Error = '<h4>ERROR: Usuário ou Senha Inválidos.';
            $this->Result = false;
        else:
            $this->Execute();
            if ($this->Result == true):
                $lastupdate = new Update;

                date_default_timezone_set('America/Sao_Paulo');
                $Dados['user_lastupdate'] = date('Y-m-d H:i:s');
                $lastupdate->ExeUpdate('qr_users', $Dados, 'WHERE user_id = :idUser', "idUser={$_SESSION['userlogin']['user_id']}");
            endif;
        endif;
    }

    //Vetifica usuário e senha no banco de dados!
    private function getUser() {
        $this->Senha = base64_encode($this->Senha);

        $read = new Read;
        if (filter_var($this->Email, FILTER_VALIDATE_EMAIL)):
            $read->ExeRead("ctrl_users", "WHERE user_email = :email AND user_password = :p", "email={$this->Email}&p={$this->Senha}");
        else:
            $read->ExeRead("ctrl_users", "WHERE user_login = :email AND user_password = :p", "email={$this->Email}&p={$this->Senha}");
        endif;

        if ($read->getResult()):
            $this->Result = $read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }

    //Executa o login armazenando a sessão!
    private function Execute() {
        if (!session_id()):
            session_start();
        endif;
        $_SESSION['userlogin'] = $this->Result;
        $this->Error = "<h4>Olá {$this->Result['user_name']}, seja bem vindo(a). Aguarde redirecionamento!</h4>";
        $this->Result = true;
    }

}
