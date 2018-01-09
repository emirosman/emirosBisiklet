<?php
function fetch_menu($data){

	foreach($data as $menu){

        echo "<li>".$menu->name."</li>";

        if(!empty($menu->sub)){

            echo "<ul>";

            fetch_sub_menu($menu->sub);

            echo "</ul>";
        }

    }

}

function fetch_sub_menu($sub_menu){

    foreach($sub_menu as $menu){

        echo "<li>".$menu->name."</li>";

        if(!empty($menu->sub)){

            echo "<ul>";

            fetch_sub_menu($menu->sub);

            echo "</ul>";
        }

    }

}

echo "<ul>";
fetch_menu($cat);
echo "</ul>";