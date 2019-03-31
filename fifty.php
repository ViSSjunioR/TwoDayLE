<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fifty</title>
    <script src="jquery.3.2.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#btnSubmit").click(function () {
                var meaning = $("#vn_mean").val();
                var dataString = 'meaning=' + meaning;
                $.ajax({
                    type: "POST",
                    url: "FiftyController.php",
                    data: dataString,
                    success: function (data) {
                        alert(data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <output>Number answer correct: </output>
    <output><?php echo $numberCorrect ?></output><br><br>
    <output>word: </output>
    <output><?php echo $en_word ?></output><br><br>
    <output>vn mean: </output>
    <input type="text" placeholder="type your mean" id="vn_mean">
    <input id="btnSubmit" name="submit" type="button" value="Submit">
</body>
</html>