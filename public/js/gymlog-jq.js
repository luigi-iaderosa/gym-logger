$( document ).ready(function() {
    $('.worklog-view-button').click(function (event) {
        var csrfToken = $('input[name$="_token"]').val()
        request = $.ajax({
            url: "/delete-worklog",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {"worklog_id" : this.dataset},
            success : function () {
                window.location.pathname = 'worklogs';
            }
        });
    });
    $('.insert-record').click(function (event) {
        event.preventDefault();
        window.location.pathname = 'insert-worklog';
    })
});