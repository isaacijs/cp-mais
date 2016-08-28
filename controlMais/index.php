<?php
ob_start();
session_start();
if (!isset($_SESSION['userlogin']) || (int) $_SESSION['userlogin']['user_level'] !== 10):
    header(isset($_SESSION['userlogin']['user_level']) ? 'Location: ../index.php' : 'Location: ../index.php?exe=restrito');
endif;

$incPag = filter_input(INPUT_GET, 'pgx', FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <!-- Menu de navegação -->
            <div class="" id="">
                <?php include_once './inc/navTop.inc.php'; ?>
            </div>
            
            <div class="" id="">
                <?php include_once './inc/navLeft.inc.php'; ?>
            </div>
        </nav>
        <div>
            <?php
            switch ($incPag) {
                case 10:
                    include_once './system/transaction.php';
                    break;
                case 11:
                    include_once './system/';
                    break;
                case 20:
                    include_once './system/wallet.php';
                    break;

                default:
                    include_once './system/transactionSummary.php';
                    break;
            }
            ?>
        </div>
    </body>
</html>
