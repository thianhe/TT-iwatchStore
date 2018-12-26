<script>document.title = 'Order report'</script>
<div class="jumbotron">
    <div class="container text-center">
        <div class="container row ">
            <div id="day_filter" class="text-center col-2 filter selected" onclick="OrderReport(0)">Daily </div>
            <div id="month_filter" class="text-center col-2 filter" onclick="OrderReport(1)">Monthly</div>
            <div id="year_filter" class="text-center col-2 filter" onclick="OrderReport(2)">Yearly</div>
        </div>

        <div id="daily_report" class="container">
            <div class="row setting_list ">
                <div class="col-4">Date</div>
                <div class="col-4">Total Price</div>
                <div class="col-4">Number of order</div>
            </div>
            <?php
            foreach($daily as $date){
                echo '
                <div class="row setting_list">
                    <div class="col-4">'.$date['t_date'].'</div>
                    <div class="col-4">'.$date['t_cost'].'</div>
                    <div class="col-4">'.$date['t_number'].'</div>
                </div>
                ';
            }
            ?>
        </div> 

        <div id="monthly_report" class="container hide">
            <div class="row setting_list ">
                <div class="col-4">Date</div>
                <div class="col-4">Total Price</div>
                <div class="col-4">Number of order</div>
            </div>
            <?php
            foreach($monthly as $date){
                echo '
                <div class="row setting_list">
                    <div class="col-4">'.$date['t_month'].'-'.$date['t_year'].'</div>
                    <div class="col-4">'.$date['t_cost'].'</div>
                    <div class="col-4">'.$date['t_number'].'</div>
                </div>
                ';
            }
            ?>
        </div> 


        <div id="yearly_report" class="container hide">
            <div class="row setting_list ">
                <div class="col-4">Date</div>
                <div class="col-4">Total Price</div>
                <div class="col-4">Number of order</div>
            </div>
            <?php
            foreach($year as $date){
                echo '
                <div class="row setting_list">
                    <div class="col-4">'.$date['t_year'].'</div>
                    <div class="col-4">'.$date['t_cost'].'</div>
                    <div class="col-4">'.$date['t_number'].'</div>
                </div>
                ';
            }
            ?>
        </div> 
    </div>
</div>
