<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="chat-style.css">
    <title>chatbot</title>
</head>

<body>
    <div class="wrapper">
        <div class="title">Simple Online Chatbot</div>

        <div class="form">

            <!--  -->

            <!--  -->

        </div>

        <div class="typing-field">
            <div class="input-data">
                <input type="text" id="data" placeholder="Type something here..." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(() => {

            $('#send-btn').on('click', () => {
                let value = $('#data').val();
                $msg = ` <div class="user-inbox inbox"><div class="msg-header"><p>${value}</p></div></div>`;
                $('.form').append($msg);
                $('#data').val('');

                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + value,
                    success: (result) => {
                        $reply = `<div class="bot-inbox inbox">
                                               <div class="icon">
                                                 <i class="fa fas fa-user-circle"></i>
                                               </div>
                                               <div class="msg-header">
                                                  <p>${result}</p>
                                                </div>
                                           </div>`;
                        $('.form').append($reply);
                        $('.form').scrollTop($('.form')[0].scrollHeight);
                    }
                });
            });
         
        });
    </script>

</body>

</html>