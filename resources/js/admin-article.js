$(function() {
    $('.admin-article-action-publish').click(function() {
        checkToUpdate();
        updateDatabase(2);
    });
});

$(function() {
    $('.schedule-schedule').click(function() {
        var date = document.getElementById('datepicker').value;
        var time = document.getElementById('timepicker').value;
        time += ":00";
        dateTime = date + " " + time;

        checkToUpdate();
        updateDatabase(1, dateTime);
    });
});

$(function() {
    $('.admin-article-action-edit').click(function() {
        checkToUpdate();
        loadToEdit();
    });
});

$(function() {
    $('.admin-article-action-delete').click(function() {
        checkToUpdate();
        updateDatabase(0);
    });
});

$(function() {
    $('.admin-article-action-cancel').click(function() {
        checkToUpdate();
        updateDatabase(3, new Date().toISOString().slice(0, 19).replace('T', ' '));
    });
});

$(function() {
    $('.admin-article-action-unfeature').click(function() {
        checkToUpdate();
        updateDatabase(4);
    });
});

$(function() {
    $('.admin-article-action-feature').click(function() {
        checkToUpdate();
        updateDatabase(5);
    });
});

$(function() {
    $('input[name="admin-article-all"]').change(function() {
        if ($(this).is(':checked')) {
            $('input[name="draft-check"]').each(function(index) {
                $(this).prop('checked', true);
            });
        } else {
            $('input[name="draft-check"]').each(function(index) {
                $(this).prop('checked', false);
            });
        }
    });
});

var updateIds = [];

function checkToUpdate() {
    $('input[name="draft-check"]').each(function(index) {
        if ($(this).is(':checked')) {
            updateIds[index] = $(this).attr('data');
        }
    });
}

function updateDatabase(type, dateTime) {
    var updateResponse = type;
    var date = dateTime;

    $.ajax( 
    {
        type: "POST",
        url: "article-admin.php",
        data: { updateResponse: updateResponse, updateIds: updateIds, dateTime: date },
        success: function(data) {
            window.location.reload();
        }
    });
}


function loadToEdit() {
    window.location.href = "edit.php?id=" + updateIds[0];
}