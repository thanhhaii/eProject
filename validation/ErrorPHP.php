<?php
    class ErrorPHP
    {
        public static function showMessage($message)
        {
            echo "<script>Alert(\"$message\");</script>";
        }
    }