<?php
include('template_header.php');
include('dal_questionario.php');
?>
<p></p>
<div class="container">
    <h2>Per accedere a questo contenuto devi registrarti</h2>

    <form action="registrazione.php" method="post">
        <label>Inserisci il tuo nome: </label>
        <input type="text" id="user">
        <br />
        <button type="submit">Invia</button>
    </form>
</div>

<?php
include('template_footer.php');
?>