<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script.js"></script>

<div>
    <input type="text" value="" id='search' placeholder="Поиск...">
    <input type='button' value="Найти" id='button'> 
</div>
<div id="result">
    <?php
    require 'result.php';
    ?>
</div>