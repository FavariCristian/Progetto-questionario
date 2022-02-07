<?php
include('template_header.php');
?>

<div id="wrapper">

    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h2>Il Questionario</h2>
            <p>Le domande sempre a portata di un click</p>
            <ul class="actions">
                <li><a href="#one" class="button scrolly">Vedi</a></li>
            </ul>
        </div>
    </section>

    <section id="one" class="wrapper style2 spotlights">
        <section>
            <div class="content">
                <div class="inner">
                    <h2>Matematica</h2>
                    <p>Domande di matematica</p>
                    <ul class="actions">
                        <li><a href="questionario.php?id_questionario=1" class="button">Prova</a></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="inner">
                    <h2>Storia</h2>
                    <p>Domande di storia</p>
                    <ul class="actions">
                        <li><a href="questionario.php?id_questionario=2" class="button">Prova</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
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