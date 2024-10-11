<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container-fluid m-0 p-0">
    <div class="chatbot-header">
        <span class="bot-name">CHATBOT</span>
    </div>
    <div id="content-box" class="p-2">
        {{-- output --}}
    </div>
    <div class="chat-input p-2">
        <input type="text" id="input" placeholder="Type a message...">
        <input type="submit" value="SEND" id="button-submit" class="btn">
    </div>

</div>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.3.js" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#button-submit').on('click', function () {
        var value = $('input').val();

        $('#content-box').append(`<div class="user-message float-right">`
            + value + `</div> <div style="clear: both"></div>`);
        $('#input').val('');

        // AJAX POST request
        $.ajax({
            type: 'POST',
            url: '/send',
            data: { 'input': value },
            success: function (data) {
                $('#content-box').append(
                    `<div>
                        <img src="" alt="bot image">
                        <div>` + data + `</div>
                    </div>`
                );
                $('#content-box').scrollTop($('#content-box')[0].scrollHeight);
            }
        });
    });
</script>
</body>
</html>
