
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-info" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Sistema de Análises Laboratoriais</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav pull-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <?= $this->Html->link("Home", array('controller' => 'pages','action' => 'home')); ?>
                    </li>
                    <li>
                        <?= $this->Html->link("Área Administrativa", array('controller' => 'usuarios','action' => 'index_login')); ?>
                    </li>
                    <li>
                        <?= $this->Html->link("Área do Paciente", array('controller' => 'pacientes','action' => 'index_login')); ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
