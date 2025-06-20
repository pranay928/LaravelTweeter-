<!DOCTYPE html>
<html>

<head>
    <title>All Tweets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            margin: 0;
            padding: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #222;
        }

        .alert {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .tweet {
            background: white;
            padding: 20px;
            margin: 20px auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            transition: transform 0.2s ease;
        }

        .tweet:hover {
            transform: translateY(-4px);
        }

        .tweet-input {
            width: 100%;
            font-size: 1.1em;
            border: none;
            background: none;
            padding: 8px 0;
            outline: none;
        }

        .tweet-input:focus {
            border-bottom: 2px solid #4b5563;
            background-color: #f9fafb;
        }

        .timestamp {
            font-size: 0.9em;
            color: #6b7280;
            margin-top: 8px;
        }

        .tweet form {
            margin: 0;
        }

        .edit-form button,
        .tweet form button {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 8px 16px;
            margin-top: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background 0.3s ease;
        }

        .edit-form button:hover,
        .tweet form button:hover {
            background-color: #2563eb;
        }

        .save-btn {
            background-color: #10b981;
        }

        .save-btn:hover {
            background-color: #059669;
        }

        .delete-button {
            background-color: #ef4444;
            margin-top: 10px;
        }

        .delete-button:hover {
            background-color: #dc2626;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 40px;
            color: #111827;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>All Tweets</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <a href="{{ route('home') }}">Post a new tweet</a>

        @foreach($tweets as $tweet)
        <div class="tweet">
        <form action="{{ route('updateTweet', $tweet->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <input type="text" name="tweet" value="{{ $tweet->tweet }}" readonly class="tweet-input" />

            <p class="timestamp">Posted on {{ $tweet->created_at->format('d M Y, h:i A') }}</p>

            <button type="submit" class="save-btn" style="display:none;">Save</button>
            <button type="button" onclick="enableEdit(this)">Edit</button>
        </form>

        <form action="{{ route('deleteTweet', $tweet->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        </div>
        @endforeach



        <script>
            function enableEdit(button) {
                const form = button.closest('.edit-form');
                const input = form.querySelector('.tweet-input');
                const saveBtn = form.querySelector('.save-btn');

                input.removeAttribute('readonly');
                input.style.borderBottom = '2px solid #ccc';
                input.style.background = '#f9fafb';
                saveBtn.style.display = 'inline-block';
                input.focus();
            }

            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(() => {
                    document.querySelectorAll('.alert-success, .alert-danger')
                        .forEach(alert => alert.style.display = 'none');
                }, 5000);
            });
        </script>
</body>

</html>