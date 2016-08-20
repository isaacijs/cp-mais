<?php

$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setPost = array_map('strip_tags', $getPost);
$Post = array_map('trim', $setPost);

$Action = $Post['action'];
$jSon = array();
unset($Post['action']);
sleep(1);

if ($Action):
    require '../_app/Config.inc.php';
    $Read = new Read;
    $Create = new Create;
    $Update = new Update;
    $Delete = new Delete;
endif;

switch ($Action):
    case 'upload':
        $Upload = new Upload;
        $Upload->Image($_FILES['imagem']);
        break;

    case 'create':
        if (in_array('', $Post)):
            $jSon['error'] = "<b>OPPSSS:</b> Para Cadastrar Um Usuário. Preencha todos os campos!";
        elseif (!Check::Email($Post['user_email']) || !filter_var($Post['user_email'], FILTER_VALIDATE_EMAIL)):
            $jSon['error'] = "<b>OPPSSS:</b> Favor Informe Um E-mail Válido!";
        elseif (strlen($Post['user_password']) < 5 || strlen($Post['user_password']) > 10):
            $jSon['error'] = "<b>OPPSSS:</b> Sua Senha deve Ter entre 5 e 10 Caracteres!";
        else:
            $Read->FullRead("SELECT user_id FROM ws_users WHERE user_email = :email", "email={$Post['user_email']}");
            if ($Read->getResult()):
                $jSon['error'] = "<b>OPPSSS:</b> O e-mail <b>{$Post['user_email']}</b> já está em uso!";
            else:
                $Create->ExeCreate('ws_users', $Post);
                $jSon['success'] = "Cadastro com Sucesso!";
                $jSon['result'] = "<article style='display:none' class='user_box j_register' id='{$Create->getResult()}'><h1>{$Post['user_name']} {$Post['user_lastname']}</h1><p>{$Post['user_email']} (Nível {$Post['user_level']})</p><a class='action edit j_edit' rel='{$Create->getResult()}'>Editar</a><a class='action del' rel='{$Create->getResult()}'>Deletar</a></article>";
            endif;
        endif;
        break;


    case 'update':
        if (in_array('', $Post)):
            $jSon['error'] = "<b>OPPSSS:</b> Para Cadastrar Um Usuário. Preencha todos os campos!";
        elseif (!Check::Email($Post['user_email']) || !filter_var($Post['user_email'], FILTER_VALIDATE_EMAIL)):
            $jSon['error'] = "<b>OPPSSS:</b> Favor Informe Um E-mail Válido!";
        elseif (strlen($Post['user_password']) < 5 || strlen($Post['user_password']) > 10):
            $jSon['error'] = "<b>OPPSSS:</b> Sua Senha deve Ter entre 5 e 10 Caracteres!";
        else:
            $Read->FullRead("SELECT user_id FROM ws_users WHERE user_email = :email AND user_id != :id", "email={$Post['user_email']}&id={$Post['user_id']}");
            if ($Read->getResult()):
                $jSon['error'] = "<b>OPPSSS:</b> O e-mail <b>{$Post['user_email']}</b> já está em uso!";
            else:
                $UserId = $Post['user_id'];
                unset($Post['user_id']);
                $Update->ExeUpdate('ws_users', $Post, "WHERE user_id = :id", "id={$UserId}");
                $jSon['success'] = "Usuário atualizado Com Scesso!";
            endif;
        endif;
        break;

    case 'deleteuser':
        $Delete->ExeDelete('ws_users', "WHERE user_id = :id", "id={$Post['user_id']}");
        if (!$Delete->getRowCount()) {
            $jSon['error'] = true;
        }
        break;

    case 'loadmore':
        $jSon['result'] = null;
        $Read->ExeRead('ws_users', "ORDER BY user_id DESC LIMIT :limit OFFSET :offset", "limit=2&offset={$Post['offset']}");
        if ($Read->getResult()):
            foreach ($Read->getResult() as $Users):
                extract($Users);
                $jSon['result'] .= "<article style='display:none' class='user_box' id='{$user_id}'><h1>{$user_name} {$user_lastname}</h1><p>{$user_email} (Nível {$user_level})</p><a class='action edit j_edit' rel='{$user_id}'>Editar</a><a class='action del j_delete' rel='{$user_id}'>Deletar</a></article>";
            endforeach;
        else:
            $jSon['result'] = "<div style='margin: 15px 0 0 0;' class='trigger trigger-error'>Não existem Mais Resultados!</div>";
        endif;
        break;


    case 'readuser':
        $Read->ExeRead('ws_users', "WHERE user_id = :id", "id={$Post['user_id']}");
        if ($Read->getResult()):
            $jSon['user'] = $Read->getResult()[0];
        else:
            $jSon['error'] = true;
        endif;
        break;

    default :
        $jSon['error'] = "Erro ao Selecionar Ação!";
endswitch;

echo json_encode($jSon);
