
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>YSJ</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="../../../fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="../../../style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="../../../css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="../../../css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="../../../css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="../../../css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="../../../css/custom.css" />
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_info">
                           <h6><?php echo $_SESSION['nome'] ?> </h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>GERAL</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false"
                         class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> 
                         <span>Funcionário</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="/funcionario/form">> <span>Cadastrar</span></a>
                           </li>
                           <li>
                           <a href="/funcionario">> <span>Listar</span></a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false"
                         class="dropdown-toggle"><i class="fa fa-briefcase blue1_color"></i>
                          <span>Produto</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="/produto/form">> <span>Cadastrar</span></a></li>
                           <li><a href="/produto">> <span>Listar</span></a></li>
                           <li><a href="/Stock">> <span>Stock</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                           <i class="fa fa-table purple_color2"></i> <span>Categoria</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="/categoria/form">> <span>Cadastrar</span></a></li>
                           <li><a href="/categoria">> <span>Listar</span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                           <i class="fa fa-clone yellow_color"></i> <span>Relatório</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li><a href="/relatoriodiario">> <span>Diario</span></a></li>
                           <li><a href="/relatorioPersonalizado">> <span>Personalizado</span></a></li>
                        </ul>
                     </li>
                     </li>
                     <li><a href="/Venda"><i class="fa fa-bar-chart-o green_color"></i> <span>Ponto De Venda</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="/">
                             <img class="img-responsive" src="../logotipo/logotipo.png" alt="#" />
                           </a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                       <span class="name_user"><?php echo $_SESSION['nome'] ?></span></a>
                                    <div class="dropdown-menu">
                                       
                                       <a class="dropdown-item" href="/logout"><span>Sair</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->