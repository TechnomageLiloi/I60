<div id="show" style="text-align: center;height: 100%;">
    <style>
        #table-main
        {
            border: solid 1px silver;
            height: 100%;
        }

        #wrap-levels, #wrap-lessons
        {
            border: solid 1px silver;
            width: 50%;
            height: 50%;
        }
    </style>
    <table id="table-main">
        <tr>
            <td id="wrap-levels">
                <script>Requests.Levels.getCollection();</script>
            </td>
            <td id="wrap-lessons"></td>
        </tr>
        <tr>
            <td id="wrap-problems"></td>
            <td id="wrap-journals"></td>
        </tr>
    </table>
</div>