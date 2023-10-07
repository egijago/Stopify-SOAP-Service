<?php
function limit_page()
{

    $html = <<< "EOT"
        <div class="limit-page">
            <p>Limit: </p>
            <select name="limit_page" id="limit">
        EOT;
    $option ="";
    for($i = 1; $i <= 10; $i++){
        $res= $i * 5;
        $option .= "<option value=$res>$res</option>";
    }
    $html .= $option;
    $html .= <<< "EOT"
            </select>
        </div>
    EOT;
    return $html;
}