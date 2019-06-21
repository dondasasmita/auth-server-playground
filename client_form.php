<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client ID and Client Secret Form</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <h2>Client Secret Form</h2>
    </div>
    <div>
        <form action="#" method="get">
            <label for="client_id">Insert Client ID</label>
            <br><br>
            <input id="client_id" type="text" name="client_id" required>
            <button id="issue">Issue Secret</button>
        </form>
    </div>
    <div class="result">
        <h5>Share this with your client</h5>
        <h4>Client ID</h4>
        <input id="client_id_result" type="" value="" disabled>
        <h4>Client Secret</h4>
        <input id="client_secret_result" type="" value="" disabled>
    </div>
</body>
<script>
    $(document).ready(() => {

        function resizeInput() {
            $(this).attr('size', $(this).val().length);
        }

        $('.result').hide();
        $('#issue').click((e) => {
            e.preventDefault();
            let data = {
                client_id: $("#client_id").val()
            }
            if (data.client_id != "") {
                $.get("client_secret.php", data).done((data) => {
                    console.log(JSON.parse(data));
                    result = JSON.parse(data);
                    $('.result').show();
                    $('#client_id_result').val(result.client_id);
                    $('#client_secret_result').val(result.client_secret);
                    $('#client_secret_result').keyup(resizeInput).each(resizeInput);
                })
            } else {
                // error
            }
        })
    })
</script>

</html>