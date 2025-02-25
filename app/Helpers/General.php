<?php

const PAGINATE_VALUE = 20;

if (! function_exists('paginate_counter')) {
    function paginate_counter()
    {
        $page = (int) request()->query('page', 1);

        if ($page < 1) {
            $page = 1;
        }

        return ($page - 1) * PAGINATE_VALUE + 1;
    }
}
