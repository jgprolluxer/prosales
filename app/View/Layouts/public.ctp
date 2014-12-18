<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Obelit Portal de clientes</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <?php
        echo $this->Html->css('/public_assets/plugins/font-awesome/css/font-awesome.min.css');
        echo $this->Html->css('/public_assets/plugins/bootstrap/css/bootstrap.min.css');

        echo $this->Html->css('/public_assets/css/style-metronic.css');
        echo $this->Html->css('/public_assets/css/style.css');
        echo $this->Html->css('/public_assets/css/themes/blue.css');
        echo $this->Html->css('/public_assets/css/style-responsive.css');
        echo $this->Html->css('/public_assets/css/custom.css');
        ?>
        <!-- BEGIN GLOBAL MANDATORY STYLES
        <link href="public_assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
         END GLOBAL MANDATORY STYLES -->


        <!-- BEGIN THEME STYLES
        <link href="public_assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="public_assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="public_assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="public_assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="public_assets/css/custom.css" rel="stylesheet" type="text/css"/>
        END THEME STYLES -->


        <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
        <!--[if lt IE 9]>
        <script src="public_assets/plugins/respond.min.js"></script>  
        <![endif]-->
        <?php
        echo $this->Html->script("/public_assets/plugins/jquery-1.10.2.min.js");
        echo $this->Html->script("/public_assets/plugins/jquery-migrate-1.2.1.min.js");
        echo $this->Html->script("/public_assets/plugins/bootstrap/js/bootstrap.min.js");
        echo $this->Html->script("/public_assets/plugins/hover-dropdown.js");
        echo $this->Html->script("/public_assets/plugins/back-to-top.js");
        echo $this->Html->script("/public_assets/plugins/uniform/jquery.uniform.min.js");
        echo $this->Html->script("/js/plugins/YUI/yui-min.js");
        echo $this->Html->script("/js/utilities.js");
        ?>
        <!--
        <script src="/public_assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="/public_assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="/public_assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
        <script type="text/javascript" src="/public_assets/plugins/hover-dropdown.js"></script>
        <script type="text/javascript" src="/public_assets/plugins/back-to-top.js"></script>
        -->
        <!-- END CORE PLUGINS -->

        <link rel="shortcut icon" href="favicon.ico" />
        <script type="text/javascript">
            var baseAppPath = '<?php echo $this->base; ?>';
            var baseViewPath = '<?php echo $this->base . "/" . $this->name . "/"; ?>';
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body>
        <!-- BEGIN STYLE CUSTOMIZER 
        <div class="color-panel hidden-sm">
            <div class="color-mode-icons icon-color"></div>
            <div class="color-mode-icons icon-color-close"></div>
            <div class="color-mode">
                <p>THEME COLOR</p>
                <ul class="inline">
                    <li class="color-blue current color-default" data-style="blue"></li>
                    <li class="color-red" data-style="red"></li>
                    <li class="color-green" data-style="green"></li>
                    <li class="color-orange" data-style="orange"></li>
                </ul>
                <label>
                    <span>Header</span>
                    <select class="header-option form-control input-small">
                        <option value="default" selected>Default</option>
                        <option value="fixed">Fixed</option>
                    </select>
                </label>
            </div>
        </div>
         END BEGIN STYLE CUSTOMIZER -->   

        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN LOGO (you can use logo image instead of text)-->
                    <?php
                    $logoIMG = $config["Config"]["quote_header_logo"];
                    if ($logoIMG == "" || $logoIMG == null)
                    {
                        $logoIMG = "/img/logotipo.png";
                    }
                    ?>
                    <a class="navbar-brand logo-v1" href="/Publicportal/">
                        <img src="<?php echo $logoIMG; ?>" id="logoimg" alt="">
                    </a>
                    <!-- END LOGO -->
                </div>

                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php echo $this->App->drawPublicMenu(); ?>
                    </ul>                         
                </div>
                <!-- BEGIN TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- END HEADER -->

        <div id="yuidemo">DEMO YUI</div>
        <!-- BEGIN PAGE CONTAINER -->  
        <div class="page-container">
            <?php $sessionMsg = $this->Session->flash(); ?>
            <?php if ($sessionMsg): ?>
                <?php if ((strpos($sessionMsg, '<script>') !== FALSE)): ?>
                    <?php echo $sessionMsg; ?>
                <?php else: ?>
            <div id="alert" class="alert alert-danger display-hide">
                <span class="glyphicon glyphicon-remove" style="float: right;" onclick="$(this).parent().hide(800);"></span>
                <center>
                    <span><?php echo $sessionMsg; ?></span>
                </center>
            </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- END PAGE CONTAINER -->  

        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 space-mobile">
                        <!-- BEGIN ABOUT -->                    
                        <h2>Acerca de</h2>
                        <p class="margin-bottom-30">
                            En Obelit reclutamos los mejores talentos en CRM, podemos ayudarle a definir de forma rápida y robusta su estrategia,  a determinar los beneficios y calcular el ROI. <br /><br />
                            Realizamos el análisis de la mejor solución CRM que le conviene y le ayudamos a implementarla.<br /><br />
                            Le brindamos soporte post-implementación y le ayudamos a dar seguimiento a los indicadores de negocio.</p>
                        <div class="clearfix"></div>                    
                        <!-- END ABOUT -->          

                    </div>
                    <div class="col-md-4 col-sm-4 space-mobile">
                        <!-- BEGIN CONTACTS -->                                    
                        <h2>Contactanos</h2>
                        <address class="margin-bottom-40">
                            Obelit, Technology Solutions. <br />
                            Torres IOS campestre <br />
                            Av Ricardo Margain 575 Parque Corporativo Santa Engracia. <br />
                            San Pedro Garza Garcia, NL. CP (66267) M&eacute;xico <br />
                            Email: <a href="mailto:contact@obelit.com">contact@obelit.com</a>                        
                        </address>
                        <!-- END CONTACTS -->                                                                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END FOOTER -->

        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p>
                            <span class="margin-right-10">2013 © Obelit. ALL Rights Reserved.</span> 
                            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <ul class="social-footer">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-dropbox"></i></a></li>
                        </ul>                
                    </div>
                </div>
            </div>
        </div>
        <!-- END COPYRIGHT -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script type="text/javascript">
            $(document).ready(function()
            {
                /* NO BORRAR NO BORRAR
                 var url = qualifyURL('/Publicportal/getAccountByUserPublic/');
                 var snddata = {};
                 snddata['userID'] = $('#txtUserLoggedID').val();
                 var elArray = new Array();
                 elArray[0] = snddata;
                 setUserAccountID( getAjaxJSONData( url, elArray[0] ) );
                 */

                console.log('RandomFunctionName: ' + chance.hash({length: 20}));

            YUI().use('transition', function (Y) {
                Y.one('#yuidemo').transition({
                    easing: 'ease-out',
                    duration: 0.75, // seconds
                    width: '10px',
                    height: '10px'
                }, function() {
                    this.remove();
                });
            });
            
            });

            
            /* NO BORRAR NO BORRAR
             function setUserAccountID(data)
             {
             if(data.length !== 0)
             {
             //console.log('Account id: '+data[0]['Account']['id']);
             $('#idAccountUserLogged').val(data[0]['Account']['id']);
             }
             
             }
             */
        </script>
    </body>
    <!-- END BODY -->
</html>
