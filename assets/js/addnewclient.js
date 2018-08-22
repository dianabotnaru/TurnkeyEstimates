 $(function () {
    $("#addnew").click(function () {
        $('.addnew')
            .modal({
                inverted: true
            })
            .modal('show');
        });
        $(".addnew").modal({
            closable: true
        });
    });
});
