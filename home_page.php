<?php
include('template_header.php');
?>

<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#intro">Benvenuto</a></li>
                <li><a href="#one">Questionari</a></li>
            </ul>
        </nav>
    </div>
</section>

<div id="wrapper">

    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h1>Il Questionario</h1>
            <p>Le domande sempre a portata di un click</p>
            <ul class="actions">
                <li><a href="#one" class="button scrolly">Vedi</a></li>
            </ul>
        </div>
    </section>

    <section id="one" class="wrapper style2 spotlights">
        <section>
            <a href="#" class="image"><img src="images/pic01.jpg" alt="" data-position="center center" /></a>
            <div class="content">
                <div class="inner">
                    <h2>Matematica</h2>
                    <p>Domande di matematica</p>
                    <ul class="actions">
                        <li><a href="questionario.php" class="button">Prova</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
            <div class="content">
                <div class="inner">
                    <h2>Inforatica</h2>
                    <p>Domande di informatica</p>
                    <ul class="actions">
                        <li><a href="questionario.php" class="button">Prova</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <a href="#" class="image"><img src="images/pic03.jpg" alt="" data-position="25% 25%" /></a>
            <div class="content">
                <div class="inner">
                    <h2>Storia</h2>
                    <p>Domande di storia</p>
                    <ul class="actions">
                        <li><a href="questionario.php" class="button">Prova</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
            <div class="content">
                <div class="inner">
                    <h2>Altro</h2>
                    <p>Visualizza tutti i questionari svolgibili</p>
                    <ul class="actions">
                        <li><a href="tutti_questionari.php" class="button">Vedi</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
</div>

<?php
include('template_footer.php');
?>