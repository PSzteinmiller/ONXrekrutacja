<!DOCTYPE html>
<html>
    <body>
        <h1> Witam w zadaniu nr. 1 </h1>

        <?php 
        
        class Pipeline {
            public function make(...$funcs) {
                return function ($arg) use ($funcs) {
                    $result = $arg;
                    foreach ($funcs as $func) {
                        $result = $func($result);
                    }
                    return $result;
                };
            }
        }


        $pipeline  = new Pipeline();
        $func = $pipeline -> make(
        function($var) { return $var * 3; }, 
        function($var) { return $var + 1; },
        function($var) { return $var / 2; }
        );
        $result = $func(3);
        echo "Wynik wynosi: " . $result;

        ?>
    </body>
</html>