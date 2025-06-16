<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #form {
            display: none;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <h1>WELCOME</h1> 
    <div id="button">
        <button type="button" id="btn">what's on your mind? </button>  
    </div>    
    <div id="form"> 
        <form action="{{ route('tweet') }}" method="POST">
            @csrf
            <p><label for="tweet">Tweet it!</label></p>
            <input type="hidden" name="hidden">
            <textarea name="tweet" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Submit">
          </form>
    </div> 

    <script>
        document.querySelector('#btn').addEventListener('click', function() {
            document.querySelector('#form').style.display = 'block';
            document.querySelector('#button').style.display = 'none';
        });
    </script>
</body>
</html>