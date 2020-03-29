<html>
    <head>
        <title>Date Filter</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="main">
            <div class="message">
                <?php
                if (isset($read_set_value)) {
                    echo $read_set_value;
                }
                if (isset($message_display)) {
                    echo $message_display;
                }
                ?>
            </div>

            <div id="show_form">
                <h2>CodeIgniter Select By  Date</h2>
                <hr/>
                <?php
               
                echo form_open('admin/select_by_date_range');
                echo form_label('Select By Range Of Dates : ');
                echo "<br/>";

                echo "From : ";
                $data = array(
                    'type' => 'date',
                    'name' => 'date_from',
                    'value' => ''
                );
                echo form_input($data);
                echo "<br/>";
                echo "<br/>";
                echo " To : ";
                $data = array(
                    'type' => 'date',
                    'name' => 'date_to',
                    'value' => ''
                );
                echo form_input($data);
                echo "<div class='error_msg'>";
                if (isset($date_range_error_message)) {
                    echo $date_range_error_message;
                }
                echo "<br/>";
                echo "<br/>";
                echo form_submit('submit', 'Show Record');
                echo form_close();
                ?>
                <div class="message">
                    <?php
                    if (isset($result_display)) {
                        echo "<p><u>Result</u></p>";
                        if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else {
                            echo "<table class='result_table'>";
                            echo '<tr><th>NIK</th>
                                      <th>Nama</th>
                                      <th>Joining Date</th>
                                      <th>Address</th>
                                      <th>Mobile</th><tr/>';
                            foreach ($result_display as $value) {
                                echo '<tr>' . 
                                '<td class="NIK">' . $value->NIK . '</td>' . 
                                '<td>' . $value->nama . '</td>' . 
                                '<td class="j_date">' . $value->tgl_checkin . '</td>' . 
                                '<td>' . $value->alamat . '</td>' . 
                                '<td class="mob">' . $value->no_telp . '</td>' . '<tr/>';
                            }
                            echo '</table>';
                        }
                    }
                    ?>

                </div>
            </div>
            <?php
            if (isset($show_table)) {
                echo "<div class='emp_table'>";
                if ($show_table == 'Database is empty !') {
                    echo $show_table;
                } else {
                    echo '<caption>Employee Table</caption><br/><br/>';
                    echo "<table  width='500px'>";
                    echo '<tr><th class="NIK">NIK</th><th>Nama</th><th>Tgl Check In</th><tr/>';
                    foreach ($show_table as $value) {
                        echo "<tr>" . "<td class='NIK'>" . $value->NIK . "</td>" . "<td>" . $value->nama . "</td>" . "<td>" . $value->tgl_checkin . "</td>" . "<tr/>";
                    }
                    echo '</table>';
                }
                echo "</div>";
            }
            ?>
        </div>


    </body>
</html>