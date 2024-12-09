<!-- <?php
class Form {
    private $fields = array();
    private $action;
    private $submit = "Submit";
    private $jumField = 0;

    public function __construct($action, $submit) {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function addField($name, $label) {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->jumField++;
    }

    public function displayForm() {
        echo "<form action='" . $this->action . "' method='POST' enctype='multipart/form-data'>";
        echo '<table width="100%" border="0">';
        foreach ($this->fields as $field) {
            echo "<tr>";
            echo "<td align='right'>" . $field['label'] . "</td>";
            echo "<td><input type='text' name='" . $field['name'] . "'></td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='2' align='center'>";
        echo "<input type='submit' value='" . $this->submit . "'>";
        echo "</td></tr>";
        echo "</table>";
        echo "</form>";
    }
}
?> -->
