<!DOCTYPE html>
<html>
    <body>

        <h1> Witam w zadaniu nr. 2 </h1>

        <?php 
        
        class TextInput {
            protected $value ='';

            public function add($text) {
                $this->value .= $text;
            }

            public function getValue(){
                return $this->value;
            }    
        }

        class NumericInput extends TextInput {
            public function add($text) {
                if(is_numeric($text)) {
                    parent::add($text);
                }
            }
        }
        
        $textField = null;
        $numericField = null;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $textValue = $_POST["text_field"];
        $numericValue = $_POST["numeric_field"];

        $textField = new TextInput();
        $numericField = new NumericInput();

        $textField->add($textValue);  
        $numericField->add($numericValue); 

        }
        ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Pola tekstowe</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="text_field">Pole tekstowe:</label>
            <input type="text" id="text_field" name="text_field">
            <br>
            <label for="numeric_field">Pole liczbowe:</label>
            <input type="text" id="numeric_field" name="numeric_field">
            <br>
            <input type="submit" value="Wyślij">
        </form>

        <?php if ($textField !== null): ?>
            <h3>Wartość pola tekstowego:</h3>
            <p><?php echo $textField->getValue(); ?></p>
        <?php endif; ?>

        <?php if ($numericField !== null): ?>
            <h3>Wartość pola liczbowego:</h3>
            <p><?php echo $numericField->getValue(); ?></p>
        <?php endif; ?>
    </body>
    </html>

    </body>
    </html>