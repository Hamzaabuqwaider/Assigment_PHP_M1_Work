$(document).ready(function () {

    $("#courses").keyup(function () {
        var query = $(this).val();
        if (query) {
            $.ajax({
                url: "search.php",
                method: "GET",
                data: { query: query },
                success: function (data) {
                    $("#countrylist").fadeIn();
                    $('#countrylist').html(data);
                }
            });
        }
        else {
            $("#countrylist").fadeOut();
            $('#countrylist').html("");
        }

    });
    $(document).on("click", "li", function () {
        $("#conutry").trim();
        $("#conutry").val($(this).text());
        $("#countrylist").fadeOut();
    });
});