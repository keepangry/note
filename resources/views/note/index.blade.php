<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        li { display: inline-block; }

        .note_line {
            display: -webkit-flex; /* Safari */
            display: flex;
            border-bottom: dotted 1px;
        }
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .paginate {
            text-align:center;
        }

        .form_content {
            border: solid 1px;
            width: 100%;
            min-height: 100px;
            margin: 0 auto;
        }

        .input {
            padding: 5px;
            width: 80%;
            min-height: 80px;
            border: 1px solid #ccc;
            resize: none;
            overflow: hidden;
            word-wrap: break-word;
        }
        .hide {
            position: absolute;
            z-index: -100;
            visibility: hidden;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div>
            <form action="/save" method="POST">
                {{ csrf_field() }}
                <pre class="input hide" id="pre"></pre>
                <div><textarea class="input" id="textarea" name="content"></textarea></div>
                <div><button class="form_submit" type="submit">发布</button></div>
            </form>
        </div>
        <div class="note_list">
            @foreach ($notes as $note)
                <div class="note_line">
                    <div class="content">
                        <pre>{{ $note->created_at }} </pre>
                        <pre>{{ $note->content }}</pre>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $notes->links() }}
        </div>
    </div>
</div>
<script>
    // 自适应高度 textarea
    var textarea = document.getElementById('textarea');
    var pre = document.getElementById('pre');

    textarea.oninput = function() {
        pre.textContent = textarea.value;
        textarea.style.height = pre.offsetHeight + 'px';
    }
</script>
</body>
</html>
