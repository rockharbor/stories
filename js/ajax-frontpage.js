$(document).ready(function() {

    $('.newer-button').on('click', function(event) {
        event.preventDefault();
        nextPage = $(this).data('next-page');

        url = '/wp-admin/admin-ajax.php?action=fetch_posts&page=' + nextPage;
        $.ajax({
            url: url,
            success: function(data) {
                renderPosts(data);
                updateButton();
            }
        })
    })

    function renderPosts(data) {
        insertTarget = $('body').children('.last-row').last();
        insertTarget.after(data);
        attachLinkHandlers();
    }

    function updateButton() {
        button = $('.newer-button');
        page = button.data('next-page');
        page++;
        button.data('next-page', page)
        button.attr('href', '/page/' + page);
    }
});
