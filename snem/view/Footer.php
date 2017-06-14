<?php

class Footer
{
    static function showFooter()
    {
        ?>

        <footer>
            <script>
                $(document).ready(function() {
                   console.log("Ready");
                   $bg = $('#project-bg');
                   $f1 = $('#project-path-1').html();
                   $f2 = $('#project-path-2').html();
                   $f3 = $('#project-path-3').html();
                   console.log($f1);
                   console.log($f2);
                   console.log($f3);
                   var counter = 0;
                   $bg.attr('src', "/EXWD/" + $f1);
                   setInterval(function() {
                       $path = "";
                       if(counter == 0) $path = $f1;
                       else if(counter == 1) $path = $f2;
                       else  $path = $f3;
                       counter++;
                       counter %= 3;
                       $bg.attr('src', "/EXWD/" + $path);
                   }, 3000);


                   $('#btnAddToFavorites').on('click', function() {
                       $id = $('#project-id').html();
                       $.post( "/EXWD/DetailController.php", { id: $id, toCookie: "true" } );
                   });
                });
            </script>
        </footer>

        <?php
    }
}

?>