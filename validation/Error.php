<?php
    class Error
    {
        public static function showMessage($message) {
            echo "<script>echo(\"$message\")</script>>";
        }
    }