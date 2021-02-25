<?php
class TABLE {
    private $Data = array();
    private $Class = "";
    private $head_scope = "";
    private $data_scope = "";
    private $OverrideHeaders = array();

    function __construct($class = "table", $head_scope = "col", $data_scope = "row") {
        $this->Class = $class;
        $this->head_scope = $head_scope;
        $this->data_scope = $data_scope;
    }


    public function AddRow($row) {
        $this->Data[] = $row;
    }

    public function AddRows($rows) {
        $this->Data = array_merge($this->Data, $rows);
    }

    public function AddColumn($key, $html, $data) {
        foreach($this->Data as &$row) {
            $colhtml = $html;
            foreach ($data as $replace => $value) {
                $colhtml = str_replace($replace, $row[$value], $colhtml);
            }
            $row[$key] = $colhtml;
        }

    }

    public function SetHeaders($arr) {
        $this->OverrideHeaders = $arr;
    }

    public function Output() {
        $columns = array();

        if ($this->OverrideHeaders) {
            $columns = $this->OverrideHeaders;
        } else {
            foreach($this->Data as $row) {
                foreach ($row as $column => $value) {
                    $columns[$column] = $column;
                }
            }
        }

        echo '<table class="'.$this->Class.'"><thead>';

        echo '<tr>';
        foreach($columns as $key => $caption) {
            echo ' <th scope="'.$this->head_scope.'">' . $caption . '</th>';
        }
        echo '</tr>';

        echo '</thead><tbody>';

        foreach($this->Data as $row) {
            echo '<tr>';
            foreach($columns as $key => $caption) {
                echo ' <td>' . $row[$key] . '</td>';
            }
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
}
?>
