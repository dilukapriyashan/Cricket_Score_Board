<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Score Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="m-20" id="headers"></div>
    <div>
        <button id="load_xml" class="btn btn-primary m-2">Auto Play</button>
        <div id="xml_data" style="margin-bottom: 50px;"></div>
        <div id="xmlSummary_data"></div>
    </div>

    <script>
        $(document).ready(function () {
            // Function to handle AJAX requests
            function fetchData(url, target) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        $(target).html(data);
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Load headers on page load
            fetchData('setHeaders.php', '#headers');

            // Load data on button click
            $("#load_xml").click(function () {
                fetchData('getDataOne.php', '#xml_data');
                fetchData('getDataSummary.php', '#xmlSummary_data');
            });
        });
    </script>

</body>

</html>
