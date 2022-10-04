<?php
include_once("header.php");
include_once("./private/conexao.php");
?>


<section id="titulo-blog">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="display-4 fw-bold text-white text-center">Novidades</h4>
            <div class="heading-line"></div>
        </div>

        <div class="col-lg-12">
            <nav class="text-center text-white" aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-center text-white"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-center active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="temas atomos animate__animated animate__fadeInUp animate__delay-2s" id="temas">
    <div class="container">
        <div class="row text-white">
            <div class="col-lg-8 shadow p-3 temas-conta">
                <div class="cta-info w-100">
                    <h4 class="display-4 fw-bold text-white">Compre temas para<br> sua empresa.</h4>
                    <h4 class="display-4 fw-bold text-white">Baixe Landing Pages <br> grátis para você.</h4>
                    <p class="lh-lg text-white">
                        Posso instalar e configurar o seu tema, por uma de taxa de serviço de:
                    <div class="taxa">R$1.500,00</div>
                    </p>
                    <h3 class="display-3--brief">Tipos de Temas:</h3>
                    <ul class="cta-info__list">
                        <li>Lanchonetes, Restaurantes e Padarias;</li>
                        <li>E-commerces de Roupas, Acessórios e Diversos;</li>
                        <li>Landing Pages, Site Empresarial, Site Simples;</li>
                        <li>Micro Blogs, Vlogs, Temas Wordpress, Plataforma LMS;</li>
                        <li>Agências de Viagens, Automóveis, Corretores em geral.</li>
                    </ul>
                </div>
            </div>

            <!-- Form Contact -->
            <div class="col-lg-4">
                <div class="temas" id="temas">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h4>Loja & <em>Temas</em></h4>
                                <div class="heading-line"></div>
                                <p>Deseja saber mais sobre meu trabalho ou contratar meus serviços? Mande sua mensagem.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="owl-temas owl-carousel">
                                <div class="col-lg-12">
                                    <div class="item shadow">
                                        <img src="assets/images/portfolio/tropikana.png">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="item shadow">
                                        <img src="assets/images/portfolio/lupinus.png">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="item shadow">
                                        <img src="assets/images/portfolio/docesflakes.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12 white-button text-align">
                            <a class="gradient border-rd align-items-center" href="loja.php" target="_blank">Ver Loja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog animate__animated animate__fadeInUp animate__delay-2s" id="blog">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //Setar a quantidade de itens por pagina
    $qnt_result_pg = 1;

    //calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    $conexao = mysqli_connect("localhost", "root", "", "adrianalima");
    $result_post = "SELECT * FROM post ORDER BY `post`.`id`,`titulopost`,`imgpost`,`tags`,`categoria`,`resumo` ASC";
    $resultado_post = mysqli_query($conexao, $result_post);

    ?>
    <div class="blog-wrap p-3">
        <div class="container pd-0">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="blog-list">
                        <?php while ($row_post = mysqli_fetch_assoc($resultado_post)) { ?>
                            <ul>
                                <li>
                                    <div class="row no-gutters shadow p-3 conta mb-30">
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="blog-img">
                                            <?php echo '<img src="assets/images/post/'.($row_post['imgpost']).'"/>';?>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-12 col-sm-12">
                                            <div class="blog-caption">
                                                <h4><a class="text-pink" href="postBlog.php?id=<? echo $id; ?>"><?php echo $row_post['titulopost']; ?></a></h4>
                                                <div class="blog-by">
                                                    <p class="text-white"><?php echo $row_post['resumo']; ?>...</p>
                                                    <div class="pt-10">
                                                        <a href="postBlog.php?id=<? echo $row_post['id']; ?>" class="btn btn-outline-primary">Leia Mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>

                    <div class="br-15 gradient text-align">
                        <?php
                        //Paginção - Somar a quantidade de usuários
                        $result_pg = "SELECT COUNT(id) AS num_result FROM post";
                        $conexao = mysqli_connect("localhost", "root", "", "adrianalima");
                        $resultado_pg = mysqli_query($conexao, $result_pg);
                        $row_pg = mysqli_fetch_assoc($resultado_pg);

                        //Quantidade de pagina 
                        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                        //Limitar os link antes depois
                        $max_links = 2;
                        echo "<a class='text-white' href='blog.php?pagina=1'>Primeira</a> ";

                        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                            if ($pag_ant >= 1) {
                                echo "<a class='text-white' href='blog.php?pagina=$pag_ant'>$pag_ant</a> ";
                            }
                        }

                        echo "$pagina ";

                        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                            if ($pag_dep <= $quantidade_pg) {
                                echo "<a class='text-white' href='blog.php?pagina=$pag_dep'>$pag_dep</a> ";
                            }
                        }
                        echo "<a class='text-white' href='blog.php?pagina=$quantidade_pg'>Ultima</a>";
                        ?>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="card-box mb-30">
                        <h5 class="pd-20 h5 mb-0">Categories</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">HTML <span class="badge badge-primary badge-pill">7</span></a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">Css <span class="badge badge-primary badge-pill">10</span></a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between active">Bootstrap <span class="badge badge-primary badge-pill">8</span></a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">jQuery <span class="badge badge-primary badge-pill">15</span></a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">Design <span class="badge badge-primary badge-pill">5</span></a>
                        </div>
                    </div>
                    <div class="card-box shadow background-white br-5 mt-30 mb-30">
                        <h5 class="pd-20 h5 mb-0">Navegue por Tags</h5>
                        <div class="latest-post">
                            <?php
                            $result_post = "SELECT * FROM post ORDER BY `post`.`tags` ASC";
                            $resultado_post = mysqli_query($conexao, $result_post);

                            while ($row_post = mysqli_fetch_assoc($resultado_post)) { ?>
                                <ul>
                                    <li>
                                        <span><a href="#"><?php echo $row_post['tags']; ?></a></span>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-box overflow-hidden">
                        <h5 class="pd-20 h5 mb-0">Archives</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">January 2020</a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">February 2020</a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">March 2020</a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">April 2020</a>
                            <a href="#" class="list-group-item d-flex align-items-center justify-content-between">May 2020</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="temas animate__animated animate__fadeInUp animate__delay-2s" id="temas">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="temas2" id="temas2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h4>Publi<em>cidade</em></h4>
                                <div class="heading-line"></div>
                                <p>Deseja saber mais sobre meu trabalho ou contratar meus serviços? Mande sua mensagem.</p>
                                <a href="http://usheethe.com/P24X" target="_blank">
                                    <!--<img src="assets/images/contact.png">-->
                                    <video autoplay controls loop>
                                        <source allow="autoplay;" src="assets/images/video/Renda-Extra-Sem-Pagar-Nada.mp4">
                                    </video>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 shadow p-3 mt-30 temas-conta atomos">
                <div class="cta-info w-100">
                    <h4 class="display-4 fw-bold ml-30 text-white">Espaço utilizado<br> para publicidade.</h4>
                    <p class="lh-lg ml-30 text-white">
                        Atuando há 6 anos no mercado de TI, estou sempre buscando inovação e melhoria<br> nos trabalhos que desenvolvo!
                    </p>

                    <div class="row mt-30">
                        <div class="owl-blog owl-carousel">
                            <div class="col-lg-12 mt-20">
                                <div class="item">
                                    <div class="ml-20 shadow background-white p-1em br-15 w-100">
                                        <h4 class="text-pink text-center">Publicidade!</h4>
                                        <div class="heading-line"></div>
                                        <p>Deseja saber mais sobre meu trabalho ou contratar meus serviços? Mande sua mensagem.</p>
                                        <a heref="#" target="_blank"><img src="assets/images/contact.png"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12  mt-20">
                                <div class="item">
                                    <div class="ml-20 shadow background-white p-1em br-15 w-100">
                                        <h4 class="text-pink text-center">Publicidade!</h4>
                                        <div class="heading-line"></div>
                                        <p>Deseja saber mais sobre meu trabalho ou contratar meus serviços? Mande sua mensagem.</p>
                                        <a heref="#" target="_blank"><img src="assets/images/contact.png"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-20">
                                <div class="item">
                                    <div class="ml-20 shadow background-white p-1em br-15 w-100">
                                        <h4 class="text-pink text-center">Publicidade!</h4>
                                        <div class="heading-line"></div>
                                        <p>Deseja saber mais sobre meu trabalho ou contratar meus serviços? Mande sua mensagem.</p>
                                        <a heref="#" target="_blank"><img src="assets/images/contact.png"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <!-- Start of adf.ly banner code -->
        <div class="background-white p-1em shadow br-15" style="width: 100%; text-align: center; height: auto;">
            <a href="https://join-adf.ly/26575109">
                <img border="0" src="https://cdn.ay.gy/images/banners/adfly.728x90.1.gif" width="528" height="90" title="AdF.ly - encurtar links e ganhar dinheiro!" />
            </a><br />
            <a href="https://join-adf.ly/26575109">Ganhe dinheiro para compartilhar os seus links!</a>
        </div>
        <!-- End of adf.ly banner code -->
    </div>
</section>


<section>
    <div class="container">
        <!-- Banner Bravulink -->
        <div class="background-white p-1em shadow br-15" style="width: 100%; text-align: center; height: auto;">
            <a href="https://bravuhost.com/central/aff.php?aff=10813">
                <img border="0" src="assets/images/publicidade/24_br.gif" width="528" height="90" title="Hospedagem barata e boa é na Bravulink!" />
            </a><br />
            <a href="https://bravuhost.com/central/aff.php?aff=10813">Ganhe dinheiro revendendo hospedagem!</a>
        </div>
        <!-- End Banner Bravulink -->
    </div>
</section>

<?php include_once("footer.php"); ?>