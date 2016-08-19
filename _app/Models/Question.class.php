<?php

class Question {

    private $Data;
    private $DataAnswer;
    private $Message;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'qr_question';
    const subEntity = 'qr_questionAnswer';

    public function addQuestion(array $Data) {
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Error = ["Erro ao cadastrar!", "Para criar uma Atividade, favor preencha todos os campos!", "alert-warning"];
            $this->Result = false;
        else:
            $this->setDatas();
            $this->Create();
        endif;
    }

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    private function setDatas() {
        $this->DataAnswer = $this->Data['question_Answer'];
        unset($this->Data['question_Answer']);

        $this->Data['question_userId'] = $_SESSION['userlogin']['user_id'];
    }

    private function Create() {
        $cadastraAtividade = new Create;
        $cadastraAnswer = new Create;

        $cadastraAtividade->ExeCreate(self::Entity, $this->Data);
        if ($cadastraAtividade->getResult()):
            foreach ($this->DataAnswer as $key => $Answer):
                if (!empty($Answer)):
                    $dataAnswer['answer_questionId'] = $cadastraAtividade->getResult();
                    $dataAnswer['answer_description'] = $Answer;
                    $dataAnswer['answer_value'] = $key;
                    $cadastraAnswer->ExeCreate(self::subEntity, $dataAnswer);
                endif;
            endforeach;
            $this->Error = ["Muito bem!!!", "A nova atividade foi cadastrada com sucesso no sistema!", "alert-success"];
            $this->Result = $cadastraAtividade->getResult();
        else:
            $this->Error = ["Erro ao cadastrar!", "Erro ao cadastra a Atividade no banco dados", "alert-danger"];
            $this->Result = false;
        endif;
    }
}
