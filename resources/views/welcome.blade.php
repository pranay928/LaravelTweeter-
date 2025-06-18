<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Tweet</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #c9d6ff, #e2e2e2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 2.5em;
            color: #1f2937;
        }

        #button {
            margin-bottom: 20px;
        }

        #btn {
            padding: 12px 24px;
            font-size: 1em;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        #btn:hover {
            background-color: #2563eb;
        }

        #form {
            display: none;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: vertical;
            min-height: 120px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #059669;
        }
    </style>
</head>
<body>
    <h1>Welcome {{ Auth::User()->name }}</h1>
    @include('logout')

    <div id="button">
        <button type="button" id="btn">What's on your mind?</button>  
    </div>    

    <div id="form"> 
        <form action="{{ route('tweet') }}" method="POST">
            @csrf
            <label for="tweet">Tweet it!</label>
            <input type="hidden" name="hidden">
            <textarea name="tweet" id="tweet" placeholder="Share something awesome..."></textarea>
            <input type="submit" value="Submit">
        </form>
    </div> 

    <script>
        document.querySelector('#btn').addEventListener('click', function () {
            const form = document.querySelector('#form');
            form.style.display = 'block';
            document.querySelector('#button').style.display = 'none';
        });
    </script>
</body>
</html>
