<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .font-size{
        color: blueviolet;
        size:20px
    }
</style>
<body>
    <h2><p><u class="font-size">Magic Method</u> is a method which is called automatically when the class has been called. It started with double uderscore(__). It is called based on some condition according to our code..Some Name of <b class="font-size"><i>Magic Method</i></b>  is.....</p></h2>
    <ul>
        <li>__construct()</li><li>__clone()</li>
        <li>__destruct()</li><li>__sleep()</li>
        <li>__get()</li><li>__wakeup()</li>
        <li>__set()</li><li>__call()</li>
        <li>__isset()</li><li>__callStatic()</li>
        <li>__unset()</li><li>__toString()</li>
        <li>__autoload()</li><li>__invoke</li>  
    </ul>

    <p style="font-weight: 500px;">
        Class abc{<br>
            public function first(){<br>
                echo "This is first function";<br>
            }<br>
        }<br>
        <br><br>
        test = new abc();<br>
        $test->first()<br>
    </p>
    <?php
    //destruct method
    // class abc{
    //     private $conn;
    //     public function __construct(){
    //         //echo "This is construct function<br>";
    //         $this->conn=mysqli_connect();
    //     } 
    //     public function insert(){
    //         echo "Hello everyone<br>";
    //     }                
    //     public function __destruct()
    //     {
    //         echo "This is destruct function<br>";
    //         mysqli_close($this->conn);
    //     }
        
    // }
    // $object=new abc();
    // $object->insert();
    // echo "<br><br>";

    /*
    *autoload

     */

    //  require "first.php";
    //  require "second.php";
    //  $tst=new test();
    ?>

    <?php
    class third{
        public function __toString()
        {
            return "You can't print object as a string of class:".get_class($this);
        }

    }   
    $obj=new third();
    echo $obj; 
    ?>
    
</body>
</html>