<?php

    class View{

        function render($contentView, $title, $model = null, $layout = 'layout.php'){

            include 'app/views'.$layout;
        
        }

    }

?>