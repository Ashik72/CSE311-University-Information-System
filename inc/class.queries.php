<?php

class Queries extends Essential {


    public static function myq1query() {
        echo "<div>Static myTxt</div>";

        $query = Essential::runQuery("SELECT * FROM `takes`");
        Essential::makeTable($query);

    }
}