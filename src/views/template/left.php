<?php
loadModel("WorkingHours");
session_start();
$user = $_SESSION['user'];
$wh = WorkingHours::loadFromUserAndData($user->id, date('Y-m-d'));
$activeClock = $wh->getActiveClock();

?>

<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="<?= "day_records_controller.php" ?>">
                    <i class="icofont-ui-check mr-2">
                        Registrar Ponto
                    </i>
                </a>
            </li>
            <li class="nav-item">
                <a href="monthly_report_controller.php">
                    <i class="icofont-ui-calendar mr-2">
                        Relatório Mensal
                    </i>
                </a>
            </li>
            <li class="nav-item">
                <a href=".php">
                    <i class="icofont-chart-histogram mr-2">
                        Relatório Gerencial
                    </i>
                </a>
            </li>
            <li class="nav-item">
                <a href=".php">
                    <i class="icofont-users mr-2">
                        Usuários
                    </i>
                </a>
            </li>
        </ul>
        <div class="spacer"></div>
        <div class="sidebar-widgets">
            <div class="sidebar-widget">
                <i class="hour icofont-hour-glass text-primary"></i>
                <div class="info">
                    <span class="main text-primary"
                        <?php
                        echo $activeClock=='workTime' ? 'active-Clock' : '';
                        ?>
                    >
                        <?php
                        echo $wh->getWorkedInterval()->format("%H:%I:%S");
                        ?>
                    </span>
                    <span class="label text-mute">Horas trabalhadas</span>
                </div>
            </div>
            <div class="division my-1"></div>
            <div class="sidebar-widget">
                <i class="hour icofont-hour-glass text-danger"></i>
                <div class="info">
                    <span class="main text-danger" 
                    <?php
                    echo $activeClock=='exitTime' ? 'active-clock' : '';
                    ?>
                    >
                        <?php
                        echo $wh->getExitTime()->format("H:i:s");
                        ?>
                    </span>
                    <span class="label text-mute">Horário de saída :/</span>
                </div>
            </div>
        </div>


    </nav>

</aside>