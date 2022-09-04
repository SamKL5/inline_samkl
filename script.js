$(document).ready(function(){
    $("#button").on('click',function(){
        var str=$('#search').val();
        $.ajax({
            url: "result.php",
            type: "POST",
            data: {query: str},
            success: function(res) {
                $('#result').html(res);
            }
        })
})})