<?php

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Signup</h1>
    <form action="">
        <input type="text" name="username" placeholder="Username">
        <span class="feedback">😷</span>
    </form>

    <script>
        // keyup event on the input field
        // get the value of the input field
        // post formdata to ajax/checkusername.php
        // log the response in the console

        document.querySelector('input').addEventListener('keyup', function(){
            let username = this.value;

            let formData = new FormData();
            formData.append('username', username);

            fetch('ajax/checkusername.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                // if result.available true: show happy smiley in .feedback
                if(result.available){
                    document.querySelector('.feedback').innerHTML = '😊';
                }
                else {
                    document.querySelector('.feedback').innerHTML = '😱';
                }
                
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>