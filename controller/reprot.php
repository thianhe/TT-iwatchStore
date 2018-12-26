<?php
    $daily =  Database::get()->execute('select sum(cost) as t_cost, date(date_time) as t_date,count(*) as t_number from order_list group by (date(date_time)) order by t_date desc;');
    $monthly = Database::get()->execute('select sum(cost) as t_cost, MONTH(date_time) AS t_month, Year(date_time) AS t_year,count(*) as t_number from order_list group by t_month, t_year order by t_month desc, t_year desc;');
    $year = Database::get()->execute('select sum(cost) as t_cost, Year(date_time) AS t_year,count(*) as t_number from order_list group by t_year order by t_year desc;');

    include('view/header/header.php');
    include('view/body/reprot.php');
    include('view/footer/footer.php');
?>