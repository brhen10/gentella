<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$bundle = yiister\gentelella\assets\Asset::register($this);

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>SIGAE!</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="img/logonova1.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bem Vindo,</span>
                        <h2>Breno</h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Administrador</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Página Incial", "url" => ["site/index"], "icon" => "home"],
                                    ["label" => "Usuário", "url" => ["usuario/index"], "icon" => "briefcase"],
                                    [
                                        "label" => "Painel Administrativo",
                                        "url" => "#",
                                        "icon" => "book",
                                        "items" => [
                                            [
                                                "label" => "Projeto",
                                                "url" => ["projeto/index"],
                                                "badge" => "Didático / Pedagógico",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Documento Oficiais",
                                                "url" => ["documento_oficial/index"],
                                                "badge" => "Ofício / Memorando ...",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                        
                                        ],
                                    ],
                                    ["label" => "Aluno", "url" => ["aluno/home"], "icon" => "user"],
                                    ["label" => "Professores", "url" => ["professor/index"], "icon" => "lock"],
                                      [
                                        "label" => "Calendário Acadêmico",
                                        "url" => "#",
                                        "icon" => "file",
                                        "items" => [
                                            [
                                                "label" => "Visualizar Calendário",
                                                "url" => ["event/home"],
                                                "badge" => "Padrão",
                                                "badgeOptions" => ["class" => "label-warning"],
                                            ],
                                            [
                                                "label" => "Alterar Eventos",
                                                "url" => ["event/index"],
                                                "badge" => "Cadastrados",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                 "label" => "Cadastrar Eventos",
                                                "url" => ["event/create"],
                                                "badge" => " Informe o evento",
                                                "badgeOptions" => ["class" => "label-info"],
                                            ],
                                            
                                        ],
                                    ],
                                    [
                                        "label" => "Turmas",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Turma Infantil", "url" => ["turma_infantil/index",]],
                                            ["label" => "Turma do Fundamental", "url" => ["turma/index"]],
                                         
                                        ],
                                    ],
                                    [
                                        "label" => "Tombo / Transferência",
                                        "url" => "#",
                                        "icon" => "file",
                                        "items" => [
                                            [
                                                "label" => "Transferência",
                                                "url" => ["livro_controle/create"],
                                                "badge" => "Realizar Transferência",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                 "label" => "Consultar Transferência",
                                                "url" => ["livro_controle/index"],
                                                "badge" => " Visualizar",
                                                "badgeOptions" => ["class" => "label-info"],
                                            ],
                                            
                                        ],
                                    ],
                                    [
                                        "label" => "Biblioteca",
                                        "url" => "#",
                                        "icon" => "th-list",
                                        "items" => [
                                            [
                                                "label" => "Registrar Autor",
                                                "url" => ["autor/index"],
                                                "badge" => "Nome do autor",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Registrar Classificação",
                                                "url" => ["classificacao/index"],
                                                "badge" => "Classificação do livro",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Registrar Editora",
                                                "url" => ["editora/index"],
                                                "badge" => "Editora",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Cadastrar Livros",
                                                "url" => ["livro/create"],
                                                "badge" => "Dados dos Livros",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Gerenciar Rotinas de Locação",
                                                "url" => "#",
                                                "items" => [
                                                    [
                                                        "label" => "Registrar Reserva de livro",
                                                        "url" => ["reserva/create"],
                                                    ],
                                                    [
                                                        "label" => "Verificar Reservas",
                                                        "url" => ["reserva/index"],
                                                    ],
                                                    [
                                                        "label" => "Registrar Locação de Livro",
                                                        "url" => ["locacao/create"],
                                                        
                                                    ],
                                                    [
                                                        "label" => "Verificar Livros alocados",
                                                        "url" => ["locacao/index"],
                                                        
                                                    ],
                                                     [
                                                        "label" => "Devolução de Livros",
                                                        "url" => ["locacao/update"],
                                                        
                                                    ],
                                                ],
                                            ],
                                        
                                        ],
                                    ],
                                    [
                                        "label" => "Acadêmico",
                                        "url" => "#",
                                        "icon" => "tasks",
                                        "items" => [
                                                [
                                                        "label" => "Diagnóstico Inicial",
                                                        "url" => ["diagnostico-inicial/index"],
                                                        "badge" => "Visão Inicial da turma",
                                                        "badgeOptions" => ["class" => "label-info"],
                                                    ],
                                            [
                                                "label" => "Frequência",
                                                "url" => ["frequencia/index"],
                                                "badge" => "Realizar Chamada",
                                                "badgeOptions" => ["class" => "label-danger"
                                            ],
                                        ],
                                            [
                                                "label" => "Nota",
                                                "url" => "#",
                                                "items" => [
                                                    [
                                                        "label" => "Cadastrar Avaliação",
                                                        "url" => ["nota/create"],
                                                    ],
                                                    [
                                                        "label" => "Cadastrar Relatório",
                                                        "url" => ["relatorio/index"],
                                                        "badge" => "Turmas Infantis",
                                                    ],
                                                ],
                                            ],

                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt=""> <?php if (!Yii::$app->user->isGuest){

                                echo Yii::$app->user->identity->login;
                             }
                                    ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                               
                                <li><a  <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Página Incial', 'url' => ['/site/index']],
           Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);?> 
                            </ul>
                        </li>

                       
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="/">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />
                Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>