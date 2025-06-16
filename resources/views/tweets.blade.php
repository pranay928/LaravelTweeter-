<!DOCTYPE html>
<html>
<head>
    <title>All Tweets</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }
        .tweet {
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .timestamp {
            color: #555;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h1>All Tweets</h1>

    @foreach($tweets as $tweet)
        <div class="tweet">
            <form action="{{route('updateTweet', $tweet->id) }}" method="POST" class="edit-form">
                @csrf
                @method('PUT')

                <input type="text" name="tweet" value="{{ $tweet->tweet }}" readonly class="tweet-input" style="border:none; background:none; width:100%; font-size:1em;" />

                <p class="timestamp">Posted on {{ $tweet->created_at->format('d M Y, h:i A') }}</p>

                <button type="submit" style="display:none;" class="save-btn">Save</button>
                <button type="button" onclick="enableEdit(this)">Edit</button>
            </form>

            <form action="{{ route('deleteTweet', $tweet->id) }}" method="POST" style="margin-top:5px;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    @endforeach

    <a href="{{ route('home') }}">Post a new tweet</a>

    <script>
        function enableEdit(button) {
            const form = button.closest('.edit-form');
            const input = form.querySelector('.tweet-input');
            const saveBtn = form.querySelector('.save-btn');
            
            input.removeAttribute('readonly');
            input.style.border = '1px solid #ccc';
            input.style.background = '#fff';
            saveBtn.style.display = 'inline-block';
            input.focus();
        }
    </script>
</body>
</html>
